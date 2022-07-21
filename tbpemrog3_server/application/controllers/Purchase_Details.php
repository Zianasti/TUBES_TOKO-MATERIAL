<?php
defined('BASEPATH') or exit ('No direct script access allowed');

require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Purchase_Details extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Purchase_details_model');
    }

    public function index_get()
    {
        $id = $this->get('purchase_detail_id');
        $data = $this->Purchase_details_model->get($id);

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
            'purchase_detail_id' => $this->post('purchase_detail_id'),
            'qty' => $this->post('qty'),
            'disc' => $this->post('disc'),
            'subtotal' => $this->post('subtotal'),
            'material_id' => $this->post('material_id'),
            'purchase_id' => $this->post('purchase_id')
        );

        $cek_data = $this->Purchase_details_model->get($this->post('purchase_detail_id'));

        if ($data['purchase_detail_id'] == NULL || $data['qty'] == NULL || $data['disc'] == NULL || $data['subtotal'] == NULL || $data['material_id']==NULL || $data['purchase_id']==NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif($cek_data) {
            $this->response(
                [
                    'status' =>false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Purchase_details_model->insert($data)>0){
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
        $id = $this->put('purchase_detail_id');
        $data = array (
            'purchase_detail_id' => $this->put('purchase_detail_id'),
            'qty' => $this->put('qty'),
            'disc' => $this->put('disc'),
            'subtotal' => $this-> put('subtotal'),
            'material_id' => $this->put('material_id'),
            'purchase_id' => $this->put('purchase_id')
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
        } elseif ($this->Purchase_details_model->update($data,$id) > 0)
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
        $id = $this->delete('purchase_detail_id');
        if($id==NULL){
            $this->response(
                [
                    'status' => $id,
                    'response_code' =>RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        } elseif ($this->Purchase_details_model->delete($id) > 0) {
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