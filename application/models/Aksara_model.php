<?php

class Aksara_model extends CI_Model
{
    function get_data()
    {
        return $this->db->get('aksara')->result();
    }

    function insert_data($data_array)
    {
        return $this->db->insert('aksara', $data_array);
    }

    function update_data($id_aksara, $data_array)
    {
        $this->db->where('id_aksara', $id_aksara);
        return $this->db->update('aksara', $data_array);
    }

    function delete_data($id_aksara)
    {
        $this->db->where('id_aksara', $id_aksara);
        return $this->db->delete('aksara');
    }
}
