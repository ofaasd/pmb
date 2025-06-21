
<center><img class="img-fluid" src="<?php echo $this->config->item('logo_url')?>" alt="Stifar Logo" style="height:80px;margin:20px;"></center>
<center><p><b>Sekolah Tinggi Ilmu Farmasi</b></p></center>
<h3 class="text-center">Pendaftaran Mahasiswa Baru STIFAR 2025/2026</h3>
<p class="mt-3 mb-3" style="font-size:15pt;">Pilih Jenis Pendaftaran : </p>
<div class="accordion" id="accordionExample" style="background:#fff">
	<?php foreach($gelombang as $row){ ?>
		<div class="card" style="margin-bottom:0">
			<div class="card-header" id="headingOne" style="word-wrap: break-word;">
				<button class="btn btn-link btn-block text-left btn-primary" type="button" style="word-wrap: break-word;" data-toggle="collapse" data-target="#multiCollapseExample1<?=$row->id?>" aria-expanded="true" aria-controls="multiCollapseExample1">
					<h5 class="text-white text-capitalize" style="word-wrap: break-word; white-space: normal; " ><?= strtoupper($row->nama_gel) ?></h5>
				</button>
			</div>

			<div id="multiCollapseExample1<?=$row->id?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="card-body">
					<?= nl2br($row->nama_gel_long) ?>
				</div>
				<div class="card-footer">
					<a href="<?php echo base_url() ?>welcome/register/<?=$row->id?>" class="btn btn-primary">Daftar</a>
					<a href="<?php echo base_url() ?>welcome/new_login/<?=$row->id?>" class="btn btn-success">Masuk</a> 
				</div>
			</div>
		</div>
  	<?php } ?>
</div>
