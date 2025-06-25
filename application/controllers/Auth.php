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
			// if($this->input->post("g-recaptcha-response") == false){
			// 	$this->session->set_flashdata('gagal', 'Harap Mengisi captcha');
			// 	redirect("welcome/new_login/" . $gelombang);
			// }
			if ($cek_user->num_rows() > 0) {
				# code...
				// if (!$this->_verify_recaptcha($this->input->post("g-recaptcha-response"))) {
				// 	$this->session->set_flashdata('gagal', 'ReCAPTCHA verification failed.');
				// 	redirect("welcome/new_login/" . $gelombang);
				// }

				$user_data = $cek_user->row();
				$stored_password_hash = $user_data->password;
				
				// Verify password using Bcrypt
				if ($bcrypt->verify($p, $stored_password_hash)) {
					// If the stored password is an MD5 hash, update it to Bcrypt
					if (strlen($stored_password_hash) === 32 && ctype_xdigit($stored_password_hash)) { // Check if it's a typical MD5 hash
						$this->db->update('user_guest', ['password' => $bcrypt->create($p)], ['id' => $user_data->id]);
					}
					$rs = $user_data; // Re-assign user_data to $rs after potential update
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
					if (strlen($stored_password_hash) === 32 && ctype_xdigit($stored_password_hash)) { // Check if it's a typical MD5 hash
						if(md5($p) === $stored_password_hash){
							$this->db->update('user_guest', ['password' => $bcrypt->create($p)], ['id' => $user_data->id]);
							$this->session->set_flashdata('gagal', 'Please do login again');
							redirect('welcome/new_login/' . $gelombang);
						}else{
							$this->session->set_flashdata('gagal', 'Password Salah');
							redirect('welcome/new_login/' . $gelombang);
						}
					}else{
						$this->session->set_flashdata('gagal', 'Password Salah');
						redirect('welcome/new_login/' . $gelombang);
					}
				}
			}else{
				//echo "gagal_login";
				$this->session->set_flashdata('gagal', 'Email Tidak Terdaftar');
				redirect("welcome/new_login/" . $gelombang);
			}

		}
		function register()
		{
			$bcrypt = new Bcrypt();
			$this->load->config('email');
			$this->load->library('email');
			
			$from = $this->config->item('smtp_user');
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$no_wa = $this->input->post('no_wa');
			$gelombang = $this->input->post('gelombang');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$tanggal = date("Ymd",strtotime($tgl_lahir));
			// if($this->input->post("g-recaptcha-response") == false){
			// 	$this->session->set_flashdata('gagal', 'Harap mengisi captcha.');
			// 	redirect("welcome/register/" . $gelombang);
			// }
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
				if(empty($email)){ // This logic is unusual for registration, usually email is required.
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
					"tgl_lahir" => date('Y-m-d', strtotime($tgl_lahir)),
					"password" => $bcrypt->create($tanggal), // Hash password using Bcrypt
					"no_wa" => $no_wa
				);
				$insert = $this->db->insert("user_guest",$user_guest);
				if($insert){
				
					$subject = "Penerimaan Mahasiswa Baru STIFAR";
					
					$message = "Halo, " . $nama . ". Pendaftaran berhasil, Anda sudah tergabung sebagai Calon Mahasiswa di Sekolah Tinggi Ilmu Farmasi  \n Berikut Username dan Password anda adalah : \n username : " . $new_email  . "\n Password : " . $tanggal . "\n Silahkan Login kembali melalui link berikut \n https://pendaftaran.stifar.ac.id/ \n\n jika terdapat kendala dapat menghubungi no. 081393111171 \n sebagai media center PMB STIFAR 2025 \n\n Terimakasih, \n Admin PMB STIFAR";
					if(!empty($email)){ // Only send email if email is provided
						$this->email->set_newline("\r\n");
						$this->email->from($from);
						$this->email->to($email);
						$this->email->subject($subject);
						$this->email->message($message);

						if ($this->email->send()) {
							$this->session->set_flashdata('berhasil', 'AKUN BERHASIL DIBUAT, Berikut Username dan Password anda : \n username : "' . $new_email  . '"\n Password : "' . $tanggal . '"\n Silahkan login kembali');
						} else {
							$this->session->set_flashdata('gagal', 'Gagal mengirim email: ' . $this->email->print_debugger());
							redirect("welcome/register/" . $gelombang);
						}
					}

					// Send WhatsApp message (API key and number should be in config)
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

					//Kirim pesan wa ke admin 
					$message2 = "*Notifikasi Sistem*,
terdapat user pendaftaran baru dengan email sebagai berikut : 
email : " . $new_email  . "";
					$dataSending = Array();
					$dataSending["api_key"] = "X2Y7UZOZT0WVQVTG"; // Hardcoded API key
					$dataSending["number_key"] = "3EYdFkP7uhk5RX6D";
					
					$dataSending["phone_no"] = '082241139843';
					$dataSending["message"] = $message2;

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
					  $this->session->set_flashdata('berhasil', 'AKUN BERHASIL DIBUAT, SILAHKAN CEK NO WA ANDA UNTUK MELIHAT PASSWORD. Berikut username dan password anda username : "' . $new_email  . '" Password : "' . $tanggal . '"');
					  redirect("welcome/new_login/" . $gelombang);
				}else{
					$this->session->set_flashdata('gagal', 'Akun gagal insert ke DB');
					redirect("welcome/register/" . $gelombang);
				}
			}
		}

		/**
		 * Verifies the reCAPTCHA response with Google.
		 * @param string $response The reCAPTCHA response token.
		 * @return bool True if verification is successful, false otherwise.
		 */
		private function _verify_recaptcha($response) {
			// IMPORTANT: Replace 'YOUR_RECAPTCHA_SECRET_KEY' with your actual reCAPTCHA secret key.
			// This key should ideally be loaded from a configuration file, not hardcoded.
			$secret = 'YOUR_RECAPTCHA_SECRET_KEY'; 
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $response);
			$responseData = json_decode($verifyResponse);

			if ($responseData->success) {
				return true;
			}
			return false;
		}
	}
?>
