<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employees_model'); 
        $this->load->library('form_validation'); //load fom validation
        $this->load->library('session'); //load session
    }

    public function index()
    {
        $data['title'] = "List Data Employees";

        $data['data_employees'] = $this->Employees_model->getAll();

        $this->load->view('Employees/index',$data);
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data Employees";

        $data['data_employees'] = $this->Employees_model->getById($id);

        $this->load->view('employees/detail',$data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Employees";

        $this->form_validation->set_rules('employee_id','ID Karyawan','trim|required|numeric');
        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('dob','Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('gender','Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('employees/add',$data);
        }else {
            $data = [
                "employee_id" => $this->input->post('employee_id'),
                "name" => $this->input->post('name'),
                "dob" => $this->input->post('dob'),
                "gender" => $this->input->post('gender'),
                "email" => $this->input->post('email'),

                "KEY" => "ulbi123"
            ];
 
            $insert = $this->Employees_model->save($data);
            if($insert['response_code']===201){
                $this->session->set_flashdata('flash','Data Ditambahkan');
                redirect('employees');
            }elseif ($insert['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('employees');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('employees');
            }
            
        }

    }

    public function update($id)
    {

        $data['title'] = "Ubah Data Employees";
        $data['data_employees'] = $this->Employees_model->getById($id);

        $this->form_validation->set_rules('employee_id','ID Karyawan','trim|required|numeric');
        $this->form_validation->set_rules('name','Nama','trim|required');
        $this->form_validation->set_rules('dob','Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('gender','Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('employees/edit',$data);
        }else {
            $data = [
                "employee_id" => $this->input->post('employee_id'),
                "name" => $this->input->post('name'),
                "dob" => $this->input->post('dob'),
                "gender" => $this->input->post('gender'),
                "email" => $this->input->post('email'),

                "KEY" => "ulbi123"
            ];

            $update = $this->Employees_model->update($data);
            if($update['response_code']===201){
                $this->session->set_flashdata('flash','Data Diedit');
                redirect('employees');
            }elseif ($update['response_code']===400) {
                $this->session->set_flashdata('message','Data Duplikat');
                redirect('employees');
            }else{
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('employees');
            }
            
        }

    }

    public function delete($id)
    {
        $update = $this->Employees_model->delete($id);
            if($update['response_code']===200){
                $this->session->set_flashdata('flash','Dihapus');
                redirect('Employees');
            }else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('Employees');
            }
    }

}
