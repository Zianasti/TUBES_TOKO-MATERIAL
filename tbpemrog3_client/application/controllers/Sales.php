<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "List Data Penjualan";

        $key = $this->session->userdata('KEY');

        $data['data_penjualan'] = $this->Sales_model->getAll($key);

        $this->load->view('sales/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = "List Data Penjualan";

        $key = $this->session->userdata('KEY');

        $data['data_penjualan'] = $this->Sales_model->getById($id,$key);
        $data['data_rincian_penjualan'] = $this->Sales_model->GetSaleDetails($id,$key);


        $this->load->view('sales/detail', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Sales";
        $key = $this->session->userdata('KEY');


        $this->form_validation->set_rules('sale_id', 'sale_id', 'trim|required');
        $this->form_validation->set_rules('date', 'DATE', 'trim|required');
        $this->form_validation->set_rules('pay', 'pay', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('money_change', 'money_change', 'trim|required');
        $this->form_validation->set_rules('employee_id', 'employee_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $key = $this->session->userdata('KEY');

            $data['data_employees'] = $this->Sales_model->getEmployees($key);

            $this->load->view('sales/add', $data);
        } else {
            $data = [
                'sale_id' => $this->input->post('sale_id'),
                'date' => $this->input->post('date'),
                'pay' => $this->input->post('pay'),
                'total' => $this->input->post('total'),
                'money_change' => $this->input->post('money_change'),
                'employee_id' => $this->input->post('employee_id'),
                'KEY' => $key
            ];

            $insert = $this->Sales_model->save($data,$key);
            if ($insert['response_code']===201) {
                $this->session->set_flashdata('flash','Data ditambahkan');
                redirect('Sales'); 
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data duplikat, silakan coba lagi');
                redirect('Sales'); 
            } else {
                $this->session->set_flashdata('message','Simpan Data Gagal');
                redirect('Sales'); 
            } 
        }
    }

    public function edit($id)
    {
        $key = $this->session->userdata('KEY');
        $data['title'] = "Ubah Data Penjualan";
        
        $this->form_validation->set_rules('sale_id', 'sale_id', 'trim|required');
        $this->form_validation->set_rules('date', 'DATE', 'trim|required');
        $this->form_validation->set_rules('pay', 'pay', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required');
        $this->form_validation->set_rules('money_change', 'money_change', 'trim|required');
        $this->form_validation->set_rules('employee_id', 'employee_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $key = $this->session->userdata('KEY');
            $data['data_employee'] = $this->Sales_model->getEmployees($key);
            $data['data_penjualan'] = $this->Sales_model->getById($id,$key);

            $this->load->view('sales/edit', $data);
        } else {
            $data = [
                'sale_id' => $this->input->post('sale_id'),
                'date' => $this->input->post('date'),
                'pay' => $this->input->post('pay'),
                'total' => $this->input->post('total'),
                'money_change' => $this->input->post('money_change'),
                'employee_id' => $this->input->post('employee_id'),
                'KEY' => $key
            ];

            $update = $this->Sales_model->update($data,$key);
            if ($update['response_code']===201) {
                $this->session->set_flashdata('flash','Data diubah');
                redirect('Sales'); 
            } elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Gagal, silakan coba lagi');
                redirect('Sales'); 
            } else {
                $this->session->set_flashdata('message','Update Data Gagal');
                redirect('Sales'); 
            } 
        }
    }

    public function delete($id)
    {
        $key = $this->session->userdata('KEY');
        $delete = $this->Sales_model->delete($id,$key);
            if ($delete['response_code']===200) {
                $this->session->set_flashdata('flash','Data dihapus');
                redirect('Sales'); 
            } else {
                $this->session->set_flashdata('message','Hapus Data Gagal');
                redirect('Sales'); 
            } 
    }
}