<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->authact->logged_in()) {
			redirect('dashboard');
		}
		$this->load->model('Model_simpeg');
		$this->load->model('Model_pegawai');
	}

	public function index($id = 0)
	{
		$data['title'] = "STIFAR";
		//$data['menu'] = $this->Model_simpeg->getMenu($this->authact->getSimpegRole());
		//$hasil['menu_tree'] = $hasil['menu_tree'] = $this->Model_menu_tree->get_all_p0();


		$hasil['query'] = $this->Model_pegawai->get_all();
		$hasil['artikel1'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 1))->result();
		$hasil['artikel2'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 2))->result();
		$hasil['artikel3'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 3))->result();
		$hasil['slide'] = $this->db->limit(5)->order_by("id", "desc")->get("master_slide")->result();
		$data['slide'] = $this->db->limit(1)->order_by("id", "desc")->get("master_slide")->row();
		$hasil['id'] = $id;
		$tanggal = date('Y-m-d');
		$hasil['gelombang'] = $this->db->select('pmb_gelombang.*,pmb_jalur.nama as nama_jalur')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('tgl_mulai <=', $tanggal)->where('tgl_akhir >=', $tanggal)->order_by('urutan', 'asc')->get('pmb_gelombang')->result();
		$data['content'] = $this->load->view('landing_new2', $hasil, true);
		$this->load->view('index_login_new', $data);
	}
	public function new_login($id = 0)
	{
		$data['title'] = "STIFAR";
		//$data['menu'] = $this->Model_simpeg->getMenu($this->authact->getSimpegRole());
		//$hasil['menu_tree'] = $hasil['menu_tree'] = $this->Model_menu_tree->get_all_p0();


		$hasil['query'] = $this->Model_pegawai->get_all();
		$hasil['artikel1'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 1))->result();
		$hasil['artikel2'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 2))->result();
		$hasil['artikel3'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 3))->result();
		$hasil['slide'] = $this->db->limit(5)->order_by("id", "desc")->get("master_slide")->result();
		$hasil['id'] = $id;
		$tanggal = date('Y-m-d');
		$hasil['gelombang'] = $this->db->select('pmb_gelombang.*,pmb_jalur.nama as nama_jalur')->order_by('urutan', 'asc')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('tgl_mulai <=', $tanggal)->where('tgl_akhir >=', $tanggal)->get('pmb_gelombang')->result();
		$hasil['curr_gelombang'] = $this->db->select('pmb_gelombang.*')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('pmb_gelombang.id', $id)->get('pmb_gelombang')->row();
		$data['content'] = $this->load->view('landing2', $hasil, true);
		$this->load->view('index_login', $data);
	}
	public function login($id = 0)
	{
		$data['title'] = "STIFAR";
		//$data['menu'] = $this->Model_simpeg->getMenu($this->authact->getSimpegRole());
		//$hasil['menu_tree'] = $hasil['menu_tree'] = $this->Model_menu_tree->get_all_p0();


		$hasil['query'] = $this->Model_pegawai->get_all();
		$hasil['artikel1'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 1))->result();
		$hasil['artikel2'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 2))->result();
		$hasil['artikel3'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 3))->result();
		$hasil['slide'] = $this->db->limit(5)->order_by("id", "desc")->get("master_slide")->result();
		$hasil['id'] = $id;
		$tanggal = date('Y-m-d');
		$hasil['gelombang'] = $this->db->select('pmb_gelombang.*,pmb_jalur.nama as nama_jalur')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('tgl_mulai <=', $tanggal)->where('tgl_akhir >=', $tanggal)->get('pmb_gelombang')->result();
		$hasil['curr_gelombang'] = $this->db->select('pmb_gelombang.*')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('pmb_gelombang.id', $id)->get('pmb_gelombang')->row();
		$data['content'] = $this->load->view('landing2', $hasil, true);
		$this->load->view('index_login', $data);
	}
	public function landing()
	{
		$data['title'] = "Landing - STIFAR";
		//$data['menu'] = $this->Model_simpeg->getMenu($this->authact->getSimpegRole());
		//$hasil['menu_tree'] = $hasil['menu_tree'] = $this->Model_menu_tree->get_all_p0();


		$hasil['artikel1'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 1))->result();
		$hasil['artikel2'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 2))->result();
		$hasil['artikel3'] = $this->db->limit(4)->order_by("id", "desc")->get_where("master_post", array("kategori" => 3))->result();
		$hasil['slide'] = $this->db->limit(5)->order_by("id", "desc")->get("master_slide")->result();

		$data['content'] = $this->load->view('landing', $hasil, true);
		$this->load->view('index_login', $data);
	}
	public function register($id = 0)
	{
		$data['title'] = "Register - STIFAR";
		//$data['menu'] = $this->Model_simpeg->getMenu($this->authact->getSimpegRole());
		//$hasil['menu_tree'] = $hasil['menu_tree'] = $this->Model_menu_tree->get_all_p0();

		$hasil['slide'] = $this->db->limit(5)->order_by("id", "desc")->get("master_slide")->result();
		$hasil['query'] = $this->Model_pegawai->get_all();
		$tanggal = date('Y-m-d');
		$hasil['gelombang'] = $this->db->select('pmb_gelombang.*,pmb_jalur.nama as nama_jalur')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('tgl_mulai <=', $tanggal)->where('tgl_akhir >=', $tanggal)->get('pmb_gelombang')->result();
		$hasil['curr_gelombang'] = $this->db->select('pmb_gelombang.*')->join('pmb_jalur', 'pmb_jalur.id = pmb_gelombang.id_jalur', 'inner')->where('pmb_gelombang.id', $id)->get('pmb_gelombang')->row();
		$hasil['id'] = $id;
		$data['content'] = $this->load->view('form_register2', $hasil, true);
		$this->load->view('index_login', $data);
	}

	function genpass($string)
	{
		echo $this->authact->generatepass($string);
	}
	function send()
	{
		$this->load->config('email');
		$this->load->library('email');

		$from = $this->config->item('smtp_user');
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$tgl_lahir = $this->input->post('tgl_lahir');

		$subject = "Penerimaan Mahasiswa Baru STIFAR";
		$tanggal = date("Ymd", strtotime($tgl_lahir));
		$message = "Selamat kepada " . $nama . ". Anda sudah tergabung sebagai Calon Mahasiswa di Sekolah Tinggi Ilmu Farmasi \n Berikut Username dan Password anda adalah : \n username : " . $email . "\n Password : " . $tanggal . "\n\n Terimakasih, \n Admin PMB";

		// $this->email->set_newline("\r\n");
		// $this->email->from($from);
		// $this->email->to($email);
		// $this->email->subject($subject);
		// $this->email->message($message);

		// if ($this->email->send()) {
		//     echo 'Your Email has successfully been sent.';
		// } else {
		//     show_error($this->email->print_debugger());
		// }
	}
}
