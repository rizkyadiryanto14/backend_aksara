<?php

/**
 * @property $db
 */

class User_model extends CI_Model
{
    function get_all_user()
    {
        return $this->db->get('users')->result();
    }

    function get_user_by_username($username)
    {
        return $this->db->get_where('users', array('username' => $username))->row_array();
    }
    function get_user_by_id($id_users)
    {
        return $this->db->get_where('users', array('id_users' => $id_users))->row_array();
    }

    function insert_user($postData)
    {
        return $this->db->insert('users', $postData);
    }

    function check_username_exists($username)
    {
        return $this->db->get_where('users', array('username' => $username))->row_array();
    }

    function delete_users($id_users)
    {
        $this->db->where('id_users', $id_users);
        return $this->db->delete('users');
    }

    function make_query(): void
    {
        $this->db->select('*')
            ->from("users");
        if (isset($_POST["search"]["value"])) {
            $this->db->like("username", $_POST["search"]["value"]);
            $this->db->or_like("email", $_POST["search"]["value"]);
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_users', 'DESC');
        }
    }

    public function make_datatables()
    {
        $this->make_query();
        if (isset($_POST["length"]) && $_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from("users");
        return $this->db->count_all_results();
    }
}
