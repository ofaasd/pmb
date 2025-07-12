<form action="<?php echo base_url()?>formulir/update_asal_sekolah" method="post" enctype="multipart/form-data">		
		<input type="hidden" name="id" value="<?php echo $detail_cmhs2->id ?>">
		<input type="hidden" name="jalur" value="<?php echo $detail_cmhs2->jalur_pendaftaran ?>">
		<h4>Jurusan & Asal Sekolah</h4>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h3>Pilihan Program Studi</h3>
						<div id="jurusan">
							<?php foreach($list_prodi as $key=>$row){?>
							Program Studi <?= ($key+1)?>
							<p><select name='prodi[]' class="form-control" readonly disabled>
								<?php foreach($row as $detail){ 
									$pilihan = "";
									if($key == 0){
										$pilihan = $detail_cmhs2->pilihan1;
									}else{
										$pilihan = $detail_cmhs2->pilihan2;
									}
									?>
									<option value="<?= $detail->id_program_studi; ?>" <?= ($pilihan == $detail->id_program_studi)?"selected":"" ?>><?=$detail->nama_prodi?></option>
								<?php } ?>
							</select></p>
							<?php }	?>
						</div>
						<h3>Asal Sekolah</h3>
						<span id="judul_asal">Pendidikan Terakhir</span> <span class="text-danger">*</span> :
						<p>
							<select name="pendidikan_terakhir" id="asal_sekolah" class="form-control">
								<?php $pendidikan = array('SMA/SMK/Sederajat','Diploma (D1 - D2 - D3)','Sarjana (S1 / D4)');
								foreach($pendidikan as $value) {?>
								<option value="<?=$value?>" <?= ($asal_sekolah->pendidikan_terakhir == $value)?"selected":'' ?>><?=$value?></option>
								<?php }?>
							</select>
						</p>
						<span id="judul_asal">Nama Sekolah / Kampus</span> <span class="text-danger">*</span> :
						<p><input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="<?= $asal_sekolah->asal_sekolah ?? ''?>"></p>
						<span id="judul_jurusan">Jurusan / Program Studi</span> <span class="text-danger">*</span> :
						<p><input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $asal_sekolah->jurusan ?? ''?>"></p>
						<span id="judulakreditasi">Akreditasi</span> <span class="text-danger">*</span> :
						<p><select name="akreditasi" class="form-control" id="akre_default">
							<option value="A" <?= ($asal_sekolah->akreditasi == "A")?"selected":'' ?>>A (Unggul)</option>
							<option value="B" <?= ($asal_sekolah->akreditasi == "B")?"selected":'' ?>>B (Baik Sekali)</option>
							<option value="C" <?= ($asal_sekolah->akreditasi == "C")?"selected":'' ?>>C (Baik)</option>
						</select></p>
						<span id="judul_alamat_sekolah">Alamat Sekolah / Kampus</span> <span class="text-danger">*</span> :
						<p><input type="text" name="alamat_sekolah" id="alamat_sekolah" class="form-control" value="<?= $asal_sekolah->alamat ?? ''?>"></p>
						<span id="judul_provinsi_sekolah">Provinsi Sekolah / Kampus</span> <span class="text-danger">*</span> :
						<p>
							<select name="provinsi_sekolah" id="provinsi_sekolah" class="form-control" required="">
								<?php
									if(!empty($asal_sekolah->provinsi_id)){
										echo "<option value='" . $curr_wil->id_wil . "'>" . $curr_wil->nm_wil . "</option>";
									}else{
										echo '<option selected="">Pilih Provinsi</option>';
									}
								foreach($wilayah as $w){?>
								<option value="<?php echo $w->id_wil ?>"><?php echo $w->nm_wil ?></option>
								<?php } ?>
							</select>
						</p>
						<span id="judul_kota_sekolah">Kota Sekolah / Kampus</span> <span class="text-danger">*</span> :
						<p>
							<select name="kota_sekolah" id="kota_sekolah" class="form-control" required=""> 
								
								<?php
								if(!empty($asal_sekolah->provinsi_id)){
									echo "<option value='" . $curr_kota->id_wil . "'>" . $curr_kota->nm_wil . "</option>";
								}else{
									echo '<option>Pilih Kota/Kabupaten</option>';
								}
								if(!empty($kota)){
									foreach($kota as $row){
										echo "<option value='" . $row->id_wil . "'>" . $row->nm_wil . "</option>";
									}
								}
								?>
							</select>
						</p>
						<?php 
							if($detail_cmhs2->jalur_pendaftaran == 5 || $detail_cmhs2->jalur_pendaftaran == 6){
						?>
								<div id="area_pasca">
									<label for="ipk">Nilai IPK S1</label> <span class="text-danger">*</span> :
									<p><input type="number" name="ipk" id="ipk" class="form-control" value="<?= $detail_cmhs2->ipk ?? ''?>"> <small class="text-warning">Gunakan . (titik) untuk nilai desimal</small></p>
									<label for="toefl">Nilai TOEFL</label> <span class="text-danger">*</span> :
									<p><input type="number" name="toefl" id="toefl" class="form-control" value="<?= $detail_cmhs2->toefl ?? ''?>"><small class="text-warning">Gunakan . (titik) untuk nilai desimal</small></p>
								</div>
						<?php
							}
						?>
					</div>
					<div class="col-md-6" id="nilai_mapel">
						<?php 
							if($detail_cmhs2->jalur_pendaftaran == 1 || $detail_cmhs2->jalur_pendaftaran == 2){
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
						<?php	} }
							}
						?>
					</div>
					<div class="col-md-12">
						<input type="submit" value="simpan" class="btn btn-primary col-md-12">
					</div>
			</div>
		</div>
</form>
<script>
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
</script>
