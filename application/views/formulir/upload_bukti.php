                   

<div class="page-body">
	<div class="row">
		<div class="col-sm-12">
			<?php
				if($peserta->is_verifikasi == 0){
			?>
				<div class="card">
					<div class="card-body">
						<img src="<?= base_url() ?>/assets/images/wait.gif" width="100%">
					</div>
				</div>
			<?php }elseif($peserta->is_verifikasi == 1 && $bukti_registrasi == 0){ ?>
				<div class="card">
					<div class="card-header">
						<?php echo $this->session->userdata('status_update'); 
									$this->session->set_userdata('status_update', ''); ?>
						<h5>FORM BUKTI PEMBAYARAN CALON MAHASISWA BARU</h5>
					</div>
					<div class="card-block">
						<h4 class="sub-title">BUKTI PEMBAYARAN CALON MAHASISWA</h4>
						<h5>Info dan Ketentuan Pembayaran</h5>
						<ol start=1>
							<li>Biaya Registrasi Pendaftaran Mahasiswa Baru Sebesar <b>Rp. <?= number_format($biaya_pendaftaran->jumlah,0,",",".")?></b></li>
							<li>
								Uang Pendaftaran dapat di transferkan melalui rekening kami yaitu <br />
								CIMB Niaga dengan VA : <b>9129.1.<?=$peserta->nopen?>.1</b>
							</li>
							<li>Setelah melakukan transfer harap mengisi form dibawah ini atau  menghubungi Admin PMB (+62 813-9311-1171 / (024) 6706147)</li>
						</ol>
						<hr>
						<form id="" action="<?php echo base_url()?>formulir/cmhs_tambah_bukti" method="post" enctype="multipart/form-data">
							<!-- One "tab" for each step in the form: --> 
								<div class="row">
									<div class="col-sm-6">
										<input type="hidden" name="nopen" value="<?php echo $peserta->nopen ?>">
										Tanggal Transfer :
										<p><input type="date" class="form-control" placeholder="Tanggal Transfer" oninput="this.className = ''" name="tgl_tf" required=""></p>
										
										Bukti Transfer :
										<p><input type="file" class="form-control" placeholder="Bukti Pembayaran" oninput="this.className = ''" name="bukti" required=""> <small>*  Format file berupa pdf,png, dan jpg. Max file 5MB.</small></p>
										
									</div>
									<div class="col-sm-6">
										
									</div>
									<div class="col-sm-12">
										<input type="submit" value="simpan" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
			<?php }else{ ?>

				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="alert bg-primary text-white">
									Bukti pembayaran sudah dikirimkan
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript">
</script>
