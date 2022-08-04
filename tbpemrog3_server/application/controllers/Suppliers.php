<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Suppliers extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Suppliers_model');
    }

    public function index_get()
    {
        $id = $this->get('supplier_id');
        $data = $this->Suppliers_model->get($id);
        if ($data){
            $this->response(
                [
                    'data' => $data,
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
            'name' => $this->post('name'),
            'phone' => $this->post('phone'),
            'address' => $this->post('address'),
            'email' => $this->post('email')
        );

        if ($data['name'] == NULL || $data['phone'] == NULL
        || $data['address'] == NULL || $data['email'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data yang dikirim tidak boleh  ada yang kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Suppliers_model->insert($data)>0){
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
                    'message' => 'Gagal menambahkan data'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
        $id = $this->put('supplier_id');
        $data = array(
            'supplier_id' => $this->put('supplier_id'),
            'name' => $this->put('name'),
            'phone' => $this->put('phone'),
            'address' => $this->put('address'),
            'email' => $this->put('email')
        );
        
        if ($id == NULL) {
            $this->response (
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Suppliers_model->update($data, $id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data dengan ID '.$id.' Berhasil Diubah'
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal Mengubah Data'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_delete()
    {
        $id = $this->delete('supplier_id');
        if($id == NULL) {
            $this->response(
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Suppliers_model->delete($id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Dengan ID '.$id.' Berhasil Dihapus'
                ],
                RestController::HTTP_OK
            );
        }else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Dengan ID '.$id.' Tidak Ditemukan'
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}
