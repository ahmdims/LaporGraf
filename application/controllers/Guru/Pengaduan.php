<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'Guru') {
            redirect('auth');
        }
        $this->load->model('Pengaduan_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan Saya';
        $userId = $this->session->userdata('user_id');
        $data['pengaduan_list'] = $this->Pengaduan_model->get_by_user($userId);

        $this->load->view('templates/header', $data);
        $this->load->view('guru/pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Buat Pengaduan Baru';
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('guru/pengaduan/create', $data);
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        // ... (validasi lainnya sama seperti siswa)

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'user_id' => $this->session->userdata('user_id'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'date' => date('Y-m-d'),
                'tempat' => $this->input->post('tempat'),
                'konfirmasi' => '0'
            ];

            $this->Pengaduan_model->insert($data);
            $this->session->set_flashdata('success', 'Pengaduan berhasil dikirim!');
            redirect('guru/pengaduan');
        }
    }

    // Edit, Update, Delete sama persis dengan Siswa, hanya beda redirect path
    public function edit($id)
    {
        $userId = $this->session->userdata('user_id');
        $pengaduan = $this->Pengaduan_model->get_valid_pengaduan_for_edit_delete($id, $userId);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Pengaduan tidak ditemukan atau sudah ditanggapi.');
            redirect('guru/pengaduan');
        }

        $data['title'] = 'Edit Pengaduan';
        $data['pengaduan'] = $pengaduan;
        $data['kategori'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('guru/pengaduan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $userId = $this->session->userdata('user_id');
        $pengaduan = $this->Pengaduan_model->get_valid_pengaduan_for_edit_delete($id, $userId);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Gagal memperbarui: Pengaduan tidak ditemukan atau sudah ditanggapi.');
            redirect('guru/pengaduan');
        }

        // ... (validasi sama)
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
            redirect('guru/pengaduan');
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
        redirect('guru/pengaduan');
    }
}