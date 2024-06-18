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
}
