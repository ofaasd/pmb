<div class="page-body">
	<div class="row">
		<div class="col-sm-12 mb-4">
			<?php echo $this->session->userdata('status_update'); 
				$this->session->set_userdata('status_update', ''); ?>
			<h3>Selamat Datang, <?php echo $this->session->userdata("nama"); ?></h3>

		</div>
		<div class="col-sm-12 mb-4">
			<div class="card">
				<div class="card-header">
					<B>Langkah-Langkah Pendaftaran</B>	
				</div>
				<div class="card-block">
					<div class="row">
						<div class="col-md-3 mb-3">
							<div class="card bg-primary">
								<div class="card-header">
									1. Formulir
									<hr>
								</div>
								<div class="card-block">
									<p>Mengisi dan melengkapi formulir pendaftaran melalui tombol dibawah atau melalui menu di sebelah kanan</p>
									<a href="<?php echo base_url()?>formulir/info" class="btn btn-warning btn-sm">Formulir</a>
								</div>
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<?php $nopen = (!empty($pmb_peserta->nopen))?$pmb_peserta->nopen:""; ?>
							<div class="card <?= (empty($pmb_peserta))?"bg-secondary":"bg-primary"?>">
								<div class="card-header">
									2. Validasi Data
									<hr>
								</div>
								<div class="card-block">
									<p>Setelah form dilengkapi silahkan melakukan validasi data dengan menekan tombol di bawah ini.</p>

									<?php
										
										if(empty($pmb_peserta)){
									?>
										<a href="#" class="btn btn-danger btn-sm btn-disabled">
											Formulir Kosong
										</a>
									<?php
										}elseif(empty($nopen)){
									?>
										<a href="#" class="btn btn-success btn-sm" id="validasi_biodata" onclick="return validasi()">Validasi Sekarang</a>
									<?php }else{ ?>
										<a href="#" class="btn btn-success btn-sm btn-disabled" id="validasi_biodata"><i class="fa fa-check"></i>Data Tervalidasi</a>
										<p class="mt-2 bg-success text-white">No. Pendaftaran : <?= $nopen ?></p>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<div class="card <?=(empty($nopen))?"bg-secondary":"bg-primary"?>">
								<div class="card-header">
									3. Pembayaran Pendaftaran
									<hr>
								</div>
								<div class="card-block">
									<p>Melakukan pembayaran pendaftaran melalui VA yang didapatkan setelah peserta melakukan validasi data</p>
									
									<?php
										if(empty($nopen)){
									?>
											<a href="#" class="btn btn-danger btn-sm btn-disabled">
												Validasi Data Terlebih Dahulu
											</a>
									<?php
										}else{
									?>
										<a href="<?php echo base_url();?>formulir/upload_bukti/" class="btn btn-primary btn-sm">
											<span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
											<span class="pcoded-mtext">Lihat VA</span>
										</a>
									<?php
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<div class="card <?=(empty($nopen))?"bg-secondary":"bg-primary"?>">
								<div class="card-header">
									4. Pengumuman
									<hr>
								</div>
								<div class="card-block">
									<p>Melihat hasil pengumuman peserta yang dinyatakan lolos seleksi oleh pihak Admisi STIFAR</p>
									
									<?php
										if(empty($nopen)){
									?>
											<a href="#" class="btn btn-danger btn-sm btn-disabled">
												Validasi Data Terlebih Dahulu
											</a>
									<?php
										}else{
									?>
										<a href="<?php echo base_url();?>formulir/pengumuman_ujian/" class="btn btn-primary btn-sm">
											<span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
											<span class="pcoded-mtext">Lihat Pengumuman</span>
										</a>
									<?php
										}
									?>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="card bg-success">
								<div class="card-header">
									<h2>Syarat Pendaftaran <?= $gelombang->nama_gel ?></h2>
								</div>
								<div class="card-block">
									<?= nl2br($gelombang->nama_gel_long) ?>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function validasi(){
		var r = confirm("Jika Anda melakukan validasi, maka data pendaftaran Anda akan dikirim ke sistem. Selanjutnya Anda tidak dapat mengubah data Anda dan akan diberikan nomor pendaftaran. Data yang tidak divalidasi akan diabaikan dari sistem pendaftaran.");
		if (r == true) {
			return window.location.href = "<?php echo base_url()?>formulir/validasi_biodata";
		} else {
			return false;
		}
	}
</script>
