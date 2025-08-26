<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Manajemen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Manajemen';
        $data['user_list'] = $this->User_model->get_users_by_role('manajemen');

        $this->load->view('templates/header', $data);
        $this->load->view('admin/manajemen/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Manajemen';
        $data['unit_list'] = $this->Admin_model->get_all_unit();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/manajemen/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('user_id', 'NIP/ID', 'required|is_unique[guru.user_id]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('keterangan', 'Unit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jk' => $this->input->post('jk'),
                'role' => 'manajemen',
                'keterangan' => $this->input->post('keterangan'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->User_model->create_user($data, 'guru');
            $this->session->set_flashdata('success', 'Akun manajemen berhasil dibuat!');
            redirect('admin/manajemen');
        }
    }

    public function edit($user_id)
    {
        $data['title'] = 'Ubah Manajemen';
        $data['user'] = $this->User_model->get_user_by_id($user_id, 'manajemen');
        $data['unit_list'] = $this->Admin_model->get_all_unit();

        if (empty($data['user'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/manajemen/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($user_id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('keterangan', 'Unit', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($user_id);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'keterangan' => $this->input->post('keterangan'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }
            $this->User_model->update_user($user_id, $data, 'guru');
            $this->session->set_flashdata('success', 'Akun manajemen berhasil diperbarui!');
            redirect('admin/manajemen');
        }
    }

    public function delete($user_id)
    {
        $this->User_model->delete_user($user_id, 'manajemen');
        $this->session->set_flashdata('success', 'Akun manajemen berhasil dihapus!');
        redirect('admin/manajemen');
    }

    public function import()
    {
        $data['title'] = 'Import Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/manajemen/import', $data);
        $this->load->view('templates/footer');
    }

    public function upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('import_file')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/import');
        } else {
            $fileData = $this->upload->data();
            $filePath = $fileData['full_path'];

            try {
                $spreadsheet = IOFactory::load($filePath);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                $insertData = [];
                $numRow = 0;

                foreach ($sheetData as $row) {
                    if ($numRow >= 3) {
                        $user_id = $row[0];

                        $exists = $this->User_model->get_user_by_id($user_id, 'manajemen');
                        if (!$exists) {
                            $insertData[] = [
                                'user_id' => $row[0],
                                'nama' => $row[1],
                                'password' => password_hash($row[2], PASSWORD_DEFAULT),
                                'jk' => $row[3],
                                'role' => 'guru',
                                'no_telp' => isset($row[4]) && !empty($row[4]) ? $row[4] : null,
                                'alamat' => isset($row[5]) && !empty($row[5]) ? $row[5] : null,
                            ];
                        }
                    }
                    $numRow++;
                }

                if (!empty($insertData)) {
                    $this->User_model->insert_batch_users($insertData, 'guru');
                    $this->session->set_flashdata('success', 'Data berhasil diimport');
                } else {
                    $this->session->set_flashdata('warning', 'Tidak ada data baru yang diimport');
                }

            } catch (Exception $e) {
                $this->session->set_flashdata('error', 'Error membaca file: ' . $e->getMessage());
            }

            unlink($filePath);

            redirect('admin/manajemen');
        }
    }

    public function export()
    {
        $manajemen_data = $this->User_model->get_users_by_role('manajemen');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Keterangan');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'No Telepon');
        $sheet->setCellValue('F1', 'Alamat');

        $row_number = 2;
        foreach ($manajemen_data as $manajemen) {
            $sheet->setCellValue('A' . $row_number, $manajemen->user_id);
            $sheet->setCellValue('B' . $row_number, $manajemen->nama);
            $sheet->setCellValue('C' . $row_number, $manajemen->keterangan);
            $sheet->setCellValue('D' . $row_number, $manajemen->jk);
            $sheet->setCellValue('E' . $row_number, $manajemen->no_telp);
            $sheet->setCellValue('F' . $row_number, $manajemen->alamat);
            $row_number++;
        }

        $filename = 'laporgraf_data_manajemen_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}