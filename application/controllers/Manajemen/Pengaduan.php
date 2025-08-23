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
        $data['title'] = 'Detail dan Tanggapan Pengaduan';
        $unit = $this->session->userdata('keterangan');
        $data['pengaduan'] = $this->Manajemen_model->get_pengaduan_detail($id_pengaduan, $unit);

        $data['status_list'] = $this->Status_model->get_by_petugas($unit);

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
        $this->form_validation->set_rules('isi_balasan', 'Isi Balasan', 'required');
        $this->form_validation->set_rules('id_status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->detail($id_pengaduan);
        } else {
            $data = [
                'id_pengaduan' => $id_pengaduan,
                'id_kategori' => $this->input->post('id_kategori'),
                'id_status' => $this->input->post('id_status'),
                'date' => date('Y-m-d'),
                'isi_balasan' => $this->input->post('isi_balasan'),
                'konfirmasi' => '1',
            ];

            $this->Pengaduan_model->update($id_pengaduan, ['konfirmasi' => '1']);
            $this->Tanggapan_model->insert_tanggapan($data);

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
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_tanggapan($id_balasan);
        } else {
            $data = [
                'isi_balasan' => $this->input->post('isi_balasan'),
                'status' => $this->input->post('status')
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

            $sisa_balasan = $this->db->get_where('balasan', ['id_pengaduan' => $id_pengaduan])->num_rows();
            if ($sisa_balasan == 0) {
                $this->Pengaduan_model->update($id_pengaduan, ['konfirmasi' => '0']);
            }

            $this->session->set_flashdata('success', 'Tanggapan berhasil dihapus.');
        }
        redirect('manajemen/pengaduan/detail/' . $id_pengaduan);
    }
}