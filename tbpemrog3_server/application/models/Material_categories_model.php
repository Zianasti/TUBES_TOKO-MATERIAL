<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Material_Categories_Model extends CI_Model{
    private $_table = 'material_categories';

    //fungsi untuk mendapatkan data
    public function get($id)
    {
        if($id){
            $this->db->from($this->_table);

            $this->db->where('category_id',$id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insert($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function update($data, $id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table, $data, ['category_id' => $id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function delete($id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table, ['category_id' => $id]);
        return $this->db->affected_rows();
        // return $query;
    }

}