<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Material_Categories extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Material_categories_model');
    }

//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
    public function index_get()
    {
        $id = $this->get('category_id');
        $data=$this->Material_categories_model->get($id);
        //jika variabel $data terdapat data di dalamnya
        if ($data){
            $this->response(
                [
                    'data' => $data,
                    'status' => 'success',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
            //jika tidak ada data
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
            'category_id' => $this->post('category_id'),
            'name' => $this->post('name')
        );

        $cek_data = $this->Material_categories_model->get($this->post('category_id'));
        
        //Jika semua data wajib diisi
        if ($data['category_id'] == NULL || $data['name'] == NULL) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data duplikat
        } else if ($cek_data) {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Duplikat',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data tersimpan
        } elseif ($this->Material_categories_model->insert($data) > 0) {
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
                    'message' => 'Gagal Menambahkan Data',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }

    function index_put()
    {
        $id = $this->put('category_id');
        $data = array(
            'category_id' => $this->put('category_id'),
            'name' => $this->put('name')
        );

        //Jika field npm tidak diisi
        if ($id == NULL) {
            $this->response(
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'ID Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Material_categories_model->update($data, $id) > 0) {
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
        $id = $this->delete('category_id');

        //Jika field npm tidak diisi
        if ($id == NULL) {
            $this->response(
                [
                    'status' => $id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Material_categories_model->delete($id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data Dengan ID '.$id.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
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