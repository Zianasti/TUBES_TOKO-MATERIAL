<?php
defined('BASEPATH') or exit ("No direct script access allowed");

class Purchases_Model extends CI_Model
{
    private $_table = 'purchases';
    public function get($id)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('purchase_id',$id);
        }
        $this->db->join('suppliers','suppliers.supplier_id = purchases.supplier_id');
        $this->db->select('purchase_id, date, total, description, suppliers.supplier_id, suppliers.name');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert ($data)
    {
        $this->db->insert('purchases', [
            'purchase_id' => '',
            'date' => $data['date'],
            'total' => $data['total'],
            'description' => $data['description'],
            'supplier_id' => $data['supplier_id']
        ]);
        $query = $this->db->insert_id();
        return $query;
    }

    public function update ($data,$id)
    {
        $this->db->update($this->_table, $data, ['purchase_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['purchase_id' => $id]);
        return $this->db->affected_rows();
    }
}