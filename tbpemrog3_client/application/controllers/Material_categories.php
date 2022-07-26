<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_categories extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Material_Categories_model'); 
        $this->load->library('form_validation'); //load fom validation
    }

    public function index()
    {
        $data['title'] = "List Data Material Categories";

        $data['data_material_categories'] = $this->Material_Categories_model->getAll();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('material_categories/index',$data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data Material Categories";

        $data['data_material_categories'] = $this->Material_Categories_model->getById($id);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('material_categories/detail',$data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Material Categories";

        $this->form_validation->set_rules('category_id','Category id','trim|required|numeric');
        $this->form_validation->set_rules('name','NAME','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('material_categories/add',$data);
            $this->load->view('templates/footer');
        }else {
            $data = [
                "category_id" => $this->input->post('category_id'),
                "name" => $this->input->post('name'),
                "KEY" => "ulbi123"
            ];
 
            $insert = $this->Material_Categories_model->save($data);
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash','Data Ditambahkan');
                redirect('material_categories');
            }elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('material_categories');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('material_categories');
            }
            
        }

    }

    public function update($id)
    {
        $data['title'] = "Ubah Data Material Category";
        $data['data_material_categories'] = $this->Material_Categories_model->getById($id);

        $this->form_validation->set_rules('category_id','Category id','trim|required|numeric');
        $this->form_validation->set_rules('name','NAME','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/menu');
            $this->load->view('material_categories/edit',$data);
            $this->load->view('templates/footer');
        }else {
            $data = [
                "category_id" => $this->input->post('category_id'),
                "name" => $this->input->post('name'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Material_Categories_model->update($data);
            if($update['response_code']===201){
                $this->session->set_flashdata('flash','Data Ditambahkan');
                redirect('material_categories');
            }elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('material_categories');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('material_categories');
            }
            
        }

    }

    public function delete($id)
    {
        $update = $this->Material_Categories_model->delete($id);
            if($update['response_code']===200){
                $this->session->set_flashdata('flash','Dihapus');
                redirect('Material_Categories');
            }else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('Material_Categories');
            }
    }

}
