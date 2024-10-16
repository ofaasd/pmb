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
					<form action="<?php echo base_url()?>auth" method="post" class="j-pro" id="j-pro" style="border:0;height:100%;position:fixed;overflow-y:scroll;opacity:0.95">
							<!-- end /.header -->
						<div class="j-content" >
								<center><img class="img-fluid" src="<?php echo $this->config->item('logo_url')?>" alt="Dijawa Logo" style="height:80px;margin:20px;"></center>
								<center><p><b>Sekolah Tinggi Ilmu Farmasi</b></p></center>
								<hr>
								
							<!-- end response from server -->
							<div class="j-unit">
							<center><small><b>Bagi yang sudah memiliki akun silahkan masuk melalui tombol di bawah ini </b></small><br /><br />
								<a href="<?php echo base_url() ?>welcome/new_login" class="btn btn-primary btn-block" style="float:none">Masuk</a> <br /><br />ATAU <br /><br />
								<small><b>Bagi yang belum memiliki akun silahkan lakukan pendaftaran </b></small><br /><br />
							<a href="<?php echo base_url() ?>welcome/register" class="btn btn-success btn-block">Daftar Disini</a></center>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>
</div>
