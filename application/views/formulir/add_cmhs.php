                    <style>
                            * {
                              box-sizing: border-box;
                            }

                            body {
                              background-color: #f1f1f1;
                            }

                            #regForm {
                              background-color: #ffffff;
                              margin-left: 10px;
                              font-family: Raleway;
                              padding: 40px;
                              width: 100%;
                              min-width: 300px;
                            }

                            h1 {
                              text-align: center;  
                            }

                            input {
                              padding: 10px;
                              width: 100%;
                              font-size: 17px;
                              font-family: Raleway;
                              border: 1px solid #aaaaaa;
                            }

                            /* Mark input boxes that gets an error on validation: */
                            input.invalid {
                              background-color: #ffdddd;
                            }

                            /* Hide all steps by default: */
                            .tab {
                              display: none;
                            }

                            button {
                              background-color: #4CAF50;
                              color: #ffffff;
                              border: none;
                              padding: 10px 20px;
                              font-size: 17px;
                              font-family: Raleway;
                              cursor: pointer;
                            }

                            button:hover {
                              opacity: 0.8;
                            }

                            #prevBtn {
                              background-color: #bbbbbb;
                            }

                            /* Make circles that indicate the steps of the form: */
                            .step {
                              height: 15px;
                              width: 15px;
                              margin: 0 2px;
                              background-color: #bbbbbb;
                              border: none;  
                              border-radius: 50%;
                              display: inline-block;
                              opacity: 0.5;
                            }

                            .step.active {
                              opacity: 1;
                            }

                            /* Mark the steps that are finished and valid: */
                            .step.finish {
                              background-color: #4CAF50;
                            }
							.input-group-prepend{
								background:#ecf0f1;
								padding:5px;
							}
							.wizard .content {
								min-height: 100px;
							}
							.wizard .content > .body {
								width: 100%;
								height: auto;
								padding: 15px;
								position: relative;
							}
							::-webkit-input-placeholder { /* Edge 12-18 */
							  font-family: Raleway !important;
							}
							.alert-info{
								border:1px solid #2980b9;
								background:#3498db;
								color:#fff;
								font-size:12pt;
							}
                            </style>
							
