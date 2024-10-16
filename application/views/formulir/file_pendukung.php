<style>
.alert-info{
	border:1px solid #2980b9;
	background:#3498db;
	color:#fff;
	font-size:12pt;
	margin-top:10px;
}
</style>
<form action="<?php echo base_url()?>formulir/update_file_pendukung" method="post" enctype="multipart/form-data">		
	<input type="hidden" name="id" value="<?php echo $detail_cmhs2->id ?>">
	<h4>File Pendukung</h4>
	<hr />
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<!-- bagian foto -->
					<div class="info_gelombang">

					</div>
					Dapat Info PMB darimana?
						<p>
							<select name="info_pmb" class="form-control" required="">
							<option value="opt1" <?= ($detail_cmhs2->info_pmb == 'opt1')?"selected":'' ?>>- Pilih -</option>
							<option value="1" <?= ($detail_cmhs2->info_pmb == '1')?"selected":'' ?>>Teman</option>
							<option value="2" <?= ($detail_cmhs2->info_pmb == '2')?"selected":'' ?>>Kerabat / Orang Tua</option>
							<option value="3" <?= ($detail_cmhs2->info_pmb == '3')?"selected":'' ?>>Sosial Media</option>
							<option value="4" <?= ($detail_cmhs2->info_pmb == '4')?"selected":'' ?>>Lainnya</option>
							</select>
						</p>
						Ukuran Seragam
						<p>
							<select name="ukuran_seragam" class="form-control" required="">
							<option value="opt1" <?= ($detail_cmhs2->ukuran_seragam == 'opt1')?"selected":'' ?>>- Pilih Ukuran Seragam -</option>
							<option value="S" <?= ($detail_cmhs2->ukuran_seragam == 'S')?"selected":'' ?>>S</option>
							<option value="M" <?= ($detail_cmhs2->ukuran_seragam == 'M')?"selected":'' ?>>M</option>
							<option value="L" <?= ($detail_cmhs2->ukuran_seragam == 'L')?"selected":'' ?>>L</option>
							<option value="XL" <?= ($detail_cmhs2->ukuran_seragam == 'XL')?"selected":'' ?>>XL</option>
							<option value="XXL" <?= ($detail_cmhs2->ukuran_seragam == 'XXL')?"selected":'' ?>>XXL</option>
							<option value="XXXL" <?= ($detail_cmhs2->ukuran_seragam == 'XXXL')?"selected":'' ?>>XXXL</option>
							</select>
						</p>
						Upload File Pendukung :
						<p><input type='file' name="foto" onchange="readURL(this);" />
						Maksimal 5 MB dengan format pdf.</p>
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#file_detail">
							Lihat File
						</button>
						<div class="modal fade" id="file_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Detail File</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<embed src="<?php echo base_url()?>assets/file_pmb/<?= $detail_cmhs2->file_pendukung ?>" width="100%" height="400" type="application/pdf">	
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="info_gelombang">
									<div class="alert alert-info"><?= nl2br($curr_gelombang->nama_gel_long) ?></div>
								</div>
							</div>
						</div>
						<br><br>
							<input type="submit" value="simpan" class="btn btn-primary col-md-12">
						
					
					<!--<div class="col-sm-2">
						<input type="submit" value="simpan" class="btn btn-primary">
					</div>-->
				</div>
			</div>
		</div>
	</div>
</form>
