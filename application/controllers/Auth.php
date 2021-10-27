<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		already_login();
		$this->load->view('auth/index');
	}

	function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('auth_m');
			$cek_username = $this->auth_m->auth($post);
			if ($cek_username->num_rows() > 0) {
				$cek_pass = $this->auth_m->auth_pass($post);
				if ($cek_pass->num_rows() > 0) {
					if ($cek_pass->row()->status_user == 1) {
						$user = [
							'user_id' => $cek_pass->row()->id_user,
							'nama' => $cek_pass->row()->nama_user,
							'email' => $cek_pass->row()->email_user,
							'level' => $cek_pass->row()->level_user,
						];
						$this->session->set_userdata($user);
						if ($cek_pass->row()->level_user == 1) {
							redirect('admin/dashboard');
						} else if ($cek_pass->row()->level_user == 2) {
							redirect('dashboard');
						}
					} else {
						$this->session->set_flashdata('Username', $post['username']);
						$this->session->set_flashdata('Password', $post['password']);
						$this->session->set_flashdata('login', 'Akun Anda Belum Aktif, Silahkan Periksa Email Anda dan lakukan Activate!');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('Username', $post['username']);
					$this->session->set_flashdata('Password', $post['password']);
					$this->session->set_flashdata('login', 'Password Salah, Silahkan Coba Kembali!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('Username', $post['username']);
				$this->session->set_flashdata('Password', $post['password']);
				$this->session->set_flashdata('login', 'Username Salah, Silahkan Coba Kembali!');
				redirect('auth');
			}
		} else if (isset($post['profil'])) {
			login();
			$post['id'] = profil()->id_user;
			$this->load->model('auth_m');

			$config['upload_path']    = './assets/image';
			$config['allowed_types']  = 'jpg|png|jpeg|ico';
			$config['max_size']       = 10000;
			$config['file_name']       = 'user-' . random_string('alnum', 30);
			$this->load->library('upload', $config);
			$gambar = $this->upload->do_upload('image');
			if ($gambar == true) {
				if (profil()->image_user != null) {
					$target_file = './assets/image/' . profil()->image_user;
					unlink($target_file);
					$post['image'] = $this->upload->data('file_name');
				} else if (profil()->image_user == null) {
					$post['image'] = $this->upload->data('file_name');
				}
			} else {
				$post['image'] = profil()->image_user;
			}
			$this->auth_m->update_profil($post);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('succes', "Profil akun anda berhasil diperbaharui!,<br> silahkan periksa kembali!");
				redirect(($this->session->userdata('level') == 1 ? 'admin' : '') . '/dashboard');
			} else {
				$this->session->set_flashdata('error', "Profil akun anda gagal diperbaharui!,<br> silahkan periksa kembali!");
				redirect(($this->session->userdata('level') == 1 ? 'admin' : '') . '/dashboard');
			}
		} else if (isset($post['forgot'])) {
			if (cek_email($post['f_email'])->num_rows() > 0) {
				$data = cek_email($post['f_email'])->row();
				$forgot = [
					'forgot' => random_string('alnum', 50),
					'code' => random_string('numeric', 6),
					'user' => $data->id_user
				];
				$this->session->set_userdata($forgot);

				$messages = '
					Hallo, ' . $data->nama_user . ' <br>
					Sistem mengidentifikasi apakah memang benar anda yang melakukan upaya atur ulang password. <br>
					berikut data Akun anda :<br>
					
					Email : ' . $data->email_user . ' <br>
					Akun  : ' . $data->nama_user . ' <br>
					Pemintaan ulang : ' . date('d/m/Y H:i:s') . ' <br>
					Limit Penggunaan : 1 Kali <br>
					Expired : ' . date('d/m/y') . ' 23.59 <br>
					
					Silahkan Masukkan Kode Dibawah Ini : <br><br>
					
					<h1>' . $this->session->userdata('code') . '</h1> <br>

					<br>Jika Anda tidak mencoba melakukan atur ulang akun, silahkan hiraukan pesan ini<br>
					
					Terima kasih,<br>
					
					Sistem Pemetaan Prilaku';
				$recovery = [
					'destination' => $post['f_email'],
					'subject' => 'Permintaan Atur Ulang Akun',
					'massage' => $messages
				];
				$send = smtp_email($recovery);
				if ($send == 1) {
					$this->session->set_flashdata('forgot', 'Periksa email anda untuk Kode reset password!');
					redirect('auth');
				} else {
					$this->session->set_flashdata('login', 'Email Gagal dikirim, silahkan coba lagi!');
					redirect('auth/logout');
				}
			} else {
				$this->session->set_flashdata('login', "Email yang dimasukkan tidak terdaftar pada sistem!");
				redirect('auth');
			}
		} else if (isset($post['signup'])) {
			if (get_user($post['s_email'], 1)->num_rows() == 0) {
				if (get_user($post['s_username'], 2)->num_rows() == 0) {
					$this->load->model('auth_m');
					$post['id'] = random_string('numeric', 6) . '' . random_string('alnum', 24);
					$messages = '
					Hallo, ' . $post['s_name'] . ' <br>
					Sistem mengidentifikasi apakah memang benar anda yang melakukan Sign-Up Akun pada sistem. <br><br>
					Berikut data Akun anda :<br>
					
					Email : ' . $post['s_email'] . ' <br>
					Username  : ' . $post['s_username'] . ' <br>
					Level 	:  Pengguna <br>
					Pendaftaran : ' . date('d/m/Y H:i:s') . ' <br><br>
					
					Silahkan Masukkan Kode Dibawah Ini : <br>
					
					<h1>' . substr($post['id'], 0, 6) . '</h1> <br>

					<br>Jika Anda tidak mencoba melakukan Sign-up akun, silahkan hiraukan pesan ini dan segera amankan akun anda!<br><br>
					
					Terima kasih,<br>
					Sistem Pemetaan Prilaku';
					$recovery = [
						'destination' => $post['s_email'],
						'subject' => 'Sign-Up Akun Baru',
						'massage' => $messages
					];
					$send = smtp_email($recovery);
					if ($send == 1) {
						$this->auth_m->sign_up($post);
						$this->session->set_flashdata('succes', "Sign-Up Akun anda Berhasil!,<br> silahkan periksa Email untuk Aktivasi Akun Anda!");
						redirect('auth');
					} else {
						$this->session->set_flashdata('error', "Sign-Up Akun anda Gagal!, <br> Pastikan Alamat Email Benar");
						$this->session->set_flashdata('s_Email', $post['s_email']);
						$this->session->set_flashdata('s_Name', $post['s_name']);
						$this->session->set_flashdata('s_Username', $post['s_username']);
						$this->session->set_flashdata('s_Password', $post['s_password']);
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('error', "Sign-Up Akun anda Gagal!, <br> Username sudah digunakan Akun lain");
					$this->session->set_flashdata('s_Email', $post['s_email']);
					$this->session->set_flashdata('s_Name', $post['s_name']);
					$this->session->set_flashdata('s_Username', $post['s_username']);
					$this->session->set_flashdata('s_Password', $post['s_password']);
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', "Sign-Up Akun anda Gagal!, <br> Alamat Email sudah digunakan Akun lain");
				$this->session->set_flashdata('s_Email', $post['s_email']);
				$this->session->set_flashdata('s_Name', $post['s_name']);
				$this->session->set_flashdata('s_Username', $post['s_username']);
				$this->session->set_flashdata('s_Password', $post['s_password']);
				redirect('auth');
			}
		} else if (isset($post['activate'])) {
			$user1234 = get_user($post['s_email'], 1);
			if ($user1234->num_rows() > 0) {
				if ($user1234->row()->password_user == sha1($post['s_password'])) {
					$origin_code = substr($user1234->row()->id_user, 0, 6);
					$this->load->model('auth_m');
					if ($origin_code == $post['s_code']) {
						$this->auth_m->activate($user1234->row()->id_user);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('succes', "Akun Berhasil Di Aktivasi!,<br> silahkan Sign-In Pada sistem!");
							redirect('auth');
						} else {
							$this->session->set_flashdata('error', "Aktivasi Gagal!,<br> silahkan Coba kembali!");
							$this->session->set_flashdata('error', "Kode Verifikasi Salah!<br> Periksa Email Anda!");
							$this->session->set_flashdata('s_Email', $post['s_email']);
							$this->session->set_flashdata('s_Password', $post['s_password']);
							$this->session->set_flashdata('s_Code', $post['s_code']);
							redirect('auth');
						}
					} else {
						$this->session->set_flashdata('error', "Kode Verifikasi Salah!<br> Periksa Email Anda!");
						$this->session->set_flashdata('s_Email', $post['s_email']);
						$this->session->set_flashdata('s_Password', $post['s_password']);
						$this->session->set_flashdata('s_Code', $post['s_code']);
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('error', "Password Yang dimasukkan Salah!");
					$this->session->set_flashdata('s_Email', $post['s_email']);
					$this->session->set_flashdata('s_Password', $post['s_password']);
					$this->session->set_flashdata('s_Code', $post['s_code']);
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', "Email Tidak Ditemukan!");
				$this->session->set_flashdata('s_Email', $post['s_email']);
				$this->session->set_flashdata('s_Password', $post['s_password']);
				$this->session->set_flashdata('s_Code', $post['s_code']);
				redirect('auth');
			}
		} else {
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
