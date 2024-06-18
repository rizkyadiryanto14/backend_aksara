<?php
class Content_model extends CI_Model
{

    public function get_all_content()
    {
        $query = $this->db->get('content');
        return $query->result_array();
    }

    public function get_content_by_id($id_content)
    {
        $query = $this->db->get_where('content', array('id_content' => $id_content));
        return $query->row_array();
    }

    public function create_content($data)
    {
        return $this->db->insert('content', $data);
    }

    public function update_content($id_content, $data)
    {
        $this->db->where('id_content', $id_content);
        return $this->db->update('content', $data);
    }

    public function delete_content($id_content)
    {
        $this->db->where('id_content', $id_content);
        return $this->db->delete('content');
    }

    public function all_content_count()
    {
        return $this->db->count_all('content');
    }

    public function all_content($limit, $start, $col, $dir)
    {
        $query = $this->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('content');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function content_search($limit, $start, $search, $col, $dir)
    {
        $query = $this->db
            ->like('judul', $search)
            ->or_like('jenis_konten', $search)
            ->or_like('isi', $search)
            ->or_like('created_by', $search)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('content');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function content_search_count($search)
    {
        $query = $this->db
            ->like('judul', $search)
            ->or_like('jenis_konten', $search)
            ->or_like('isi', $search)
            ->or_like('created_by', $search)
            ->get('content');

        return $query->num_rows();
    }
}
