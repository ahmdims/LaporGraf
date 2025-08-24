<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('Pengaduan_model');
        $this->load->model('Tanggapan_model');
        $this->load->model('Kepuasan_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan Saya';
        $userId = $this->session->userdata('user_id');
        $data['pengaduan_list'] = $this->Pengaduan_model->get_by_user($userId);

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Buat Pengaduan Baru';
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'user_id' => $this->session->userdata('user_id'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'date' => date('Y-m-d'),
                'tempat' => $this->input->post('tempat') ?: null,
            ];

            $this->Pengaduan_model->insert($data);
            $this->session->set_flashdata('success', 'Pengaduan berhasil dikirim!');
            redirect('siswa/pengaduan');
        }
    }

    public function detail($id_pengaduan)
    {
        $data['title'] = 'Detail Pengaduan';
        $user_id = $this->session->userdata('user_id');

        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_detail_for_user($id_pengaduan, $user_id);

        if (!$data['pengaduan']) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan.');
            redirect('siswa/pengaduan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $userId = $this->session->userdata('user_id');
        $pengaduan = $this->Pengaduan_model->get_valid_pengaduan_for_edit_delete($id, $userId);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan atau sudah ditanggapi.');
            redirect('siswa/pengaduan');
        }

        $data['title'] = 'Edit Pengaduan';
        $data['pengaduan'] = $pengaduan;
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $userId = $this->session->userdata('user_id');
        $pengaduan = $this->Pengaduan_model->get_valid_pengaduan_for_edit_delete($id, $userId);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Gagal memperbarui: Pengaduan tidak ditemukan atau sudah ditanggapi.');
            redirect('siswa/pengaduan');
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
            ];

            $this->Pengaduan_model->update($id, $data);
            $this->session->set_flashdata('success', 'Pengaduan berhasil diperbarui!');
            redirect('siswa/pengaduan');
        }
    }

    public function delete($id)
    {
        $userId = $this->session->userdata('user_id');
        $pengaduan = $this->Pengaduan_model->get_valid_pengaduan_for_edit_delete($id, $userId);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Gagal menghapus: Pengaduan tidak ditemukan atau sudah ditanggapi.');
        } else {
            $this->Pengaduan_model->delete($id);
            $this->session->set_flashdata('success', 'Pengaduan berhasil dihapus.');
        }
        redirect('siswa/pengaduan');
    }

    public function beri_kepuasan($id_balasan)
    {
        $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');

        $id_pengaduan = $this->input->post('id_pengaduan');

        if ($this->form_validation->run() == FALSE) {
            $this->detail($id_pengaduan);
        } else {
            if ($this->Kepuasan_model->sudah_ada_kepuasan($id_balasan)) {
                $this->session->set_flashdata('error', 'Anda sudah memberikan feedback untuk tanggapan ini.');
            } else {
                $data = [
                    'id_balasan' => $id_balasan,
                    'id_kategori' => $this->input->post('id_kategori'),
                    'user_id' => $this->session->userdata('user_id'),
                    'komentar' => $this->input->post('komentar'),
                    'rating' => $this->input->post('rating')
                ];

                $this->Kepuasan_model->insert($data);

                $this->session->set_flashdata('success', 'Terima kasih atas feedback Anda!');
            }
            redirect('siswa/pengaduan/detail/' . $id_pengaduan);
        }
    }
}