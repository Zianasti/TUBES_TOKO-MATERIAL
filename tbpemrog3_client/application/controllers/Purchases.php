<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchases_model'); //load model mahasiswa
        $this->load->library('form_validation'); //load form validation
        $this->load->library('session'); //load session
    }

    public function index()
    {
        $data['title'] = "List Data Pembelian";

        $data['data_pembelian'] = $this->Purchases_model->getAll();

        $this->load->view('purchases/index', $data);
    }

    public function detail($npm)
    {
        $data['title'] = "List Data Mahasiswa";

        $data['data_mahasiswa'] = $this->Mahasiswa_model->getById($npm);

        $this->load->view('mahasiswa/detail', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Mahasiswa";

        $this->form_validation->set_rules('purchase_id', 'purchase_id', 'trim|required');
        $this->form_validation->set_rules('date', 'DATE', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('supplier_id', 'supplier_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $data['data_supplier'] = $this->Purchases_model->getSuppliers();

            $this->load->view('purchases/add', $data);
        } else {
            $data = [
                'purchase_id' => $this->input->post('purchase_id'),
                'date' => $this->input->post('date'),
                'total' => $this->input->post('total'),
                'description' => $this->input->post('description'),
                'supplier_id' => $this->input->post('supplier_id'),
            ];

            $insert = $this->Purchases_model->save($data);
            if ($insert['response_code']===201) {
                $this->session->set_flashdata('flash','Data ditambahkan');
                redirect('Purchases'); 
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data duplikat, silakan coba lagi');
                redirect('Purchases'); 
            } else {
                $this->session->set_flashdata('message','Simpan Data Gagal');
                redirect('Purchases'); 
            } 
        }
    }

    public function edit($npm)
    {
        $data['title'] = "Ubah Data Mahasiswa";
        $data['data_mahasiswa'] = $this->Mahasiswa_model->getById($npm);

        $this->form_validation->set_rules('npm', 'NPM', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'NAMA', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'JK', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('agama', 'AGAMA', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'NOHP', 'trim|required|numeric|min_length[9]|max_length[13]');
        $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|valid_email');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'npm' => $this->input->post('npm'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'agama' => $this->input->post('agama'),
                'no_hp' => $this->input->post('no_hp'),
                'email' => $this->input->post('email'),
                'KEY' => 'ulbi123'
            ];

            $update = $this->Mahasiswa_model->update($data);
            if ($update['response_code']===201) {
                $this->session->set_flashdata('flash','Data diubah');
                redirect('Mahasiswa'); 
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Gagal, silakan coba lagi');
                redirect('Mahasiswa'); 
            } else {
                $this->session->set_flashdata('message','Update Data Gagal');
                redirect('Mahasiswa'); 
            } 
        }
    }

    public function delete($npm)
    {
        $delete = $this->Mahasiswa_model->delete($npm);
            if ($delete['response_code']===200) {
                $this->session->set_flashdata('flash','Data dihapus');
                redirect('Mahasiswa'); 
            } else {
                $this->session->set_flashdata('message','Hapus Data Gagal');
                redirect('Mahasiswa'); 
            } 
    }
}