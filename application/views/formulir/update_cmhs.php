<?php
	$jalur = array(1=>"PMDP","Kerjasama","Umum");
?>
<style>
	.btn-active{
		border:3px solid #16a085
	}
</style>
<div class="page-body">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-3 mb-4">
					
					<a href="<?php echo base_url()?>formulir/update_formulir" class="btn btn-primary col-md-12 <?= ($this->router->fetch_method() == "info")?"btn-active":""?>" style="padding:10px 0;"> Info Pribadi</a>
				</div>
				<div class="col-md-3 mb-4">
					<a href="<?php echo base_url()?>formulir/jalur_pendaftaran" class="btn btn-primary col-md-12 <?= ($this->router->fetch_method() == "jalur_pendaftaran")?"btn-active":""?>" style="padding:10px 0;">Jalur Pendaftaran</a>
				</div>
				<div class="col-md-3 mb-4">
					<a href="<?php echo base_url()?>formulir/asal_sekolah" class="btn btn-primary col-md-12 <?= ($this->router->fetch_method() == "asal_sekolah")?"btn-active":""?>" style="padding:10px 0;">Asal Sekolah</a>
				</div>
				<div class="col-md-3 mb-4">
					<a href="<?php echo base_url()?>formulir/file_pendukung" class="btn btn-primary col-md-12 <?= ($this->router->fetch_method() == "file_pendukung")?"btn-active":""?>" style="padding:10px 0;">File Pendukung</a>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<?php echo $this->session->userdata('status_update'); 
								$this->session->set_userdata('status_update', ''); ?>
					<h5>FORM DETAIL CALON MAHASISWA BARU</h5>
				</div>
				<div class="card-block">
					<?php echo $content2; ?>
			  </div>
			 </div>
			</div>
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function validasi(){
		var r = confirm("Jika Anda melakukan validasi, maka data pendaftaran Anda akan dikirim ke sistem. Selanjutnya Anda tidak dapat mengubah data Anda dan akan diberikan nomor pendaftaran. Data yang tidak divalidasi akan diabaikan dari sistem pendaftaran.");
		if (r == true) {
			return window.location.href = "<?php echo base_url()?>formulir/validasi_biodata";
		} else {
			return false;
		}
	}
	$(document).ready(function(){
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
		$('#gelombang').change(function(){
			var val_gel = $(this).val();
			var nopen_pmdp = 20000;
			var nopen_gel = 50000;
			if(val_gel == 'PMDP'){
				$.ajax({
					url : "<?php echo base_url();?>pmb/nopen_pmdp/",
					method : "POST",
					data : {id: nopen_pmdp},
					async : false,
					dataType : 'json',
					success: function(data){
						var nopen_baru = '';
						var i;
						for(i=0; i<data.length; i++){
							// nopen_baru += data[i].nopen;
							nopen_baru += '<input type="text" class="form-control" readonly="" value="'+ data[i].nopen +'" name="nopen">';
						}
						// console.log(nopen_baru);
						$('#nopen').html(nopen_baru);
					}
				});
				document.getElementById('pmdp1').disabled= false;
				document.getElementById('pmdp2').disabled= false;
				document.getElementById('pmdp3').disabled= false;
				document.getElementById('pmdp4').disabled= false;
			}else{
				$.ajax({
					url : "<?php echo base_url();?>pmb/nopen_gel/",
					method : "POST",
					data : {id: nopen_gel},
					async : false,
					dataType : 'json',
					success: function(data){
						var nopen_baru = '';
						var i;
						for(i=0; i<data.length; i++){
							// nopen_baru += data[i].nopen;
							nopen_baru += '<input type="text" class="form-control" readonly="" value="'+ data[i].nopen +'" name="nopen">';
						}
						// console.log(nopen_baru);
						$('#nopen').html(nopen_baru);
					}
				});
				document.getElementById('pmdp1').disabled= true;
				document.getElementById('pmdp2').disabled= true;
				document.getElementById('pmdp3').disabled= true;
				document.getElementById('pmdp4').disabled= true;
			}
		});
	});
	$(document).ready(function(){
		$('#provinsi').change(function(){
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
	});
	$(document).ready(function(){
		$('#provinsi').change(function(){
			var id_prov=$(this).val();
			$('#kotakab').change(function(){
				var id_kota=$(this).val();
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
					 
					}
				});
			});
		});
	});
</script>
