<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Materials_model'); 
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = "List Data Material";

        $key = $this->session->userdata('KEY');

        $data['data_materials'] = $this->Materials_model->getAll($key);

        $this->load->view('Materials/index',$data);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data Materials";

        $key = $this->session->userdata('KEY');

        $data['data_materials'] = $this->Materials_model->getById($id,$key);

        $this->load->view('materials/detail',$data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Material";

        $this->form_validation->set_rules('material_id','ID Material','trim|required|numeric');
        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('stock','Stok','trim|required');
        $this->form_validation->set_rules('price','Harga','trim|required');
        $this->form_validation->set_rules('category_id','Nama Kategori','trim|required');

        if($this->form_validation->run()==false){
            $data['data_material_categories'] = $this->Materials_model->getMaterialCategories();
            $this->load->view('materials/add',$data);
        }else {
            $data = [
                "material_id" => $this->input->post('material_id'),
                "name" => $this->input->post('name'),
                "stock" => $this->input->post('stock'),
                "price" => $this->input->post('price'),
                "category_id" => $this->input->post('category_id'),

                "KEY" => "ulbi123"
            ];
 
            $insert = $this->Materials_model->save($data);
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash','Data Ditambahkan');
                redirect('materials');
            }elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('materials');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('materials');
            }
            
        }

    }

    public function update($id)
    {

        $data['title'] = "Ubah Data Material";
        

        $this->form_validation->set_rules('material_id','ID Material','trim|required|numeric');
        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('stock','Stok','trim|required');
        $this->form_validation->set_rules('price','Harga','trim|required');
        $this->form_validation->set_rules('category_id','Nama Kategori','trim|required');

        if($this->form_validation->run()==false){
            $data['data_material_categories'] = $this->Materials_model->getMaterialCategories();
            $data['data_materials'] = $this->Materials_model->getById($id);
            $this->load->view('materials/edit',$data);
        }else {
            $data = [
                "material_id" => $this->input->post('material_id'),
                "name" => $this->input->post('name'),
                "stock" => $this->input->post('stock'),
                "price" => $this->input->post('price'),
                "category_id" => $this->input->post('category_id'),

                "KEY" => "ulbi123"
            ];

            $update = $this->Materials_model->update($data);
            if($update['response_code']===201){
                $this->session->set_flashdata('flash','Data Diedit');
                redirect('materials');
            }elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('materials');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('materials');
            }
            
        }

    }

    public function delete($id)
    {
        $update = $this->Materials_model->delete($id);
            if($update['response_code']===200){
                $this->session->set_flashdata('flash','Dihapus');
                redirect('Materials');
            }else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('Materials');
            }
    }

}
