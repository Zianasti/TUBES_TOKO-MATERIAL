<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Suppliers_Model extends CI_Model{
    private $_table = 'suppliers';

    public function get($id)
    {
        if($id){
            $this->db->from($this->_table);

            $this->db->where('supplier_id', $id);
            $query = $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table);
            $query = $this->db->get()->result_array();
            return $query;
        }
    }

    public function insert($data)
    {
        $this->db->insert('suppliers', [
            'supplier_id' => '',
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email']
        ]);
        $query = $this->db->insert_id();
        return $query;
    }

    public function update($data,$id)
    {
        $this->db->update($this->_table, $data,['supplier_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table, ['supplier_id' => $id]);
        return $this->db->affected_rows();
    }
}