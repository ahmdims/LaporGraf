<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'Manajemen') {
            redirect('auth');
        }
        $this->load->model('Manajemen_model');
        $this->load->model('Tanggapan_model');
        $this->load->model('Pengaduan_model'); // Untuk update status
    }

    public function index()
    {
        $data['title'] = 'Daftar Pengaduan Masuk';
        // Ambil 'keterangan' dari data session manajemen yang login
        $unit = $this->session->userdata('keterangan');
        $data['pengaduan_list'] = $this->Manajemen_model->get_pengaduan_by_unit($unit);

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_pengaduan)
    {
        $data['title'] = 'Detail dan Tanggapan Pengaduan';
        $unit = $this->session->userdata('keterangan');
        $data['pengaduan'] = $this->Manajemen_model->get_pengaduan_detail($id_pengaduan, $unit);

        if (!$data['pengaduan']) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan atau bukan untuk unit Anda.');
            redirect('manajemen/pengaduan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('manajemen/pengaduan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function beri_tanggapan($id_pengaduan)
    {
        $this->form_validation->set_rules('isi_balasan', 'Isi Tanggapan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->detail($id_pengaduan);
        } else {
            // Data untuk tabel 'balasan'
            $data_balasan = [
                'id_pengaduan' => $id_pengaduan,
                'id_kategori' => $this->input->post('id_kategori'),
                'date' => date('Y-m-d'),
                'status' => 'Sedang Memproses', // atau status lain
                'isi_balasan' => $this->input->post('isi_balasan'),
                'konfirmasi' => '1' // Menandakan sudah dibalas
            ];

            $this->Tanggapan_model->insert($data_balasan);

            // Update status konfirmasi di tabel 'pengaduan'
            $this->Pengaduan_model->update($id_pengaduan, ['konfirmasi' => '1']);

            $this->session->set_flashdata('success', 'Tanggapan berhasil dikirim!');
            redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
        }
    }
}