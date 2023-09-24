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

    public function confirmrole()
    {
        $role_id = $this->input->post('isChecked');
        $role_id = $this->input->post('role_id');
        $user_id = $this->input->post('user_id'); // Mengambil nilai user_id dari AJAX

        $data = ['role_id' => 6];
        $unconfirm = ['role_id' => 2];

        // Update berdasarkan user_id, bukan semua data di tabel user
        $this->db->where('id', $user_id);

        if ($role_id) {
            $this->db->update('user', $data);
        } else {
            $this->db->update('user', $unconfirm);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota berhasil dikonfirmasi!</div>');
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function saldo()
    {
        $this->db->select_sum('jumlah');
        $query = $this->db->get('user_bayar');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah;
        } else {
            return 0;
        }
    }
}
