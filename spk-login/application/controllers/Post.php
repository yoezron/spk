<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $data['all_posts'] = $this->db->get('posting')->result_array();

        $this->load->view('page/head');
        $this->load->view('page/preloader');
        $this->load->view('page/header');
        $this->load->view('page/popup');
        $this->load->view('page/offcanvus');
        $this->load->view('post/all_posts', $data);
        $this->load->view('post/footer', $data);
    }

    public function view($post_id)
    {

        $data['post'] = $this->db->get_where('posting', ['id' => $post_id])->row_array();


        if ($data['post']) {

            $this->load->view('post/header', $data);
            $this->load->view('post/view', $data);
            $this->load->view('post/footer', $data);
        } else {
            // Jika postingan tidak ditemukan, tampilkan pesan atau lakukan penanganan lainnya
            echo "Postingan tidak ditemukan";
        }
    }
}
