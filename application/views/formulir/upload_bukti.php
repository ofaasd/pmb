                   

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
					    <?php if(stripos($gelombang->nama_gel, 'magister') || stripos($gelombang->nama_gel, 's2') || stripos($gelombang->nama_gel, 'apoteker')) { ?>
						<h4 class="sub-title">BUKTI PEMBAYARAN CALON MAHASISWA</h4>
						<h5>Info dan Ketentuan Pembayaran</h5>
						<ol start=1>
							<li>Biaya Pendaftaran Mahasiswa Baru Sebesar <b>Rp. <?= number_format($biaya_pendaftaran->jumlah,0,",",".")?></b></li>
							<li>
								Uang Pendaftaran dapat di transferkan melalui rekening kami yaitu <br />
								Dengan No. Rekening : <b><?=$rekening->norek?> (<?=$rekening->nama_bank?> an. <?=$rekening->atas_nama?>)</b>
							</li>
							<li>Setelah melakukan transfer harap mengisi form dibawah ini atau  menghubungi Admin PMB (+62 813-9311-1171 / (024) 6706147)</li>
						</ol>
						<hr>
						<form id="" action="<?php echo base_url()?>formulir/cmhs_tambah_bukti" method="post" enctype="multipart/form-data">
							<!-- One "tab" for each step in the form:  -->
							<div class="row">
								<div class="col-sm-6">
									<input type="hidden" name="nopen" value="<?php echo $peserta->nopen ?>">
									No Rekening Pengirim :
									<p><input type="text" class="form-control" placeholder="Nomor Rekening" oninput="this.className = ''" name="norek" required=""></p>
									Atas Nama Rekening Pengirim :
									<p><input type="text" class="form-control" placeholder="Atas Nama" oninput="this.className = ''" name="an_rekening" required=""></p>
									Tanggal Transfer :
									<p><input type="date" class="form-control" placeholder="Tanggal Transfer" oninput="this.className = ''" name="tgl_tf" required=""></p>
									Rekening Tujuan :
									<p>
										<select name="id_rekening" class="form-control" oninput="this.className = ''" required="">
											<?= "<option value='" . $rekening->id . "'>" . $rekening->nama_bank . " : " . $rekening->norek . " (AN. " . $rekening->atas_nama . ")</option>";?>
										</select>
									</p>
									Bukti Transfer :
									<p><input type="file" class="form-control" placeholder="Bukti Pembayaran" oninput="this.className = ''" name="bukti" required=""> <small>* Max 1MB </small></p>
									
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
    			    <div class="alert alert-primary">Bebas Biaya Pendaftaran</div>
		    	<?php } ?>
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
