<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Security check: ensure user is logged in and is a Siswa
        if (!$this->session->userdata('is_logged_in') || $this->session->userdata('role') != 'Siswa') {
            redirect('auth');
        }
        $this->load->model('Pengaduan_model');
        $this->load->model('Kategori_model'); // To get categories for the form
    }

    // Read: Display all complaints by this student
    public function index()
    {
        $data['title'] = 'My Complaints';
        $userId = $this->session->userdata('user_id');
        $data['pengaduan_list'] = $this->Pengaduan_model->get_by_user($userId);

        // Load views with a template
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/index', $data);
        $this->load->view('templates/footer');
    }

    // Create (View): Show the form to add a new complaint
    public function create()
    {
        $data['title'] = 'Make a New Complaint';
        $data['kategori'] = $this->Kategori_model->get_all(); // Get all categories for dropdown

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/pengaduan/create', $data);
        $this->load->view('templates/footer');
    }

    // Create (Process): Store the new complaint in the DB
    public function store()
    {
        $this->form_validation->set_rules('judul', 'Title', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required');
        $this->form_validation->set_rules('id_kategori', 'Category', 'required');
        $this->form_validation->set_rules('tempat', 'Location', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create(); // If validation fails, show the form again
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'user_id' => $this->session->userdata('user_id'),
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'date' => date('Y-m-d'),
                'tempat' => $this->input->post('tempat'),
                'konfirmasi' => '0' // Default value for new complaint
            ];

            $this->Pengaduan_model->insert($data);
            $this->session->set_flashdata('success', 'Complaint submitted successfully!');
            redirect('siswa/pengaduan');
        }
    }

    // NOTE: For a full application, you would also create edit(), update(), and delete() methods here.
    // They would follow a similar pattern: load a model function, pass the ID, and perform the action,
    // always checking if the logged-in user is the owner of the complaint.
}