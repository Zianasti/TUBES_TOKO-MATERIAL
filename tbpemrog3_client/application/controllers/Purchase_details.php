<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_details extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchase_details_model'); //load model purchase_details
        $this->load->library('form_validation'); //load form validation
        $this->load->library('session'); //load session
    }

    public function index()
    {
        $data['title'] = "List Data Rincian Pembelian";

        $key = $this->session->userdata('KEY');

        $data['data_rincian_pembelian'] = $this->Purchase_details_model->getAll($key);

        $this->load->view('purchase_details/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = "List Data Rincian Pembelian";

        $key = $this->session->userdata('KEY');

        $data['data_rincian_pembelian'] = $this->Purchase_details_model->getById($id,$key);

        $this->load->view('purchase_details/detail', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Purchase_details";
        $key = $this->session->userdata('KEY');

        if ($this->input->post('radioJenis') == 'radioBaru') {
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('price', 'price', 'trim|required');
            $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');

            $this->form_validation->set_rules('purchase_detail_id', 'purchase_detail_id', 'trim|required');
            $this->form_validation->set_rules('qty', 'qty', 'trim|required');
            $this->form_validation->set_rules('cost', 'cost', 'trim|required');
            $this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
            $this->form_validation->set_rules('material_id1', 'material_id1', 'trim|required');
            $this->form_validation->set_rules('purchase_id', 'purchase_id', 'trim|required');
        }

        if ($this->input->post('radioJenis') == 'radioUpdate') {
            $this->form_validation->set_rules('purchase_detail_id', 'purchase_detail_id', 'trim|required');
            $this->form_validation->set_rules('qty', 'qty', 'trim|required');
            $this->form_validation->set_rules('cost', 'cost', 'trim|required');
            $this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
            $this->form_validation->set_rules('material_id2', 'material_id2', 'trim|required');
            $this->form_validation->set_rules('purchase_id', 'purchase_id', 'trim|required');
        }

        if ($this->form_validation->run()==false) {
            $key = $this->session->userdata('KEY');

            $data['data_pembelian'] = $this->Purchase_details_model->getPurchases($key);
            $data['data_material_categories'] = $this->Purchase_details_model->getMaterialCategories($key);
            $data['data_materials'] = $this->Purchase_details_model->getMaterials($key);

            $this->load->view('purchase_details/add', $data);
        } else {
            if ($this->input->post('radioJenis') == 'radioBaru') {
                $data = [
                    'jenisPost' => $this->input->post('radioJenis'),

                    'name' => $this->input->post('name'),
                    'price' => $this->input->post('price'),
                    'category_id' => $this->input->post('category_id'),

                    'purchase_detail_id' => $this->input->post('purchase_detail_id'),
                    'qty' => $this->input->post('qty'),
                    'cost' => $this->input->post('cost'),
                    'subtotal' => $this->input->post('subtotal'),
                    'material_id' => $this->input->post('material_id1'),
                    'purchase_id' => $this->input->post('purchase_id'),
                ];
            }

            if ($this->input->post('radioJenis') == 'radioUpdate') {
                $data = [
                    'jenisPost' => $this->input->post('radioJenis'),

                    'purchase_detail_id' => $this->input->post('purchase_detail_id'),
                    'qty' => $this->input->post('qty'),
                    'cost' => $this->input->post('cost'),
                    'subtotal' => $this->input->post('subtotal'),
                    'material_id' => $this->input->post('material_id2'),
                    'purchase_id' => $this->input->post('purchase_id'),
                ];   
            }   

            $insert = $this->Purchase_details_model->save($data,$key);
                if ($insert['response_code']===201 || $insert['response_code']===200) {
                    $this->session->set_flashdata('flash','Data ditambahkan');
                    redirect('Purchase_details'); 
                } elseif ($insert['response_code']===400) {
                    $this->session->set_flashdata('message','Data duplikat,'.$insert['message']);
                    redirect('Purchase_details'); 
                } else {
                    $this->session->set_flashdata('message','Simpan Data Gagal');
                    redirect('Purchase_details'); 
                }   
        }
    }

    public function edit($id)
    {
        $data['title'] = "Ubah Data Rincian Pembelian";
        $key = $this->session->userdata('KEY');

        $this->form_validation->set_rules('purchase_detail_id', 'purchase_detail_id', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required');
        $this->form_validation->set_rules('cost', 'cost', 'trim|required');
        $this->form_validation->set_rules('subtotal', 'subtotal', 'trim|required');
        $this->form_validation->set_rules('material_id', 'material_id', 'trim|required');

        if ($this->form_validation->run()==false) {
            $key = $this->session->userdata('KEY');
            $data['data_pemasok'] = $this->Purchase_details_model->getSuppliers($key);
            $data['data_rincian_pembelian'] = $this->Purchase_details_model->getById($id,$key);

            $this->load->view('purchase_details/edit', $data);
        } else {
            $data = [
                'purchase_detail_id' => $this->input->post('purchase_detail_id'),
                'qty' => $this->input->post('qty'),
                'cost' => $this->input->post('cost'),
                'subtotal' => $this->input->post('subtotal'),
                'material_id' => $this->input->post('material_id'),
            ];

            $upqty = $this->Purchase_details_model->upqty($data,$key);
            if ($upqty['response_code']===201) {
                $this->session->set_flashdata('flash','Data diubah');
                redirect('Purchase_details'); 
            } elseif ($upqty['response_code']===400) {
                $this->session->set_flashdata('message','Data Gagal, silakan coba lagi');
                redirect('Purchase_details'); 
            } else {
                $this->session->set_flashdata('message','Upqty Data Gagal');
                redirect('Purchase_details'); 
            } 
        }
    }

    public function delete($id)
    {
        $key = $this->session->userdata('KEY');
        $delete = $this->Purchase_details_model->delete($id,$key);
            if ($delete['response_code']===200) {
                $this->session->set_flashdata('flash','Data dihapus');
                redirect('Purchase_details'); 
            } else {
                $this->session->set_flashdata('message','Hapus Data Gagal');
                redirect('Purchase_details'); 
            } 
    }
}