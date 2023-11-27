<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Ambil nilai gaji dari pengguna yang sedang login
        $gaji = $data['user']['gaji'];

        // Ambil data iuran sesuai dengan nilai gaji dari tabel "user_iuran"
        $data['iuran'] = $this->db->get_where('user_iuran', ['gaji' => $gaji])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'name' => $this->input->post('name', true),
                'kampus' => $this->input->post('kampus', true),
                'prodi' => $this->input->post('prodi', true),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'status' => $this->input->post('status', true),
                'employer' => $this->input->post('employer', true),
                'gaji' => $this->input->post('gaji', true)
            ];
            $email = $this->input->post('email');

            //gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($update);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda berhasil diubah!</div>');
            redirect('user/edit');
        }
    }

    public function formulir()
    {
        $data['title'] = 'Formulir Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kampus', 'Asal Kampus', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/formulir', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'name' => $this->input->post('name', true),
                'kampus' => $this->input->post('kampus', true),
                'prodi' => $this->input->post('prodi', true),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'status' => $this->input->post('status', true),
                'employer' => $this->input->post('employer', true),
                'gaji' => $this->input->post('gaji', true)
            ];
            $email = $this->input->post('email');

            //gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($update);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil mendaftar! Mohon menunggu konfirmasi.</div>');
            redirect('user');
        }
    }
    public function adart()
    {
        $data['title'] = 'AD-ART';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat tampilan PDF Viewer

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/adart', $data);
        $this->load->view('templates/footer');
    }

    public function manifesto()
    {
        $data['title'] = 'Manifesto';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/manifesto', $data);
        $this->load->view('templates/footer');
    }

    public function sejarah()
    {
        $data['title'] = 'Sejarah SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/sejarah', $data);
        $this->load->view('templates/footer');
    }

    public function confirm()
    {
        $data['title'] = 'Konfirmasi Calon Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->db->where('role_id =', 2);
        $data['member'] = $this->db->order_by('date_created', 'desc');
        $data['member'] = $this->db->get('user')->result_array();
        $this->db->where('role_id !=', 1);
        $this->db->where('role_id !=', 2);
        $data['active'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/confirm', $data);
        $this->load->view('templates/footer');
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

    public function changepassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('user/changepassword');
                } else {
                    // sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function informasi()
    {
        $data['title'] = 'Informasi Serikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/informasi', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Rincian Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('User_model');
        $data['active'] = $this->User_model->getUserById($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function bayar()
    {
        $data['title'] = 'Pembayaran Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model');
        $data['total_bayar'] = $this->User_model->saldo();
        $data['pembayaran'] = $this->db->order_by('date_created', 'desc');
        $data['pembayaran'] = $this->db->get('user_bayar')->result_array();
        $data['member'] = $this->db->get('user')->result_array();
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bayar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'date_created' => time(),
                'bulan' => $this->input->post('bulan'),
                'name' => $this->input->post('name'),
                'jumlah' => $this->input->post('jumlah'),
            ];
            $this->db->insert('user_bayar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil Ditambahkan!</div>');
            redirect('user/bayar');
        }
    }

    public function Pdf_Viewer()
    {
        $this->load->view('user/pdf_viewer');
    }

    public function faq()
    {
        $this->load->view('user/faq'); // Memuat halaman FAQ
    }

    public function manfaat()
    {
        $this->load->view('user/manfaat'); // Memuat halaman FAQ
    }

    public function addinfo()
    {
        $data['title'] = 'Tambah Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('info_message', 'Informasi', 'required');
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/addinfo', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil informasi dari form
            $info_message = $this->input->post('info_message');

            // Proses upload file jika dibutuhkan
            $upload_file = $_FILES['info_file']['name'];
            $file_name = ''; // Inisialisasi nama file
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/info/'; // Sesuaikan dengan path penyimpanan file
                $config['max_size'] = 2048; // Ukuran maksimal file (dalam kilobita)

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('info_file')) {
                    $file_info = $this->upload->data();
                    $file_name = $file_info['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    // Tampilkan pesan error jika upload gagal
                    // Misalnya: echo $error;
                }
            }
            $info_title = $this->input->post('info_title');
            // Simpan informasi ke dalam database
            $insert_data = array(
                'judul' => $info_title,
                'info' => $info_message,
                'gambar' => $file_name,
                // Sesuaikan dengan field lain yang ada di tabel database
            );

            $this->db->insert('info', $insert_data); // Sesuaikan dengan nama tabel database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil disimpan!</div>');
            redirect('user/addinfo');
            // Redirect atau tampilkan pesan sukses
            // Misalnya: redirect('nama_controller/nama_method_lain');
        }
    }
    public function deleteinfo()
    {
        $info_id = $this->input->post('info_id');

        // Ambil nama file gambar berdasarkan ID sebelum menghapus dari database
        $info = $this->db->get_where('info', ['id' => $info_id])->row_array();
        $file_path = './assets/img/info/' . $info['gambar'];

        // Hapus file gambar jika ada
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data dari database berdasarkan ID
        $this->db->where('id', $info_id);
        $this->db->delete('info');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil dihapus!</div>');
        redirect('user/addinfo');
    }
    public function addPost()
    {
        $data['title'] = 'Kirim Tulisan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_posts'] = $this->db->get_where('posting', ['penulis' => $data['user']['name']])->result_array();

        $this->form_validation->set_rules('judul_tulisan', 'Judul Tulisan', 'required');
        $this->form_validation->set_rules('isi_tulisan', 'Isi Tulisan', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan, seperti untuk 'gambar' atau 'tag'

        if ($this->form_validation->run() == false) {
            // Jika validasi form gagal, tampilkan view form
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/addpost', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil informasi dari form
            $judul_tulisan = $this->input->post('judul_tulisan');
            $isi_tulisan = $this->input->post('isi_tulisan');
            $jenis_tulisan = $this->input->post('jenis_tulisan');
            // Ambil nama penulis dari data user
            $penulis = $data['user']['name']; // Sesuaikan dengan nama kolom yang menyimpan nama user

            // Proses upload file jika dibutuhkan
            $upload_file = $_FILES['gambar']['name'];
            $file_name = ''; // Inisialisasi nama file
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/posting/'; // Sesuaikan dengan path penyimpanan file
                $config['max_size'] = 2048; // Ukuran maksimal file (dalam kilobita)

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $file_info = $this->upload->data();
                    $file_name = $file_info['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    // Tampilkan pesan error jika upload gagal
                    // Misalnya: echo $error;
                }
            }

            // Simpan informasi ke dalam database
            $insert_data = array(
                'judul_tulisan' => $judul_tulisan,
                'isi_tulisan' => $isi_tulisan,
                'jenis_tulisan' => $jenis_tulisan,
                'penulis' => $penulis,
                'gambar' => $file_name,
                'waktu_posting' => date('Y-m-d H:i:s'), // Tambahkan waktu posting saat ini
                'tag' => $this->input->post('tag'), // Sesuaikan dengan nama kolom untuk tag
                // Sesuaikan dengan field lain yang ada di tabel database
            );

            $this->db->insert('posting', $insert_data); // Sesuaikan dengan nama tabel database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tulisan berhasil diposting!</div>');
            redirect('user/addpost');
            // Redirect atau tampilkan pesan sukses
            // Misalnya: redirect('nama_controller/nama_method_lain');
        }
    }

    public function delete_post($post_id)
    {
        // Ambil data postingan berdasarkan ID
        $post = $this->db->get_where('posting', ['id' => $post_id])->row_array();

        // Pastikan postingan ditemukan
        if (!$post) {
            // Tampilkan pesan bahwa postingan tidak ditemukan atau error handling lainnya
            redirect('user/addPost'); // Ganti dengan halaman yang sesuai
        }

        // Hapus file gambar terkait jika ada
        $gambar = $post['gambar'];
        if ($gambar) {
            $path = './assets/img/posting/' . $gambar;
            if (file_exists($path)) {
                unlink($path); // Menghapus file gambar
            }
        }

        // Hapus postingan dari database
        $this->db->where('id', $post_id);
        $this->db->delete('posting');

        // Tampilkan pesan bahwa postingan berhasil dihapus atau redirect ke halaman lain
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Postingan berhasil dihapus.</div>');
        redirect('user/addPost'); // Ganti dengan halaman yang sesuai
    }
    public function updatePost($post_id)
    {
        $judul_tulisan = $this->input->post('edit_judul_tulisan');
        $isi_tulisan = $this->input->post('edit_isi_tulisan');

        // Lakukan validasi input jika diperlukan

        $update_data = array(
            'judul_tulisan' => $judul_tulisan,
            'isi_tulisan' => $isi_tulisan,
            // Tambahan field lain yang ingin diubah
        );

        $this->db->where('id', $post_id);
        $this->db->update('posting', $update_data);

        // Set flashdata atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tulisan berhasil diperbarui!</div>');
        redirect('user/addPost'); // Ganti dengan halaman yang sesuai
    }

    public function kartu()
    {
        $data['title'] = 'Kartu Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kartu', $data);
        $this->load->view('templates/footer', $data);
    }
}
