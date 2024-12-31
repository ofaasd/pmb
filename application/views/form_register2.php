<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
	
	.pcoded .pcoded-inner-content{
		padding:0 !important;
	}
	body{
		font-family: "Roboto", sans-serif;
		font-weight: 100;
		font-style: normal;
	}
</style>

<!--<div class="row">
	<div class="col-md-12">
		<video width="100%" autoplay muted loop>
		  <source src="<?php echo base_url() ?>assets/video/cover.mp4" type="video/mp4">
		Your browser does not support the video tag.
		</video>
	</div>
</div> -->

<div class="card-block" style="padding:0;">
	<div class="row">
		<div class="col-md-8" >
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="position:fixed;">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php $active = 0;
						foreach($slide as $row){?>
					<div class="carousel-item <?php echo ($active == 0)?"active":""; $active = 1 ?>">
						<img class="d-block w-100" src="https://stifar.id/assets/images/slideshow/<?php echo $row->gambar ?>" alt="<?php echo $row->caption ?>">
					</div>
					<?php } ?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
		</div>
		<div class="col-md-4" >
			<div class="row">
				<div class="col-md-12" >
					<form action="<?php echo base_url()?>auth/register" method="post" class="j-pro" id="j-pro" style="border:0;height:100%;position:fixed;overflow-y:scroll;opacity:0.95">
							<!-- end /.header -->
						<div class="j-content" >
								<center><img class="img-fluid" src="<?php echo $this->config->item('logo_url')?>" alt="Dijawa Logo" style="height:80px;margin:20px;"></center>
								<center><p><b>Sekolah Tinggi Ilmu Farmasi</b></p></center>
								<hr>
								<center><h5>Pendaftaran <?= $curr_gelombang->nama_gel ?? '' ?></h5></center>
								<br />
								<?php
									if(empty($curr_gelombang)){
								?>
										<div class="alert alert-danger" style="background:rgba(231, 76, 60,1.0); border:1px solid rgba(192, 57, 43,1.0); color:#fff">
											Gelombang Tidak Ditemukan <a href="<?=base_url()?>" class="btn btn-primary btn-sm">Klik Disini</a> untuk melihat List Gelombang
										</div>
								<?php } ?>
								<?php if(!empty($this->session->flashdata('gagal'))){
									echo '<div class="alert alert-danger border-danger">
									
										' . $this->session->flashdata('gagal') . '
									</div>';
								}?>
								<div class="j-unit">
									<div class="j-input">
										<label class="j-icon-right" for="nama">
											<i class="icofont icofont-ui-user"></i>
										</label>
										<input type="text" id="nama" name="nama" placeholder="Nama..." required>
									</div>
								</div>
								<div class="j-unit">
									<div class="j-input">
										<label class="j-icon-right" for="email">
											<i class="icofont icofont-ui-email"></i>
										</label>
										<input type="email" id="email" name="email" placeholder="Email...">
									</div>
								</div>
								<div class="j-unit">
									<div class="j-input">
										<label class="j-icon-right" for="No. WA">
											<i class="icofont icofont-ui-phone"></i>
										</label>
										<input type="text" id="no_wa" name="no_wa" placeholder="EG : 082XXXXXXXXX" required>
									</div>
								</div>
								<!-- end login -->
								<!-- start password -->
								<label for="tanggal_lahir">Tanggal Lahir</label> <br />
								<div class="j-unit">
									<div class="j-input">
										
										<label class="j-icon-right" for="tgl_lahir">
											<i class="icofont icofont-calendar"></i>
										</label>
										<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required style="padding-bottom:15px;padding-top:10px;">
										
									</div>
								</div>
								<div class="j-unit">
								<input type="hidden" name="gelombang" value="<?=$id?>">
								<div class="j-input">
									<p><label for="gelombang_choice"><b>Gelombang Pendaftaran</b></label></p>
									<select name="gelombang_choice" class="form-control" style="font-size:14px;height:50px;" required readonly disabled>
										<option value="">Pilih Gelombang</option>
										<?php foreach($gelombang as $row_gel){?>		
											<option value="<?=$row_gel->id?>" <?=($id == $row_gel->id)?"selected":""?>><?= $row_gel->nama_gel?> (TA <?=$row_gel->ta_awal?>/<?=$row_gel->ta_akhir?>)</option>
										<?php } ?>
									</select>
									<div class="alert alert-warning border-warning">
										Pastikan Gelombang pendaftaran sesuai dengan data pendaftaran anda
									</div>
								</div>
							</div>
							<!-- end password -->
							<!-- start reCaptcha -->
							<div class="j-unit">
								<!-- start an example of the site key -->
								<div class="g-recaptcha" data-sitekey="6LfGuHopAAAAALBvf-EbLPNQjSLOPWxjuhW7Pxqg"></div>
								<!-- end an example of the site key -->
								<!-- <div class="g-recaptcha" data-sitekey="your-site-key"></div> -->
							</div>
							<!-- end reCaptcha -->
							<!-- start response from server -->
							<div class="j-response"></div>
							<!-- end response from server -->
							<div class="j-unit">
								<center><button type="submit" class="btn btn-primary btn-block" style="float:none">Daftar</button> <br /><br />ATAU <br /><br />
								<small><b>Jika Sudah punya Akun silahkan harap lakukan login dengan klik tombol di bawah ini</b></small><br /><br />
								<a href="<?php echo base_url() ?>/new_login/<?=$id?>" class="btn btn-success btn-block">Masuk</a></center>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>
