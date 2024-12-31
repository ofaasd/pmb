
<center><img class="img-fluid" src="<?php echo $this->config->item('logo_url')?>" alt="Stifar Logo" style="height:80px;margin:20px;"></center>
<center><p><b>Sekolah Tinggi Ilmu Farmasi</b></p></center>
<h3 class="text-center">Pendaftaran Mahasiswa Baru STIFAR 2024/2025</h3>
<p class="mt-3 mb-3" style="font-size:15pt;">Gelombang Pendaftaran : </p>
<div class="accordion" id="accordionExample" style="background:#fff">
	<?php foreach($gelombang as $row){ ?>
		<div class="card" style="margin-bottom:0">
			<div class="card-header" id="headingOne">
			<h2 class="mb-0">
				<button class="btn btn-link btn-block text-left btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample1<?=$row->id?>" aria-expanded="true" aria-controls="multiCollapseExample1">
				<h5 class="text-white text-capitalize"><?= strtoupper($row->nama_gel) ?></h5>
				</button>
			</h2>
			</div>

			<div id="multiCollapseExample1<?=$row->id?>" class="collapse show multi-collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<?= nl2br($row->nama_gel_long) ?>
				</div>
				<div class="card-footer">
					<a href="<?php echo base_url() ?>welcome/register/<?=$row->id?>" class="btn btn-primary">Daftar</a>
					<a href="<?php echo base_url() ?>welcome/new_login/<?=$row->id?>" class="btn btn-success">Login</a> 
				</div>
			</div>
		</div>
  	<?php } ?>
</div>
