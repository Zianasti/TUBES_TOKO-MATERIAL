<?php
defined('BASEPATH') or exit ("No direct script access allowed");

class Purchase_details_Model extends CI_Model
{
    private $_table = 'purchase_details';
    public function get($id)
    {
        $this->db->from($this->_table);
        if ($id){
            $this->db->where('purchase_detail_id',$id);
        }
        $this->db->join('materials','materials.material_id = purchase_details.material_id');
        $this->db->join('purchases','purchases.purchase_id = purchase_details.purchase_id');
        $this->db->select('purchase_detail_id, qty, disc, subtotal, materials.name, materials.price, purchases.date, purchases.total, purchases.description');
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insert ($data)
    {
        $this->db->insert($this->_table, $data);
        return $this->db->affected_rows();
    }

    public function update ($data,$id)
    {
        $this->db->update($this->_table, $data, ['purchase_detail_id' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->_table,['purchase_detail_id' => $id]);
        return $this->db->affected_rows();
    }
}