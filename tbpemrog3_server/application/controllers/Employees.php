<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Employees extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employees_model');
    }

    public function index_get()
    {
        $id = $this->get('employee_id');
        $data = $this->Employees_model->get($id);
        if ($data){
            $this->response(
                [
                    'data'  => $data,
                    'status' => 'success',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'data' => false,
                    'status' => 'Data Tidak Ada',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function index_post()
    {
        $data = array(
            'employee_id' => $this->post('employee_id'),
            'name' => $this->post('name'),
            'dob' => $this->post('dob'),
            'gender' => $this->post('gender'),
            'email' => $this->post('email')
        );

        $cek_data = $this->Employees_model->get($this->post('employee_id'));

        if ($data['employee_id'] == NULL || $data['name'] == NULL || $data['dob'] == NULL 
        || $data['gender'] == NULL || $data['email'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($cek_data) {
            $this->response(
                [
                    'status'=> false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Employees_model->insert($data) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Berhasil Ditambahkan',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Menambahkan Data'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
    function index_put()
    {
        $id = $this->put('employee_id');
        $data = array(
            'employee_id' => $this->put('employee_id'),
            'name' => $this->put('name'),
            'dob' => $this->put('dob'),
            'gender' => $this->put('gender'),
            'email' => $this->put('email')
        );

        if ($id == NULL) {
            $this->response (
                [
                'status' => $id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Employees_model->update($data,$id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data Dengan ID '.$id.' Berhasil Diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_delete()
    {
        $id = $this->delete('employee_id');

        if ($id == NULL){
            $this->response(
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Employees_model->delete($id) > 0) {
            $this ->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Dengan ID '.$id.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Dengan ID '.$id.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}