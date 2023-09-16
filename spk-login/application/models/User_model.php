<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getMemberRole()
    {
        $query = "SELECT `user`.*, `user_role`.`role`
                    FROM `user` JOIN `user_role`
                    ON `user`.`role_id` = `user_role`.`role`
                ";

        return $this->db->query($query)->result_array();
    }
}
