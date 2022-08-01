<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchases extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchases_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "List Data Pembelian";

        $key = $this->session->userdata('KEY');

        $data['data_pembelian'] = $this->Purchases_model->getAll($key);

        $this->load->view('purchases/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = "List Data Pembelian";

        $key = $this->session->userdata('KEY');

        $data['data_pembelian'] = $this->Purchases_model->getById($id,$key);

        $this->load->view('purchases/detail', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Purchases";

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

    public function edit($id)
    {
        $data['title'] = "Ubah Data Pembelian";
        
        $this->form_validation->set_rules('purchase_id', 'purchase_id', 'trim|required');
        $this->form_validation->set_rules('date', 'DATE', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('supplier_id', 'supplier_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $data['data_supplier'] = $this->Purchases_model->getSuppliers();
            $data['data_pembelian'] = $this->Purchases_model->getById($id);
            

            $this->load->view('purchases/edit', $data);
        } else {
            $data = [
                'purchase_id' => $this->input->post('purchase_id'),
                'date' => $this->input->post('date'),
                'total' => $this->input->post('total'),
                'description' => $this->input->post('description'),
                'supplier_id' => $this->input->post('supplier_id'),
            ];

            $update = $this->Purchases_model->update($data);
            if ($update['response_code']===201) {
                $this->session->set_flashdata('flash','Data diubah');
                redirect('Purchases'); 
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Gagal, silakan coba lagi');
                redirect('Purchases'); 
            } else {
                $this->session->set_flashdata('message','Update Data Gagal');
                redirect('Purchases'); 
            } 
        }
    }

    public function delete($id)
    {
        $delete = $this->Purchases_model->delete($id);
            if ($delete['response_code']===200) {
                $this->session->set_flashdata('flash','Data dihapus');
                redirect('Purchases'); 
            } else {
                $this->session->set_flashdata('message','Hapus Data Gagal');
                redirect('Purchases'); 
            } 
    }
}