<div class="card-block">
	<div class="row">
		<div class="col-md-12">
			<div id="wizard">
				<section>
					<form id="create-pegawai" class="wizard-form" action="<?php echo base_url()?>formulir/cmhs_tambah_aksi" method="post" enctype="multipart/form-data">
						<h3> Informasi Pribadi </h3>
						<fieldset>
							<div class="row">
								<div class="col-sm-6">
									Nomor KTP <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nomor KTP" oninput="this.className = ''" name="ktp" required=""></p>
									NISN :
									<input type="text" class="form-control" placeholder="NISN" name="nisn">
									Tidak Tahu NISN anda? <a href="https://nisn.data.kemdikbud.go.id/index.php/Cindex/formcaribynama" target="_blank">cek DISINI</a></p>
									Nama Lengkap <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nama Lengkap" oninput="this.className = ''" name="nama" required=""></p>
									<div class="row">
										<div class="col-md-6">
											Tempat Lahir <span class="text-danger">*</span> :
											<p><input type="text" class="form-control" placeholder="Tempat Lahir" oninput="this.className = ''" name="tl" required=""></p>
										</div>
										<div class="col-md-6">
											Tanggal Lahir <span class="text-danger">*</span> :
											<p><input type="date" class="form-control" oninput="this.className = ''" name="tgl" required=""></p>
										</div>
										<div class="col-md-6">
											Jenis Kelamin <span class="text-danger">*</span> :
											<p>
												<select name="jk" class="form-control" required="">
													<option selected="" disabled="">Jenis Kelamin</option>
													<option value="1">Laki - Laki</option>
													<option value="2">Perempuan</option>
												</select>
											</p>
										</div>
										<div class="col-md-6">
											Agama <span class="text-danger">*</span> :
											<p>
												<select name="agama" class="form-control" required="">
													<option value="opt1" selected="" disabled="">Pilih Agama</option>
													<option value="1">Islam</option>
													<option value="2">Kristen</option>
													<option value="3">Katolik</option>
													<option value="4">Hindu</option>
													<option value="5">Budha</option>
													<option value="6">Konghucu</option>
													<option value="99">Lainnya</option>
												</select>
											</p>
										</div>
									</div>
									Nama Ibu <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nama Ibu" oninput="this.className = ''" name="ibu" required=""></p>
									Nama Ayah <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nama Ayah" oninput="this.className = ''" name="ayah" required=""></p>
									Nomor HP Orang Tua <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nomor HP Orang Tua" oninput="this.className = ''" name="hp_ortu" required=""></p>
									<div class="row">
										<div class="col-md-6">
											Tinggi Badan <span class="text-danger">*</span> :
											<p><input type="number" class="form-control" placeholder="Tinggi Badan" oninput="this.className = ''" name="tb" required=""></p>
										</div>
										<div class="col-md-6">
											Berat Badan <span class="text-danger">*</span> :
											<p><input type="number" class="form-control" placeholder="Berat Badan" oninput="this.className = ''" name="bb" required=""></p>
										</div>
										
									</div>
									Nomor Handphone <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="No Handphone" oninput="this.className = ''" name="hp" required=""></p>
									Nomor WA Aktif <span class="text-danger">*</span>:
									<p><input type="text" class="form-control" placeholder="Nomor Telepon" oninput="this.className = ''" name="telepon" required=""></p>
								</div>
								<div class="col-sm-6">
									
									Status Warga Negara <span class="text-danger">*</span> :
									<p>
										<select name="warga_negara" id="wn" class="form-control" required="">
											<option selected="" disabled="">Pilih Warga Negara</option>
											<?php foreach($warga_negara as $w){?>
											<option value="<?php echo $w->id_negara?>"><?php echo $w->nm_negara ?></option>
											<?php } ?>
										</select>
									</p>
									Nama Provinsi <span class="text-danger">*</span> :
									<p>
										<select name="provinsi" id="provinsi" class="form-control" required="">
											<option selected="" disabled="">Pilih Provinsi</option>
											<?php foreach($wilayah as $w){?>
											<option value="<?php echo $w->id_wil ?>"><?php echo $w->nm_wil ?></option>
											<?php } ?>
										</select>
									</p>
									Nama Kota/Kabupaten <span class="text-danger">*</span> :
									<p>
										<select name="kotakab" id="kotakab" class="form-control" required=""> 
											<option selected="" disabled="">Pilih Kota/Kabupaten</option>
										</select>
									</p>
									Nama Kecamatan <span class="text-danger">*</span> :
									<p>
										<select name="kecamatan" id="kecamatan" class="form-control" required="">
											<option selected="" disabled="">Daftar Kecamatan</option>
										</select>
									</p>
									Kode POS <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="KODE POS" oninput="this.className = ''" name="pos" required=""></p>
									Nama Kelurahan <span class="text-danger">*</span> :
									<p><input type="text" class="form-control" placeholder="Nama Kelurahan" oninput="this.className = ''" name="kelurahan" required=""></p>
									Alamat <span class="text-danger">*</span> :
									<p><textarea class="form-control" style="resize: none;" name="alamat" placeholder="Hanya nama kampung, jalan dan nomor rumah saja" required="" ></textarea></p>
									<div class="row">
										<div class="col-sm-6">
											RT :
											<p><input type="text" class="form-control" placeholder="RT" oninput="this.className = ''" name="rt" required=""></p>
										</div>
										<div class="col-sm-6">
											RW :
											<p><input type="text" class="form-control" placeholder="RW" oninput="this.className = ''" name="rw" required=""></p>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<h3> Gelombang & Jalur </h3>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									Tahun Ajaran :
									<p>
										
										<input type="text" class="form-control" name="gel_ta" value="<?= $gelombang->ta_awal ?>/<?= $gelombang->ta_akhir ?>" readonly>
									</p>

									PILIH JALUR<span class="text-danger">*</span> :
									<p>
										<select id="jalur" name="jalur" class="form-control"  required="" readonly>
											<option value="<?= $gelombang->id_jalur ?>"><?= $gelombang->nama_jalur?></option>
											
										</select>
									</p>
									
									<div id="gel_text">PILIH GELOMBANG<span class="text-danger">*</span> :
										<p><select name="gelombang" id="gelombang" class="form-control" required="" readonly>
											<option value="<?= $gelombang->id ?>"><?= $gelombang->nama_gel ?></option>
										</select></p>
									</div>
									
								</div>
								<div class="col-md-6">
									<div class="info_gelombang">
										<div class="alert alert-info"><?= nl2br($gelombang->nama_gel_long) ?></div>
									</div>
								</div>
							</div>
						</fieldset>
						<h3> Jurusan & Asal Sekolah </h3>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<h3>Pilihan Program Studi</h3>
									<div id="jurusan">
											
									</div>
									<h3>Asal Sekolah</h3>
									<span id="judul_asal">Pendidikan Terakhir</span> <span class="text-danger">*</span> :
									<p>
										<select name="pendidikan_terakhir" id="asal_sekolah" class="form-control">
											<?php $pendidikan = array('SMA/SMK/Sederajat','Diploma (D1 - D2 - D3)','Sarjana (S1 / D4)');
											foreach($pendidikan as $value) {?>
											<option value="<?=$value?>"><?=$value?></option>
											<?php }?>
										</select>
									</p>
									<span id="judul_asal">Nama Sekolah / Kampus</span> <span class="text-danger">*</span> :
									<p><input type="text" name="asal_sekolah" id="asal_sekolah"></p>
									<span id="judul_jurusan">Jurusan / Program Studi</span> <span class="text-danger">*</span> :
									<p><input type="text" name="jurusan" id="jurusan"></p>
									<span id="judulakreditasi">Akreditasi</span> <span class="text-danger">*</span> :
									<p><select name="akreditasi" class="form-control" id="akre_default">
										<option value="A">A (Unggul)</option>
										<option value="B">B (Baik Sekali)</option>
										<option value="C">C (Baik)</option>
									</select></p>
									<span id="judul_alamat_sekolah">Alamat Sekolah / Kampus</span> <span class="text-danger">*</span> :
									<p><input type="text" name="alamat_sekolah" id="alamat_sekolah"></p>
									<span id="judul_provinsi_sekolah">Provinsi Sekolah / Kampus</span> <span class="text-danger">*</span> :
									<p>
										<select name="provinsi_sekolah" id="provinsi_sekolah" class="form-control" required="">
											<option selected="" disabled="">Pilih Provinsi</option>
											<?php foreach($wilayah as $w){?>
											<option value="<?php echo $w->id_wil ?>"><?php echo $w->nm_wil ?></option>
											<?php } ?>
										</select>
									</p>
									<span id="judul_kota_sekolah">Kota Sekolah / Kampus</span> <span class="text-danger">*</span> :
									<p>
										<select name="kota_sekolah" id="kota_sekolah" class="form-control" required=""> 
											<option selected="" disabled="">Pilih Kota/Kabupaten</option>
										</select>
									</p>
									<div id="area_pasca">
										<label for="ipk">Nilai IPK S1</label> <span class="text-danger">*</span> :
										<p><input type="number" name="ipk" id="ipk"> <br /><small class="text-warning">Gunakan . (titik) untuk nilai desimal</small></p>
										<label for="toefl">Nilai TOEFL</label> <span class="text-danger">*</span> :
										<p><input type="number" name="toefl" id="toefl"><br /><small class="text-warning">Gunakan . (titik) untuk nilai desimal</small></p>
									</div>
								</div>
								<div class="col-md-6" id="nilai_mapel">
									<?php 
										for($i=0; $i<5; $i++){
									?>
										<h3>Nilai 
											<?php
												if($i < 2){
													echo "Kelas X";
												}elseif($i > 1 && $i < 4){
													echo "Kelas XI";
												}else{
													echo "Kelas XII";
												}

												if($i % 2 == 1){
													echo " Semester 2";
												}else{
													echo " Semester 1";
												}
											?>
											</h3>
											<?= ($i == 4)?"<p>(Diisi 0 jika belum mendapat rapor kelas XII semester 1)</p>" : "" ?>
										<small class="text-warning">Gunakan . (titik) untuk nilai desimal</small><br /><br />
									<?php 
										foreach($mapel as $key=>$value){
											$new_mapel = 'nilai_' . $key . '_smt' . ($i+1);
									?>
										Nilai <?= $value ?>
										<p><input type="number" value="<?php echo (!empty($rapor[$new_mapel]))?$rapor[$new_mapel]:""?>" name="<?= $new_mapel ?>" class="form-control"></p>
									<?php	}
										}
									?>
									
								</div>
							</div>
						</fieldset>
						<h3> File Pendukung </h3>
						<fieldset>
							<div class="row">
								<div class="col-md-12">
									<!-- bagian foto -->
									<div class="info_gelombang">

									</div>
									Dapat Info PMB darimana?
									  <p>
										  <select name="info_pmb" class="form-control" required="">
											<option value="opt1" selected="" disabled="">- Pilih -</option>
											<option value="1">Teman</option>
											<option value="2">Kerabat / Orang Tua</option>
											<option value="3">Sosial Media</option>
											<option value="4">Lainnya</option>
										  </select>
									  </p>
									  Ukuran Seragam
									  <p>
										  <select name="ukuran_seragam" class="form-control" required="">
											<option value="opt1" selected="" disabled="">- Pilih Ukuran Seragam -</option>
											<option value="S">S</option>
											<option value="M">M</option>
											<option value="L">L</option>
											<option value="XL">XL</option>
											<option value="XXL">XXL</option>
											<option value="XXXL">XXXL</option>
										  </select>
									  </p>
									  Upload File Syarat Pendaftaran :
									  <p><input type='file' name="foto" onchange="readURL(this);" />
										Maksimal 5 MB dengan format pdf.</p>
										<div class="col-md-12">
											<div class="info_gelombang">
												<div class="alert alert-info"><?= nl2br($gelombang->nama_gel_long) ?></div>
											</div>
										</div>
									  <br><br><br>	
									
									<!--<div class="col-sm-2">
										<input type="submit" value="simpan" class="btn btn-primary">
									</div>-->
								</div>
							</div>
						</fieldset>
						<!--<h3> Jalur Pendaftaran </h3>
						<fieldset>
							
						</fieldset>-->
					</form>
				</section>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah')
				.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
	// If a field is empty...
	if (y[i].value == "") {
	  // add an "invalid" class to the field:
	  y[i].className += " invalid";
	  // and set the current valid status to false
	  valid = true;
	}
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
	document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
	x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
	$(document).ready(function(){
		const jalur = '<?= $gelombang->id_jalur ?>';
		
		if(jalur == 1 || jalur == 2){
			$("#nilai_mapel").show();
		}else{
			$("#nilai_mapel").hide();
		}

		if(jalur == 5 || jalur == 6){
			$("#area_pasca").show();
		}else{
			$("#area_pasca").hide();
		}
		
		get_jurusan();
		
		
	    var form = $("#create-pegawai").show();

		form.steps({
		  headerTag: "h3",
		  bodyTag: "fieldset",
		  transitionEffect: "slideLeft",
		  onStepChanging: function(event, currentIndex, newIndex) {

		      // Allways allow previous action even if the current form is not valid!
		      if (currentIndex > newIndex) {
		          return true;
		      }
		      // Forbid next action on "Warning" step if the user is to young
		      if (newIndex === 3 && Number($("#age-2").val()) < 18) {
		          return false;
		      }
		      // Needed in some cases if the user went back (clean up)
		      if (currentIndex < newIndex) {
		          // To remove error styles
		          form.find(".body:eq(" + newIndex + ") label.error").remove();
		          form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		      }
		      form.validate().settings.ignore = ":disabled,:hidden";
		      return form.valid();
		  },
		  onStepChanged: function(event, currentIndex, priorIndex) {

		      // Used to skip the "Warning" step if the user is old enough.
		      if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
		          form.steps("next");
		      }
		      // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
		      if (currentIndex === 2 && priorIndex === 3) {
		          form.steps("previous");
		      }
		  },
		  onFinishing: function(event, currentIndex) {

		      form.validate().settings.ignore = ":disabled,:hidden";
		      return form.valid();
		  },
		  onFinished: function(event, currentIndex) {
		  		$("#create-pegawai").submit();
		  }
		}).validate({
		  errorPlacement: function errorPlacement(error, element) {

		      element.before(error);
		  },
		  rules: {
		      confirm: {
		          equalTo: "#password-2"
		      }
		  }
		});
		$('#kelas').change(function(){
			var str = $(this).val();
			var str_explode = str.split('-');
			var kelas = str_explode[0];
			console.log(kelas);
			var isi = '';
			var data = '';
			if(kelas == 1){
				isi = '<option value="opt1" selected="" disabled="">- Pilih Jalur -</option><option value="1">PMDP</option><option value="2">Kerjasama</option><option value="3" selected>Umum</option>';
			}else if(kelas == 2){
				isi = '<option value="opt1" selected="" disabled="">- Pilih Jalur -</option><option value="3" selected>Umum</option><option value="2">Kerjasama</option>';
			}

			// $('#gelombang').html(data);
			$('#jalur').html(isi);
		});
		$('#jalur').change(function(){
			const jalur = $(this).val();
			if(jalur == 1 || jalur == 2){
				$("#nilai_mapel").show();
			}else{
				$("#nilai_mapel").hide();
			}

			if(jalur == 5 || jalur == 6){
				$("#area_pasca").show();
			}else{
				$("#area_pasca").hide();
			}
			$.ajax({
				url : "<?php echo base_url();?>formulir/get_gelombang/",
				method: "POST",
				data:{id:jalur},
				async: false,
				dataType: "json",
				success: function(data){
					$("#gelombang").html("<option value=''>Plih Gelombang</option>");
					let i;
					for (i = 0; i < data.length; i++) {
						$("#gelombang").append('<option value="'+ data[i].id +'">'+data[i].nama_gel+'</option>');
					}
				
				}
			});
		});
		$('#gelombang').change(function(){
			//alert("test");
			const gelombang = $(this).val();
			$.ajax({
				url : "<?php echo base_url();?>formulir/get_info_gelombang/",
				method: "POST",
				data:{id:gelombang},
				async: false,
				dataType: "json",
				success: function(data){
					$(".info_gelombang").html(`<div class="alert alert-info">${data}</div>`);
					get_jurusan();	
				}
			});
		});
		function get_jurusan()
		{
			const gelombang = $("#gelombang").val();
			$.ajax({
				url : "<?php echo base_url();?>formulir/get_jurusan/",
				method: "POST",
				data:{id:gelombang},
				async: false,
				dataType: "json",
				success: function(data){
					//alert(data);
					//alert(data);
					temp = "";

					data.forEach((item, index) => {
						temp += `Program Studi ${index + 1}
						<p><select name='prodi[]' class="form-control">`
						item.forEach((item2, index2) => {
							temp += `<option value='${item2.id_program_studi}'>${item2.nama_prodi} ${item2.keterangan}</option>`
						});
						temp += `</select></p>`
					});	

					$("#jurusan").html(temp);
				}
			});
		}
		$('#wn').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>pmb/daftar_prov/",
				method : "POST",
				data : {id: id},
				async : false,
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<option value="'+ data[i].prov_id +'">'+data[i].nama_prov+'</option>';
					}
					// $('#provinsi').html(html);
					 
				}
			});
		});
		
		$('#provinsi').change(function(){
			//alert("asdasd");
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>pmb/daftar_kotakab/",
				method : "POST",
				data : {id: id},
				async : false,
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<option value="'+ data[i].id_wil +'">'+data[i].nm_wil+'</option>';
					}
					$('#kotakab').html(html);
					 
				}
			});
		});
		$('#provinsi_sekolah').change(function(){
			//alert("asdasd");
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>pmb/daftar_kotakab/",
				method : "POST",
				data : {id: id},
				async : false,
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<option value="'+ data[i].id_wil +'">'+data[i].nm_wil+'</option>';
					}
					$('#kota_sekolah').html(html);
					 
				}
			});
		});
		$('#kotakab').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>pmb/daftar_kec/",
				method : "POST",
				data : {id: id},
				async : false,
				dataType : 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<option value="'+ data[i].id_wil +'">'+data[i].nm_wil+'</option>';
					}
					$('#kecamatan').html(html);
					 
				}
			});
		});
		
		$('#provinsi').change(function(){
			var id_prov=$(this).val();
			$('#kotakab').change(function(){
				var id_kota=$(this).val();
				//reload_daftar_sekolah(id_prov,id_kota);
			});
		});
		
		$("#simpan_sekolah").click(function(){
			var nama_sekolah = $("#nama_sekolah").val();
			var id_prov = $("#provinsi").val();
			var id_kota = $("#kotakab").val();
			//alert(nama_sekolah);
			$.ajax({
				url : "<?php echo base_url();?>formulir/simpan_sekolah/",
				method : "POST",
				data : {id_prov: id_prov,
						id_kota: id_kota,
						nama_sekolah: nama_sekolah},
				async : false,
				dataType : 'json',
				success: function(data){
					reload_daftar_sekolah(id_prov,id_kota);
					$("#asal_sekolah").val(data);
					$('#asal_sekolah').trigger('change');
					$('#modal_tambah_sekolah').modal("hide");
				}
			});
		});
	});
	function adjustIframeHeight() {
		var $body   = $('body'),
			$iframe = $body.data('iframe.fv');
		if ($iframe) {
			// Adjust the height of iframe
			$iframe.height($body.height());
		}
	}
	function reload_daftar_sekolah(id_prov,id_kota){
		$.ajax({
			url : "<?php echo base_url();?>pmb/daftar_sekolah/",
			method : "POST",
			data : {id_prov: id_prov,
					id_kota: id_kota},
			async : false,
			dataType : 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<option value="'+ data[i].id +'">'+data[i].nama+'</option>';
				}
				$('#asal_sekolah').html(html);
				$("#add_sekolah_provinsi").val(id_prov);
				$("#add_sekolah_kota").val(id_kota);
				$('#tambah-sekolah').html('Jika sekolah tidak ditemukan, klik <a href="#" id="btn_tambah_sekolah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_tambah_sekolah">Disini</a> untuk menambah');
				}
			});
	}
</script>
