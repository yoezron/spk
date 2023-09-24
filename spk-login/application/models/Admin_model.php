<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function hapus_data($where, $user)
    {
        $this->db->where($where);
        $this->db->delete($user);
    }
}
