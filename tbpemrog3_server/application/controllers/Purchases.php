<?php
defined('BASEPATH') or exit ('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Purchases extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchases_model');
    }

    public function index_get()
    {
        $id = $this->get('purchase_id');
        $data = $this->Purchases_model->get($id);

        if($data){
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
            'date' => $this->post('date'),
            'total' => $this->post('total'),
            'description' => $this->post('description'),
            'supplier_id' => $this->post('supplier_id')
        );

        if ($data['date'] == NULL || $data['total'] === NULL || $data['description']==NULL || $data['supplier_id']==NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Purchases_model->insert($data)>0){
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
                    'message' => 'Gagal menambahkan data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
        $id = $this->put('purchase_id');
        $data = array (
            'purchase_id' => $this->put('purchase_id'),
            'date' => $this->put('date'),
            'total' => $this-> put('total'),
            'description' => $this->put('description'),
            'supplier_id' => $this->put('supplier_id')
        );

        if($id == NULL) {
            $this->response(
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data dengan ID '.$id.' berhasil diubah',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Purchases_model->update($data,$id) > 0)
        {
            $this->response(
                [
                    'status' =>true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data dengan ID '.$id.' Berhasil diubah',
                ],
                RestController::HTTP_CREATED
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Gagal mengubah data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_delete()
    {
        $id = $this->delete('purchase_id');
        if($id==NULL){
            $this->response(
                [
                    'status' => $id,
                    'response_code' =>RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Purchases_model->delete($id) > 0) {
            $this->response(
                [
                    'status' =>true,
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
                    'message' => 'Data dengan ID '.$id.' Tidak Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}