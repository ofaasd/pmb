<?php
	class Formulir extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if($this->session->userdata('status') != 'login_camaba')
			{
				redirect(base_url());
			}
			$this->load->model('pmb_model/Model_pmb');
			$this->load->model('Model_online');
			$gelombang = $this->Model_online->get_gelombang('pmb_gelombang');
			if($gelombang->num_rows() == 0){
				redirect("dashboard/index");
			}
		}

		function index()
		{
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";			
			$hasil['asd'] = "";
			$data['content'] = $this->load->view('pmb_online/dashboard',$hasil,true);
			$this->load->view('pmb_online/index_layout',$data);
		}
		function info(){
			$id = $this->session->userdata("id_user");
			$pmb['cur_gel'] = $this->session->userdata("gelombang");
			$gelombang = $hasil['gelombang'] = $this->db->select('pmb_gelombang.*,pmb_jalur.nama as nama_jalur')->join('pmb_jalur','pmb_jalur.id = pmb_gelombang.id_jalur','inner')->where('pmb_gelombang.id',$pmb['cur_gel'])->get('pmb_gelombang')->row();
			$pmb['gelombang'] = $gelombang;
			$in_gel = [];
			
			
			$query = $this->db->where('gelombang',$pmb['cur_gel'])->where(array("user_id"=>$id))->get("pmb_peserta_online");
			//$query2 = $this->db->where(array("id"=>$id))->get("user_guest");
			if($query->num_rows() > 0 && empty($query->row()->no_pendaftaran)){
				//redirect('formulir/info');
				$data['title'] = "Formulir Mahasiswa - Academic Portal";
				//$data['menu'] = $this->Model_front->getMenu($this->authact->getRole());
				//$pmb['detail_cmhs'] = $this->Model_pmb->get_where_reg($id);
				$pmb['detail_cmhs'] = $query->row();
				$pmb['warga_negara'] = $this->Model_pmb->warga_negara();
				$pmb['prodi'] = $this->Model_pmb->prodi();
				$pmb['gelombang'] = $this->Model_pmb->get_gelombang('pmb_gelombang')->result();
				$pmb['kelas'] = $this->db->get_where('pmb_kelas', array('is_active' => 1))->result();
				$pmb['wilayah'] = $this->db->order_by('nm_wil','asc')->get_where('wilayah', array('id_induk_wilayah' => '000000'))->result();
				$pmb['data'] = $this->Model_online->detail_($id);
				$pmb['content2'] = $this->load->view('formulir/info_pribadi',$pmb,true);
				$data['content'] = $this->load->view('formulir/update_cmhs',$pmb,true);
				
			}else{
				$data['title'] = "Formulir Mahasiswa - Academic Portal";
				$pmb['warga_negara'] = $this->Model_pmb->warga_negara();
				$pmb['prodi'] = $this->Model_pmb->prodi();
				$pmb['kelas'] = $this->db->get_where('pmb_kelas', array('is_active' => 1))->result();
				$pmb['detail'] = $this->db->get_where('pmb_peserta_online', array('id' => $id))->row();
				//$pmb['gelombang'] = $this->Model_online->get_gelombang('pmb_gelombang')->row();
				$pmb['jalur'] = $this->db->where('deleted_at',NULL)->get('pmb_jalur')->result();
				$pmb['wilayah'] = $this->db->order_by('nm_wil','asc')->get_where('wilayah', array('id_induk_wilayah' => '000000'))->result();
				$pmb['mapel'] = ['mtk'=>'Matematika','bing'=>'B. Inggris','kimia'=>'Kimia','biologi'=>'Biologi','fisika'=>'Fisika'];
				$data['content'] = $this->load->view('formulir/add_cmhs',$pmb,true);
				// ini salah logic harus di ganti relasi ke table pmb peserta
				// $cek_nopen = $this->db->where(array("user_id"=>$id))->where('gelombang',$pmb['cur_gel'])->get("pmb_peserta_online")->row();
				// if(empty($cek_nopen)){
					
				// }elseif(empty($cek_nopen->no_pendaftaran)){
				// 	$data['title'] = "Formulir Mahasiswa - Academic Portal";
				// 	$pmb['warga_negara'] = $this->Model_pmb->warga_negara();
				// 	$pmb['prodi'] = $this->Model_pmb->prodi();
				// 	$pmb['kelas'] = $this->db->get_where('pmb_kelas', array('is_active' => 1))->result();
				// 	$pmb['detail'] = $this->db->get_where('pmb_peserta_online', array('id' => $id))->row();
				// 	$pmb['rapor'] = $this->db->get_where('pmb_nilai_rapor',array('id_peserta'=>$cek_nopen->id))->row();
				// 	$pmb['piagam'] = $this->db->get_where('piagam_pmb',array('id_peserta'=>$cek_nopen->id))->row();
				// 	//$pmb['gelombang'] = $this->Model_online->get_gelombang('pmb_gelombang')->row();
				// 	$pmb['jalur'] = $this->db->where('deleted_at',NULL)->get('pmb_jalur')->result();
				// 	$pmb['wilayah'] = $this->db->order_by('nm_wil','asc')->get_where('wilayah', array('id_induk_wilayah' => '000000'))->result();
				// 	$pmb['mapel'] = ['mtk'=>'Matematika','bing'=>'B. Inggris','kimia'=>'Kimia','biologi'=>'Biologi','fisika'=>'Fisika'];
				// 	$data['content'] = $this->load->view('formulir/add_cmhs',$pmb,true);
				// }else{
				// 	$data['title'] = "Formulir Mahasiswa - Academic Portal";
				// 	$nopen = $cek_nopen->no_pendaftaran;
				// 	$pmb['detail_cmhs'] = $this->db->where_in('gelombang',$in_gel)->where(array("user_id"=>$id))->get("pmb_peserta_online")->result();
				// 	$pmb['detail_cmhs2'] = $this->db->where_in('gelombang',$in_gel)->where(array("user_id"=>$id))->get("pmb_peserta_online")->row();
				// 	$pmb['warga_negara'] = $this->Model_pmb->warga_negara();
				// 	$pmb['prodi'] = $this->Model_pmb->prodi();
				// 	$pmb['gelombang'] = $this->Model_pmb->get_gelombang('pmb_gelombang')->result();
				// 	$pmb['kelas'] = $this->db->get_where('pmb_kelas', array('is_active' => 1))->result();
				// 	$pmb['wilayah'] = $this->db->order_by('nm_wil','asc')->get_where('wilayah', array('id_induk_wilayah' => '000000'))->result();
				// 	$pmb['data'] = $this->Model_online->detail_($id);
				// 	$pmb['jalur'] = $this->db->get('pmb_jalur')->result();
				// 	$pmb['curr_gelombang'] = $this->db->get_where('pmb_gelombang',['id'=>$pmb['detail_cmhs2']->gelombang])->row();
				// 	$pmb['curr_jalur'] = $this->db->get_where('pmb_jalur',['id'=>$pmb['detail_cmhs2']->jalur_pendaftaran])->row();
				// 	$pmb['content2'] = $this->load->view('formulir/info_pribadi',$pmb,true);
				// 	$data['content'] = $this->load->view('formulir/update_cmhs',$pmb,true);
				// }
			}
			$this->load->view('pmb_online/index_layout',$data);
			//error_reporting(0);
			
			// var_dump($pmb['data']);
		}
		function jalur_pendaftaran(){
			$data['title'] = "Formulir Mahasiswa - Academic Portal";	
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$pmb['detail_cmhs2'] = $this->db->get_where('pmb_peserta_online', array('user_id' => $id,'gelombang'=>$gelombang))->row();
			$pmb['jalur'] = $this->db->get('pmb_jalur')->result();
			$pmb['curr_gelombang'] = $this->db->get_where('pmb_gelombang',['id'=>$pmb['detail_cmhs2']->gelombang])->row();
			$pmb['curr_jalur'] = $this->db->get_where('pmb_jalur',['id'=>$pmb['detail_cmhs2']->jalur_pendaftaran])->row();
			$pmb['content2'] = $this->load->view('formulir/jalur_pendaftaran',$pmb,true);
			$data['content'] = $this->load->view('formulir/update_cmhs',$pmb,true);

			$this->load->view('pmb_online/index_layout',$data);
		}
		function update_jalur(){
			$id_peserta = $this->input->post('id');
			$data = [
				'jalur_pendaftaran' => $this->input->post('jalur'),
				'gelombang' => $this->input->post('gelombang'),
			];
			$hasil = $this->db->update('pmb_peserta_online',$data,['id'=>$id_peserta]);
			if($hasil){
				$this->session->set_userdata('success', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Berhasil di update."); 
										</script>');
			}else{
				$this->session->set_userdata('error', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Gagal di update."); 
										</script>');
			}
			redirect('formulir/jalur_pendaftaran');
		}
		function asal_sekolah(){
			$data['title'] = "Formulir Mahasiswa - Academic Portal";	
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$pmb['detail_cmhs2'] = $this->db->get_where('pmb_peserta_online', array('user_id' => $id,'gelombang'=>$gelombang))->row();
			$pmb['jalur'] = $this->db->get('pmb_jalur')->result();
			$pmb['curr_gelombang'] = $this->db->get_where('pmb_gelombang',['id'=>$pmb['detail_cmhs2']->gelombang])->row();
			$pmb['curr_jalur'] = $this->db->get_where('pmb_jalur',['id'=>$pmb['detail_cmhs2']->jalur_pendaftaran])->row();
			$pmb['rapor'] = $this->db->get_where('pmb_nilai_rapor',['id_peserta'=>$pmb['detail_cmhs2']->id])->row_array();
			$pmb['asal_sekolah'] = $this->db->get_where('pmb_asal_sekolah',['id_peserta'=>$pmb['detail_cmhs2']->id])->row();
			$pmb['wilayah'] = $this->db->order_by('nm_wil','asc')->get_where('wilayah', array('id_induk_wilayah' => '000000'))->result();
			$pmb['kota']=$this->Model_pmb->daftar_kotakab($pmb['asal_sekolah']->provinsi_id);
			$pmb['curr_wil'] = $this->db->get_where('wilayah',['id_wil'=>$pmb['asal_sekolah']->provinsi_id])->row();
			$pmb['curr_kota'] = $this->db->get_where('wilayah',['id_wil'=>$pmb['asal_sekolah']->kota_id])->row();
			$mydata = [];
			for($i=1; $i <= $pmb['curr_gelombang']->pilihan; $i++){
				$mydata[$i-1] = $this->db->select('pmb_jalur_prodi.*,program_studi.nama_prodi')->join('program_studi','program_studi.id = pmb_jalur_prodi.id_program_studi','inner')->get_where('pmb_jalur_prodi',['id_jalur'=>$pmb['curr_jalur']->id])->result();
			}
			$pmb['list_prodi'] = $mydata;
			$pmb['mapel'] = ['mtk'=>'Matematika','bing'=>'B. Inggris','kimia'=>'Kimia','biologi'=>'Biologi','fisika'=>'Fisika'];
			$pmb['content2'] = $this->load->view('formulir/asal_sekolah',$pmb,true);
			$data['content'] = $this->load->view('formulir/update_cmhs',$pmb,true);

			$this->load->view('pmb_online/index_layout',$data);
		}
		function update_asal_sekolah(){
			$id_peserta = $this->input->post('id');
			
			$data = [
				'pilihan1' => $this->input->post('prodi')[0],
				'pilihan2' => (!empty($this->input->post('prodi')[1]))?$this->input->post('prodi')[1]:'0',
				'ipk' => $this->input->post('ipk'),
				'toefl' => $this->input->post('toefl'),
			];
			$hasil = $this->db->update('pmb_peserta_online',$data,['id'=>$id_peserta]);

			$data2 = [
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
				'asal_sekolah' => $this->input->post('asal_sekolah'),
				'jurusan' => $this->input->post('jurusan'),
				'akreditasi' => $this->input->post('akreditasi'),
				'alamat' => $this->input->post('alamat_sekolah'),
				'provinsi_id' => $this->input->post('provinsi_sekolah'),
				'kota_id' => $this->input->post('kota_sekolah'),
			];
			$hasil = $this->db->update('pmb_asal_sekolah',$data2,['id_peserta'=>$id_peserta]);

			$jalur = $this->input->post('jalur');
			if($jalur == 1 || $jalur == 2){
				for($i=0; $i < 5; $i++){
					$data_nilai = [
						'nilai_mtk_smt'. ($i+1) => $this->input->post('nilai_mtk_smt' . ($i+1)),
						'nilai_bing_smt'. ($i+1) => $this->input->post('nilai_bing_smt' . ($i+1)),
						'nilai_kimia_smt'. ($i+1) => $this->input->post('nilai_kimia_smt' . ($i+1)),
						'nilai_biologi_smt'. ($i+1) => $this->input->post('nilai_biologi_smt' . ($i+1)),
						'nilai_fisika_smt'. ($i+1) => $this->input->post('nilai_fisika_smt' . ($i+1)),
					];
					$r = $this->db->update('pmb_nilai_rapor', $data_nilai, ['id_peserta'=>$id_peserta]);
				}
			}

			if($hasil){
				$this->session->set_userdata('success', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Berhasil di update."); 
										</script>');
			}else{
				$this->session->set_userdata('error', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Gagal di update."); 
										</script>');
			}
			redirect('formulir/asal_sekolah');
		}
		function file_pendukung(){
			$data['title'] = "Formulir Mahasiswa - Academic Portal";	
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$pmb['detail_cmhs2'] = $this->db->get_where('pmb_peserta_online', array('user_id' => $id,'gelombang'=>$gelombang))->row();
			$pmb['jalur'] = $this->db->get('pmb_jalur')->result();
			$pmb['curr_gelombang'] = $this->db->get_where('pmb_gelombang',['id'=>$pmb['detail_cmhs2']->gelombang])->row();
			$pmb['curr_jalur'] = $this->db->get_where('pmb_jalur',['id'=>$pmb['detail_cmhs2']->jalur_pendaftaran])->row();
			$pmb['content2'] = $this->load->view('formulir/file_pendukung',$pmb,true);
			$data['content'] = $this->load->view('formulir/update_cmhs',$pmb,true);
			$this->load->view('pmb_online/index_layout',$data);
		}
		function update_file_pendukung(){
			$id_peserta = $this->input->post('id');
			if(!empty($_FILES['foto']['name'])){
				$config['upload_path'] = './assets/file_pmb/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = '5240';
				$config['overwrite'] = TRUE;
				$config['file_name'] = 'pmb_peserta_online_'.$user_id;
				
				$config['file_ext'] = '.'.pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
				$config['remove_space'] = TRUE;
				$this->load->library('upload', $config); 
				$this->upload->do_upload('foto');
				$nama_foto = $config['file_name'].$config['file_ext'];
				$data = [
					'info_pmb' => $this->input->post('info_pmb'),
					'ukuran_seragam' => $this->input->post('ukuran_seragam'),
					'file_pendukung'=> $nama_foto,
				];
				$hasil = $this->db->update('pmb_peserta_online',$data,['id'=>$id_peserta]);
				
			}else{
				$data = [
					'info_pmb' => $this->input->post('info_pmb'),
					'ukuran_seragam' => $this->input->post('ukuran_seragam'),
				];
				$hasil = $this->db->update('pmb_peserta_online',$data,['id'=>$id_peserta]);
			}
			
			
			if($hasil){
				$this->session->set_userdata('success', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Berhasil di update."); 
										</script>');
			}else{
				$this->session->set_userdata('error', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Gagal di update."); 
										</script>');
			}
			redirect('formulir/file_pendukung');
		}
		function penpres(){
			$id = $this->session->userdata("id_user");
			$cek_nopen = $this->db->where(array("id"=>$id))->get("user_guest")->row();
			$data['title'] = "Formulir Mahasiswa - Academic Portal";
			$query = $this->db->where(array("user_id"=>$id))->get("pmb_peserta_online");
			if($query->num_rows() == 0 && empty($cek_nopen->no_pendaftaran)){
				redirect('formulir/info');
			}
			if(empty($cek_nopen->no_pendaftaran)){
				$pmb['detail'] = $this->db->get_where('pmb_peserta_online', array('id' => $id))->row();
				$pmb['rapor'] = $this->db->get_where('pmb_nilai_rapor',array('id_user'=>$id))->row();
				$pmb['piagam'] = $this->db->get_where('piagam_pmb',array('user_id'=>$id))->row();
				$data['content'] = $this->load->view('formulir/add_penpres',$pmb,true);
			}else{
				$pmb['detail'] = $this->db->get_where('pmb_peserta', array('nopen' => $cek_nopen->no_pendaftaran))->row();
				$pmb['rapor'] = $this->db->get_where('pmb_nilai_rapor',array('id_user'=>$id))->row();
				$data['content'] = $this->load->view('formulir/penpres',$pmb,true);
			}
			
			$this->load->view('pmb_online/index_layout',$data);
			
		}
		function cetak_formulir($nopen){
			$mpdf = new \Mpdf\Mpdf();
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";	
			if($nopen == 0){
				$hasil['msg'] = "Data pembayaran belum terverifikasi";
				$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				$this->load->view('pmb_online/index_layout',$data);
				//$hasil['pmb_peserta'] = $this->db->get_where("pmb_peserta_online",array("user_id"=>$id))->row();
			}else{
				$pmb['cetak'] = $this->Model_pmb->cetak_where($nopen);
				$pmb['data'] = $this->Model_pmb->detail_cetak($nopen);
				$data = $this->load->view('pmb/cetak_formulir', $pmb, TRUE);
				$pdfFilePath ="Formulir Pendaftaran -".$nopen.".pdf"; 
				$mpdf->WriteHTML($data);
				$mpdf->Output($pdfFilePath, "D");
				
			}
		}
		function upload_bukti()
		{
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";			
			//$hasil['rekening'] = $this->db->get("master_rekening")->result();
			
			$hasil['peserta'] = $this->db->get_where("pmb_peserta_online",array("user_id"=>$id,"gelombang"=>$gelombang))->row();
			$hasil['biaya_pendaftaran'] = $this->db->get_where('biaya_pendaftaran',['id_prodi'=>$hasil['peserta']->pilihan1,'rpl'=>0])->row();
			$hasil['bukti_registrasi'] = $this->db->get_where('bukti_registrasi',['nopen'=>$hasil['peserta']->nopen])->num_rows();
			if(empty($hasil['peserta']->nopen)){
				$hasil['msg'] = "Harap Verifikasi Data Terlebih Dahuli";
				$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				//$hasil['pmb_peserta'] = $this->db->get_where("pmb_peserta_online",array("user_id"=>$id))->row();
			}else{
				$data['content'] = $this->load->view('formulir/upload_bukti',$hasil,true);
			}
			$this->load->view('pmb_online/index_layout',$data);
		}
		function upload_foto(){
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$query = $this->db->where(array("user_id"=>$id,'gelombang'=>$gelombang))->get("pmb_peserta_online");
			if($query->num_rows() == 0){
				redirect('formulir/info');
			}
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";			
			$hasil['nopen'] = $query->row()->nopen;
			$hasil['pmb_peserta'] = $query->row();

			$data['content'] = $this->load->view('formulir/upload_foto',$hasil,true);
			$this->load->view('pmb_online/index_layout',$data);
		}
		function jadwal_ujian(){
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";		
			$peserta = 	$this->db->get_where("pmb_peserta_online",array("user_id"=>$id,'gelombang'=>$gelombang))->row();
			$hasil['nopen'] = $peserta->nopen;
			
			$query2 = $this->db->where(array("id"=>$id))->get("user_guest");
			
			if(empty($hasil['nopen'])){
				$hasil['msg'] = "Harap Verifikasi Data Terlebih Dahuli";
				$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				$hasil['pmb_peserta'] = $peserta;
			}else{
				//$cek_verif = $this->db->get_where("bukti_registrasi",array("nopen"=>$hasil['nopen']))->row()->verifikasi ?? 0;
				$hasil['pmb_peserta'] = $peserta;
				//$hasil['pmb_peserta'] = $this->db->get_where("pmb_peserta",array("nopen"=>$hasil['nopen']))->row();
				$cek_verif = $hasil['pmb_peserta']->is_bayar;
				if($cek_verif == 0){
					$hasil['msg'] = "Biaya Pendaftaran belum di verifikasi";
					
					$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				}elseif($cek_verif == 1){
					$hasil['user'] = $query2->row();
					$hasil['jadwal'] = $this->db->get_where("pmb_gelombang",array("id"=>$hasil['pmb_peserta']->gelombang))->row();
					//$hasil['jadwal'] = $this->db->get_where("pmb_peserta",array("nopen"=>$hasil['pmb_peserta']->gelombang))->row();
					$data['content'] = $this->load->view('formulir/jadwal',$hasil,true);
				}else{
					$hasil['msg'] = "Biaya Pendaftaran gagal di verifikasi. Harap lakukan verifikasi ulang";
					$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				}
			}
			
			$this->load->view('pmb_online/index_layout',$data);
		}
		function pengumuman_ujian(){
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";
			$peserta = $this->db->get_where("pmb_peserta_online",array("user_id"=>$id,"gelombang"=>$gelombang))->row();			
			$hasil['nopen'] = $peserta->nopen;
			
			
			if(empty($hasil['nopen'])){
				$hasil['msg'] = "Harap Verifikasi Data Terlebih Dahuli";
				$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				//$hasil['pmb_peserta'] = $this->db->get_where("pmb_peserta_online",array("user_id"=>$id))->row();
			}else{
				$hasil['pmb_peserta'] = $peserta;
				$hasil['jadwal'] = $this->db->get_where("pmb_gelombang",array("id"=>$gelombang))->row();
				$hasil['pengumuman'] = $this->db->get_where("pmb_online_pengumuman",array("id_gelombang"=>$hasil['jadwal']->id))->result();
				if(empty($hasil['pengumuman'])){
					$hasil['msg'] = "Belum Ada Pengumuman";
					$data['content'] = $this->load->view('no_gelombang',$hasil,true);
				}else{
					$data['content'] = $this->load->view('formulir/pengumuman',$hasil,true);
				}
				
			}
			
			$this->load->view('pmb_online/index_layout',$data);
		}
		function cmhs_tambah_aksi(){
			$r = $this->Model_online->simpan_cmhs();
			if ($r != 1) {
				# code...
				$this->session->set_userdata('error', '<script type="text/javascript">
                                                            alert("Data Calon Mahasiswa Gagal di tambahkan."); 
                                                        </script>');
				redirect('formulir/info');
			}else{
				//$r = $this->Model_online->simpan_penpres();
				if ($r == 1) {
					# code...
					$this->session->set_userdata('success', '<script type="text/javascript">
											alert("Data Calon Mahasiswa Berhasil di tambahkan."); 
										</script>');
				}else{
					$this->session->set_userdata('status', '<div class="alert alert-danger">
														  <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali.
														</div>');
				}
				
				redirect('formulir/info');
			}
		}
		
		function update_detail(){
			$r = $this->Model_online->update_cmhs();
			// echo $r;
			if ($r == 1) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Data Berhasil di Perbarui.
                                                    </div>');
				redirect('formulir/info');
			}else{
				$this->session->set_userdata('status', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali.
                                                    </div>');
				redirect('formulir/info');
			}
		}
		function simpan_penpres(){
			$r = $this->Model_online->simpan_penpres();
			// echo $r;
			if ($r == 1) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Data Berhasil di Perbarui.
                                                    </div>');
				redirect('formulir/penpres');
			}else{
				$this->session->set_userdata('status', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali.
                                                    </div>');
				redirect('formulir/penpres');
			}
		}
		function validasi_biodata(){
			$r = $this->Model_online->validasi_biodata();
			//echo $r;
			if ($r == 1) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Data Berhasil di Perbarui.
                                                    </div>');
				redirect('dashboard');
			}elseif($r == 2){
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Input Data Berhasil!</strong> Harap Melakukan Pembayaran Registrasi Terlebih Dahulu, Silahkan Menghubungi Pihak Kampus STIFAR (+62 813-9311-1171 / (024) 6706147)
                                                    </div>');
				redirect('dashboard');
			}else{
				$this->session->set_userdata('status', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali.
                                                    </div>');
				redirect('dashboard');
			}
		}
		function simpan_sekolah(){
			$id_prov = $this->input->post("id_prov");
			$id_kota = $this->input->post("id_kota");
			$nama_sekolah = $this->input->post("nama_sekolah");
			
			$get_kab = $this->db->get_where('wilayah', array('id_wil' => $id_kota))->result_array();
			$name_kab = $get_kab[0]['nm_wil'];
			$get_code_wil = $get_kab[0]['id_induk_wilayah'];
			$get_prov = $this->db->query('select * from wilayah where id_wil = "'.$get_code_wil.'" limit 1')->result_array();
			$name_prov = $get_prov[0]['nm_wil'];
			$get_name_prov = str_replace("Prop. ","", $name_prov);
			$get_name_kab = str_replace("Kab. ", "", $name_kab);
			// echo $get_name_prov;
	        $data=$this->Model_online->simpan_sekolah($get_name_kab, $get_name_prov, $nama_sekolah);
	        echo json_encode($data);
		}
		function cmhs_tambah_bukti(){
			$r = $this->Model_online->tambah_bukti();
			echo $r;
			if ($r == 1) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Data Berhasil di Perbarui.
                                                    </div>');
				
				//redirect('formulir/upload_bukti');
			}else{
				$this->session->set_userdata('status', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali ekstensi file.
                                                    </div>');
				//redirect('formulir/upload_bukti');
			}
		}
		function cmhs_upload_foto(){
			$r = $this->Model_online->tambah_foto();
			// echo $r;
			if ($r == 1) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Data Berhasil di Perbarui.
                                                    </div>');
				redirect('formulir/upload_foto');
			}else{
				$this->session->set_userdata('status', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Gagal memperbarui data mohon periksa kembali.
                                                    </div>');
				redirect('formulir/upload_foto');
			}
		}
		function cmhs_ganti_password(){	
			$r = $this->Model_online->ganti_password();
			// // echo $r;
			if ($r == 2) {
				# code...
				$this->session->set_userdata('status_update', '<div class="alert alert-success">
                                                      <strong>Berhasil!</strong> Password Berhasil di Perbarui.
                                                    </div>');
				redirect('formulir/ganti_password');
			}elseif($r == 1){
				$this->session->set_userdata('status_update', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Password dengan konfirmasi password tidak sama
                                                    </div>');
				redirect('formulir/ganti_password');
				
			}else{
				$this->session->set_userdata('status_update', '<div class="alert alert-danger">
                                                      <strong>Gagal!</strong> Password lama salah
                                                    </div>');
				redirect('formulir/ganti_password');
			}
		}
		function get_gelombang(){
			$id = $this->input->post('id');
			$tanggal = date('Y-m-d');
			$gelombang = $this->db->where('tgl_mulai <= ',$tanggal)->where('tgl_akhir >= ',$tanggal)->where(['id_jalur'=>$id])->get("pmb_gelombang")->result();
			echo json_encode($gelombang);
		}
		function get_info_gelombang(){
			$id = $this->input->post('id');
			$gelombang = $this->db->get_where("pmb_gelombang", ['id'=>$id])->row();
			echo json_encode(nl2br($gelombang->nama_gel_long));
		}
		function get_jurusan(){
			$id = $this->input->post('id');
			
			//$gelombang = $this->db->get_where("pmb_gelombang", ['id'=>$id])->row();
			$gelombang = $this->db->get_where('pmb_gelombang',['id'=>$id])->row();
			$data = [];
			for($i=1; $i <= $gelombang->pilihan; $i++){
				$data[$i-1] = $this->db->select('pmb_jalur_prodi.*,program_studi.nama_prodi')->join('program_studi','program_studi.id = pmb_jalur_prodi.id_program_studi','inner')->get_where('pmb_jalur_prodi',['id_jalur'=>$gelombang->id_jalur])->result();
			}
			echo json_encode($data);
		}
		function ganti_password(){
			$id = $this->session->userdata("id_user");
			$gelombang = $this->session->userdata("gelombang");
			$query = $this->db->where(array("user_id"=>$id,'gelombang'=>$gelombang))->get("pmb_peserta_online");
			if($query->num_rows() == 0){
				redirect('formulir/info');
			}
			$data['title'] = "Dashboard - Calon Mahasiswa Baru";			
			$hasil['nopen'] = $query->row()->nopen;
			$hasil['pmb_peserta'] = $query->row();

			$data['content'] = $this->load->view('formulir/ganti_password',$hasil,true);
			$this->load->view('pmb_online/index_layout',$data);
		}
		
	}
?>
