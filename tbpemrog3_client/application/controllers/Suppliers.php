<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Suppliers_model'); 
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "List Data Pemasok";
        $key = $this->session->userdata('KEY');
        $data['data_suppliers'] = $this->Suppliers_model->getAll($key);

        $this->load->view('Suppliers/index',$data);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data Pemasok";
        $key = $this->session->userdata('KEY');
        $data['data_suppliers'] = $this->Suppliers_model->getById($id,$key);

        $this->load->view('suppliers/detail',$data);
    }

    public function add()
    {
        $key = $this->session->userdata('KEY');
        $data['title'] = "Tambah Data Pemasok";

        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('address','Address','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('suppliers/add',$data);
        }else {
            $data = [
                "name" => $this->input->post('name'),
                "phone" => $this->input->post('phone'),
                "address" => $this->input->post('address'),
                "email" => $this->input->post('email'),
                "KEY" => $key
            ];
 
            $insert = $this->Suppliers_model->save($data,$key);
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash','Data Ditambahkan');
                redirect('suppliers');
            }elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('suppliers');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('suppliers');
            }
            
        }

    }

    public function update($id)
    {

        $data['title'] = "Ubah Data Pemasok";
        $key = $this->session->userdata('KEY');
        $data['data_suppliers'] = $this->Suppliers_model->getById($id,$key);

        $this->form_validation->set_rules('supplier_id','ID Pemasok','trim|required|numeric');
        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('phone','Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('address','Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('suppliers/edit',$data);
        }else {
            $data = [
                "supplier_id" => $this->input->post('supplier_id'),
                "name" => $this->input->post('name'),
                "phone" => $this->input->post('phone'),
                "address" => $this->input->post('address'),
                "email" => $this->input->post('email'),
                "KEY" => $key
            ];

            $update = $this->Suppliers_model->update($data,$key);
            if($update['response_code']===201){
                $this->session->set_flashdata('flash','Data Diedit');
                redirect('suppliers');
            }elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('suppliers');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('suppliers');
            }
            
        }

    }

    public function delete($id)
    {
        $key = $this->session->userdata('KEY');
        $update = $this->Suppliers_model->delete($id,$key);
            if($update['response_code']===200){
                $this->session->set_flashdata('flash','Dihapus');
                redirect('Suppliers');
            }else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('Suppliers');
            }
    }

}
