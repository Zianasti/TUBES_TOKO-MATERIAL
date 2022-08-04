<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_details extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sale_details_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "List Data Rincian Penjualan";

        $key = $this->session->userdata('KEY');

        $data['data_rincian_penjualan'] = $this->Sale_details_model->getAll($key);

        $this->load->view('sale_details/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = "List Data Rincian Penjualan";

        $key = $this->session->userdata('KEY');

        $data['data_rincian_penjualan'] = $this->Sale_details_model->getById($id,$key);

        $this->load->view('sale_details/detail', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Sale_details";
        $key = $this->session->userdata('KEY');

        $this->form_validation->set_rules('qty', 'qty', 'trim|required');
        $this->form_validation->set_rules('disc', 'disc', 'trim|required');
        $this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
        $this->form_validation->set_rules('material_id', 'material_id', 'trim|required');
        $this->form_validation->set_rules('sale_id', 'sale_id', 'trim|required');

        if ($this->form_validation->run()==false) {

            $key = $this->session->userdata('KEY');
            $data['data_penjualan'] = $this->Sale_details_model->getSales($key);
            $data['data_materials'] = $this->Sale_details_model->getMaterials($key);

            $this->load->view('sale_details/add', $data);
        } else {
            $data = [
                'qty' => $this->input->post('qty'),
                'disc' => $this->input->post('disc'),
                'subtotal' => $this->input->post('subtotal'),
                'material_id' => $this->input->post('material_id'),
                'sale_id' => $this->input->post('sale_id'),
                'KEY' => $key
            ];

            $insert = $this->Sale_details_model->save($data,$key);
            if ($insert['response_code']===201) {
                $this->session->set_flashdata('flash','Data ditambahkan');
                redirect('sale_details'); 
            } elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data duplikat, silakan coba lagi');
                redirect('sale_details'); 
            } else {
                $this->session->set_flashdata('message','Simpan Data Gagal');
                redirect('Sale_details'); 
            } 
        }
    }

    public function edit($id)
    {
        $data['title'] = "Ubah Data Rincian Penjualan";
        $key = $this->session->userdata('KEY');
        
        $this->form_validation->set_rules('sale_detail_id', 'sale_detail_id', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required');
        $this->form_validation->set_rules('cost', 'cost', 'trim|required');
        $this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
        $this->form_validation->set_rules('material_id', 'material_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $key = $this->session->userdata('KEY');
            $data['data_rincian_penjualan'] = $this->Sale_details_model->getSuppliers($key);
            $data['data_rincian_penjualan'] = $this->Sale_details_model->getById($id,$key);

            $this->load->view('sale_details/edit', $data);
        } else {
            $data = [
                'sale_detail_id' => $this->input->post('sale_detail_id'),
                'qty' => $this->input->post('qty'),
                'cost' => $this->input->post('cost'),
                'subtotal' => $this->input->post('subtotal'),
                'material_id' => $this->input->post('material_id'),
                'KEY' => $key
            ];

            $upqty = $this->Sale_details_model->upqty($data,$key);
            if ($upqty['response_code']===201) {
                $this->session->set_flashdata('flash','Data diubah');
                redirect('Sale_details'); 
            } elseif ($upqty['response_code']===400) {
                $this->session->set_flashdata('message','Data Gagal, silakan coba lagi');
                redirect('Sale_details'); 
            } else {
                $this->session->set_flashdata('message','Upqty Data Gagal');
                redirect('Sale_details'); 
            } 
        }
    }

    public function delete($id,$key)
    {
        $key = $this->session->userdata('KEY');
        $delete = $this->Sale_details_model->delete($id,$key);
            if ($delete['response_code']===200) {
                $this->session->set_flashdata('flash','Data dihapus');
                redirect('Sale_details'); 
            } else {
                $this->session->set_flashdata('message','Hapus Data Gagal');
                redirect('Sale_details'); 
            } 
    }

    public function getSubtotal($id)
    {
        
    }
}