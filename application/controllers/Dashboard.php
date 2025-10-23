<?php
	class Dashboard extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('status') != 'login_camaba')
			{
				redirect(base_url() . '/welcome/login/' . $this->session->userdata("gelombang"));
			}
			$this->load->model('pmb_model/Model_pmb');
			$this->load->model('Model_online');
		}

		function index()
		{
			$gelombang = $this->Model_online->get_gelombang('pmb_gelombang');
			
			if($gelombang->num_rows() > 0){	
				$data['title'] = "Dashboard - Calon Mahasiswa Baru";
				$hasil['cur_gel'] = $this->session->userdata("gelombang");
				$user_id = $this->session->userdata("id_user");		
				$hasil['pmb_peserta'] = $this->db->where('user_id',$user_id)->where('gelombang',$hasil['cur_gel'])->get('pmb_peserta_online')->row();	
				$hasil['gelombang'] = $this->db->where('id',$hasil['cur_gel'])->get('pmb_gelombang')->row();
				$data['content'] = $this->load->view('pmb_online/dashboard',$hasil,true);
				//echo $hasil['pmb_peserta']->id;
			}else{
				$hasil['msg'] = "Belum ada gelombang pendaftaran";
				$data['title'] = "Formulir Mahasiswa - Academic Portal";
				$data['content'] = $this->load->view('no_gelombang',$hasil,true);
			}
			
			$this->load->view('pmb_online/index_layout',$data);
		}
		function logout()
		{
			$this->session->sess_destroy();

			$data_sess = array(
				'nama' => '',
				'nim' => '',
				'id_user' => '',
				'status' => ''
			  );
			$this->session->set_userdata($data_sess);

    		redirect(base_url() . '/welcome/login/' . $this->session->userdata("gelombang"));
		}
	}
?>
