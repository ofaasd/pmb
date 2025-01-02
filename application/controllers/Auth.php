<?php
	use Zend\Crypt\Password\Bcrypt;
	class Auth extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('status') == 'login_camaba') {
				# code...
				redirect("dashboard");
			}
			$this->load->model('Model_front');
		}

		function index()
		{
			$email = $this->input->post("email");
			$p = $this->input->post("password");
			$gelombang = $this->input->post('gelombang');

			$bcrypt = new Bcrypt();
			$cek_user = $this->db->get_where('user_guest', array('email' => $email));
			if($this->input->post("g-recaptcha-response") == false){
				$this->session->set_flashdata('gagal', 'Harap Mengisi captcha');
				redirect("welcome/new_login/" . $gelombang);
			}
			if ($cek_user->num_rows() > 0) {
				# code...
				
				$md5 = md5($p);
				$get_login = $this->db->limit(1)->order_by('id','asc')->get_where('user_guest', array('email' => $email, 'password' => $md5));
				
				if($get_login->num_rows() > 0){
					$rs = $get_login->row();
					$data_sess = array(
										'nama' => $rs->nama,
										'nim' => $rs->email,
										'id_user' => $rs->id,
										'status' => 'login_camaba',
										'gelombang' => $gelombang
									  );
					$this->session->set_userdata($data_sess);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('gagal', 'Password Salah');
					redirect('welcome/new_login/' . $gelombang);
				}
			}else{
				//echo "gagal_login";
				$this->session->set_flashdata('gagal', 'Email Tidak Terdaftar');
				redirect("welcome/new_login/" . $gelombang);
			}
			// $pass = $bcrypt->create("admin");
			//echo "gagal login";

		}
		function register()
		{
			$this->load->config('email');
			$this->load->library('email');
			
			$from = $this->config->item('smtp_user');
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$no_wa = $this->input->post('no_wa');
			$gelombang = $this->input->post('gelombang');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$tanggal = date("Ymd",strtotime($tgl_lahir));
			if($this->input->post("g-recaptcha-response") == false){
				$this->session->set_flashdata('gagal', 'Harap Mengisi captcha');
				redirect("welcome/register/" . $gelombang);
			}
			$cek = $this->db->get_where('user_guest', array('email' => $email));
			
			
			if($cek->num_rows() > 0 ){
				$this->session->set_flashdata('gagal', 'Akun sudah pernah terdaftar harap hubungi pihak Admisi STIFAR');
				redirect("welcome/register/" . $gelombang);
			}else{
				if(empty($gelombang) || $gelombang == 0){
					$this->session->set_flashdata('gagal', 'Gelombang Pendaftaran Tidak Ditemukan');
					redirect("welcome/register/" . $gelombang);
				}
				$new_email = '';
				if(empty($email)){
					$pecah = explode(" ",$nama);
					$nama = $pecah[0];
					$last_id = $this->db->order_by('id','desc')->limit(1)->get('pmb_peserta_online')->row();
					$new_email = $nama . ($last_id->id+1) . "@2025.psb.stifar.id";
				}else{
					$new_email = $email;
				}
				$user_guest = array(
					"nama" => $nama,
					"email" => $new_email,
					"tgl_lahir" => date('Y-m-d',strtotime($tgl_lahir)),
					"password" => md5($tanggal),
				);
				$insert = $this->db->insert("user_guest",$user_guest);
				if($insert){
				
					$subject = "Penerimaan Mahasiswa Baru STIFAR";
					
					$message = "Halo, " . $nama . ". Pendaftaran berhasil, Anda sudah tergabung sebagai Calon Mahasiswa di Sekolah Tinggi Ilmu Farmasi  \n Berikut Username dan Password anda adalah : \n username : " . $new_email  . "\n Password : " . $tanggal . "\n Silahkan Login kembali melalui link berikut \n https://pendaftaran.stifar.ac.id/welcome/new_login \n\n jika terdapat kendala dapat menghubungi no. 081393111171 \n sebagai media center PMB STIFAR 2025 \n\n Terimakasih, \n Admin PMB STIFAR";
					if(!empty($email)){
						$this->email->set_newline("\r\n");
						$this->email->from($from);
						$this->email->to($email);
						$this->email->subject($subject);
						$this->email->message($message);

						if ($this->email->send()) {
							$this->session->set_flashdata('berhasil', 'AKUN BERHASIL DIBUAT, SILAHKAN CEK EMAIL / NO WA ANDA UNTUK MELIHAT PASSWORD YANG TELAH DIKIRIMKAN KE EMAIL ANDA');
							redirect("welcome/new_login/" . $gelombang);
						} else {
							$this->session->set_flashdata('gagal', show_error($this->email->print_debugger()));
							redirect("welcome/register/" . $gelombang);
						}
					}

					$dataSending = Array();
					$dataSending["api_key"] = "X2Y7UZOZT0WVQVTG";
					$dataSending["number_key"] = "3EYdFkP7uhk5RX6D";
					
					$dataSending["phone_no"] = $no_wa;
					$dataSending["message"] = $message;

					$curl = curl_init();

					curl_setopt_array($curl, array(
						CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						CURLOPT_POSTFIELDS => json_encode($dataSending),
						CURLOPT_HTTPHEADER => array(
						  'Content-Type: application/json'
						),
					  ));

					  $response = curl_exec($curl);
					  $this->session->set_flashdata('berhasil', 'AKUN BERHASIL DIBUAT, SILAHKAN CEK NO WA ANDA UNTUK MELIHAT PASSWORD YANG TELAH DIKIRIMKAN');
					  redirect("welcome/new_login/" . $gelombang);
				}else{
					$this->session->set_flashdata('gagal', 'Akun gagal insert ke DB');
					redirect("welcome/register/" . $gelombang);
				}
			}
		}
	}
?>
