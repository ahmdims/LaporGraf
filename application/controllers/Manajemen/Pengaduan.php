<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manajemen') {
            redirect('auth');
        }
        $this->load->model('Manajemen_model');
        $this->load->model('Tanggapan_model');
        $this->load->model('Pengaduan_model');
        $this->load->model('Status_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengaduan Masuk';
        $unit = $this->session->userdata('keterangan');
        $data['pengaduan_list'] = $this->Manajemen_model->get_pengaduan_by_unit($unit);

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_pengaduan)
    {
        $data['title'] = 'Detail Pengaduan';

        $data['pengaduan'] = $this->Pengaduan_model->get_by_id($id_pengaduan);
        if (!$data['pengaduan']) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan.');
            redirect('manajemen/pengaduan');
        }

        $data['balasan_list'] = $this->Tanggapan_model->get_tanggapan_by_pengaduan($id_pengaduan);
        $unit_petugas = $this->session->userdata('keterangan');
        $data['status_list'] = $this->Status_model->get_by_petugas($unit_petugas);

        // Menentukan apakah pengaduan sudah memiliki balasan atau belum
        $data['sudah_ditanggapi'] = count($data['balasan_list']) > 0;

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/pengaduan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function beri_tanggapan($id_pengaduan)
    {
        $this->form_validation->set_rules('isi_balasan', 'Isi Balasan', 'required');
        $this->form_validation->set_rules('id_status', 'Status', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->detail($id_pengaduan);
        } else {
            // Cek lagi agar tidak ada duplikasi jika user membuka 2 tab
            $balasan_exist = $this->Tanggapan_model->get_tanggapan_by_pengaduan($id_pengaduan);
            if (count($balasan_exist) > 0) {
                $this->session->set_flashdata('error', 'Pengaduan ini sudah ditanggapi!');
                redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
            }

            $data = [
                'id_pengaduan' => $id_pengaduan,
                'id_kategori' => $this->input->post('id_kategori'),
                'date' => date('Y-m-d'),
                'id_status' => $this->input->post('id_status'),
                'isi_balasan' => $this->input->post('isi_balasan')
            ];

            $this->Tanggapan_model->insert($data);

            $this->session->set_flashdata('success', 'Tanggapan berhasil dikirim!');
            redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
        }
    }

    public function edit_tanggapan($id_balasan)
    {
        $unit = $this->session->userdata('keterangan');
        $tanggapan = $this->Tanggapan_model->get_tanggapan_for_unit($id_balasan, $unit);

        if (!$tanggapan) {
            $this->session->set_flashdata('error', 'Tanggapan tidak ditemukan.');
            redirect('manajemen/pengaduan');
        }

        $data['title'] = 'Edit Tanggapan';
        $data['tanggapan'] = $tanggapan;
        $data['status_list'] = $this->Status_model->get_by_petugas($unit);

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/pengaduan/edit_tanggapan', $data);
        $this->load->view('templates/footer');
    }

    public function update_tanggapan($id_balasan)
    {
        $unit = $this->session->userdata('keterangan');
        $tanggapan = $this->Tanggapan_model->get_tanggapan_for_unit($id_balasan, $unit);
        $id_pengaduan = $tanggapan->id_pengaduan;

        if (!$tanggapan) {
            $this->session->set_flashdata('error', 'Tanggapan tidak ditemukan.');
            redirect('manajemen/pengaduan');
        }

        $this->form_validation->set_rules('isi_balasan', 'Isi Tanggapan', 'required');
        $this->form_validation->set_rules('id_status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_tanggapan($id_balasan);
        } else {
            $data = [
                'isi_balasan' => $this->input->post('isi_balasan'),
                'id_status' => $this->input->post('id_status')
            ];
            $this->Tanggapan_model->update($id_balasan, $data);
            $this->session->set_flashdata('success', 'Tanggapan berhasil diperbarui!');
            redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
        }
    }

    public function hapus_tanggapan($id_balasan)
    {
        $unit = $this->session->userdata('keterangan');
        $tanggapan = $this->Tanggapan_model->get_tanggapan_for_unit($id_balasan, $unit);
        $id_pengaduan = $tanggapan->id_pengaduan;

        if (!$tanggapan) {
            $this->session->set_flashdata('error', 'Tanggapan tidak ditemukan.');
        } else {
            $this->Tanggapan_model->delete($id_balasan);
            $this->session->set_flashdata('success', 'Tanggapan berhasil dihapus.');
        }
        redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
    }
}