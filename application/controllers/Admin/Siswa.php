<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Kelola Siswa';
        $data['user_list'] = $this->User_model->get_users_by_role('siswa');

        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('user_id', 'ID', 'required|is_unique[siswa.user_id]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'jk' => $this->input->post('jk'),
                'role' => 'siswa',
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->User_model->create_user($data, 'siswa');
            $this->session->set_flashdata('success', 'Akun siswa berhasil dibuat!');
            redirect('admin/siswa');
        }
    }

    public function edit($user_id)
    {
        $data['title'] = 'Ubah Siswa';
        $data['user'] = $this->User_model->get_user_by_id($user_id, 'siswa');

        if (empty($data['user'])) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($user_id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($user_id);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];

            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->User_model->update_user($user_id, $data, 'siswa');

            $this->session->set_flashdata('success', 'Akun siswa berhasil diperbarui!');
            redirect('admin/siswa');
        }
    }

    public function delete($user_id)
    {
        $this->User_model->delete_user($user_id, 'siswa');
        $this->session->set_flashdata('success', 'Akun siswa berhasil dihapus!');
        redirect('admin/siswa');
    }

    public function import()
    {
        $data['title'] = 'Import Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('admin/siswa/import', $data);
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

                        $exists = $this->User_model->get_user_by_id($user_id, 'siswa');
                        if (!$exists) {
                            $insertData[] = [
                                'user_id' => $row[0],
                                'nama' => $row[1],
                                'password' => password_hash($row[2], PASSWORD_DEFAULT),
                                'jk' => $row[3],
                                'role' => 'siswa',
                                'no_telp' => isset($row[4]) && !empty($row[4]) ? $row[4] : null,
                                'alamat' => isset($row[5]) && !empty($row[5]) ? $row[5] : null,
                            ];
                        }
                    }
                    $numRow++;
                }

                if (!empty($insertData)) {
                    $this->User_model->insert_batch_users($insertData, 'siswa');
                    $this->session->set_flashdata('success', 'Data berhasil diimport');
                } else {
                    $this->session->set_flashdata('warning', 'Tidak ada data baru yang diimport');
                }

            } catch (Exception $e) {
                $this->session->set_flashdata('error', 'Error membaca file: ' . $e->getMessage());
            }

            unlink($filePath);

            redirect('admin/siswa');
        }
    }
}