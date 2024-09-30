<form action="<?php echo base_url()?>formulir/update_detail" method="post" enctype="multipart/form-data">
				
				
	<h4>Data Pribadi</h4>
	<hr />
	<div class="form-group row">
		
		<div class="col-sm-6">
			<div class="col-sm-12">
				<label>No. Pendaftaran : </label>
			</div>
			<div class="col-sm-12">
				<input type="text" class="form-control" value="<?php echo $detail_cmhs->id ?>" name="id" hidden="">
				<input type="text" class="form-control" readonly="" name="nopen" value="<?php echo $detail_cmhs->nopen ?>"  maxlength="16">
			</div>
			<br />
			<div class="col-sm-12">
				<?php if(empty($detail_cmhs->nopen)){?>
				<a href="#" class="btn btn-primary btn-mini" id="validasi_biodata" onclick="return validasi()">Validasi </a> Untuk Mendapatkan No. Pendaftaran</a>
				<?php } ?>
			</div><br />
			<div class="col-sm-12">
				<label>Nomor KTP : </label>
			</div>
			<div class="col-sm-12">
				<input type="number" class="form-control" name="noktp" value="<?php echo $detail_cmhs->noktp ?>" maxlength="16">
			</div>
			<label class="col-sm-12 col-form-label">Nama Lengkap : </label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="nama" value="<?php echo $detail_cmhs->nama ?>" >
			</div>
			<div class="row">
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Jenis Kelamin : </label>
					<div class="col-sm-12">
						<select name="jk" class="form-control" >
							<option selected="" value="<?php echo $detail_cmhs->jk ?>"><?php if($detail_cmhs->jk == 1){ echo "Laki - Laki"; }else{ echo "Perempuan"; } ?></option>
							<option value="1">Laki - Laki</option>
							<option value="2">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Agama : </label>
					<div class="col-sm-12">
						<select name="agama" class="form-control" >
							<option value="<?php echo $detail_cmhs->agama ?>" selected="" ><?php if($detail_cmhs->agama == 1 ){ 
									echo "Islam"; 
								}else if($detail_cmhs->agama == 2){ 
									echo "Kristen"; 
								}else if($detail_cmhs->agama == 3){ 
									echo "Katolik"; 
								}else if($detail_cmhs->agama == 4){ 
									echo "Hindu"; 
								}else if($detail_cmhs->agama == 5){ 
									echo "Budha"; 
								}else if($detail_cmhs->agama == 6){ 
									echo "Konghucu"; 
								}else{ 
									echo "Lainnya"; 
								}
							?></option>

							<option value="1">Islam</option>
							<option value="2">Kristen</option>
							<option value="3">Katolik</option>
							<option value="4">Hindu</option>
							<option value="5">Budha</option>
							<option value="6">Konghucu</option>
							<option value="99">Lainnya</option>
						</select>
					</div>
				</div>
			</div>
			
			
			
			<label class="col-sm-12 col-form-label">Nama Ibu : </label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="nama_ibu" value="<?php echo $detail_cmhs->nama_ibu ?>" >
			</div>
			<label class="col-sm-12 col-form-label">Nama Ayah : </label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="nama_ayah" value="<?php echo $detail_cmhs->nama_ayah ?>" >
			</div>
			
			
			<div class="row">
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Tinggi Badan : </label>
					<div class="col-sm-12">
						<input type="number" class="form-control" name="tinggi_badan" value="<?php echo $detail_cmhs->tinggi_badan ?>" >
					</div>
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Berat Badan : </label>
					<div class="col-sm-12">
						<input type="number" class="form-control" name="berat_badan" value="<?php echo $detail_cmhs->berat_badan ?>" >
					</div>
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Tempat Lahir : </label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $detail_cmhs->tempat_lahir ?>" >
					</div>			
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">Tanggal Lahir : </label>
					<div class="col-sm-12">
						<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $detail_cmhs->tanggal_lahir ?>" >
					</div>			
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">No. HP : </label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="hp" value="<?php echo $detail_cmhs->hp ?>" >
					</div>			
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">No. Telpon :</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" name="telpon" value="<?php echo $detail_cmhs->telpon ?>" >
					</div>			
				</div>
			</div>
		</div>
		<!-- Batas Column -->
		<div class="col-sm-6">
		<div class="col-sm-12">
				<label>Warga Negara : </label>
			</div>
				<div class="col-sm-12">
				<select name="warga_negara" id="wn" class="form-control" >
					<option selected="" value="<?php echo $detail_cmhs->warga_negara ?>"><?php echo $data['nama_negara']?></option>
					<?php foreach($warga_negara as $w){?>
					<option value="<?php echo $w->id_negara?>"><?php echo $w->nm_negara ?></option>
					<?php } ?>
				</select>
			</div>
			<label class="col-sm-12 col-form-label">Nama Provinsi : </label>
				<div class="col-sm-12">
				<select name="provinsi" id="provinsi" class="form-control" >
					<option selected="" value="<?php echo $detail_cmhs->provinsi ?>"><?php echo $data['nm_prop']; ?></option>
					<?php foreach($wilayah as $w){?>
					<option value="<?php echo $w->id_wil ?>"><?php echo $w->nm_wil ?></option>
					<?php } ?>
				</select>
			</div>
			<label class="col-sm-12 col-form-label">Kota / Kabupaten : </label>
				<div class="col-sm-12">
				<select name="kotakab" id="kotakab" class="form-control" > 
					<option selected="" value="<?php echo $detail_cmhs->kotakab ?>"><?php echo $data['nm_kab']; ?></option>
				</select>
			</div>
			<label class="col-sm-3 col-form-label">Kecamatan : </label>
			<div class="col-sm-12">
				<select name="kecamatan" id="kecamatan" class="form-control" >
					<option selected="" value="<?php echo $detail_cmhs->kecamatan ?>"><?php echo $data['nm_kec']; ?></option>
				</select>
			</div>
			<label class="col-sm-3 col-form-label">Kode POS : </label>
			<div class="col-sm-12">
				<input type="number" class="form-control" name="kode_pos" value="<?php echo $detail_cmhs->kodepos ?>" >
			</div>
			<label class="col-sm-3 col-form-label">Kelurahan : </label>
			<div class="col-sm-12">
				<input type="text" class="form-control" name="kelurahan" value="<?php echo $detail_cmhs->kelurahan ?>" >
			</div>
			<label class="col-sm-12 col-form-label">Alamat : </label>
			<div class="col-sm-12">
				<textarea class="form-control" name="alamat" style="resize: none;" ><?php echo $detail_cmhs->alamat ?></textarea>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">RT :</label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="rt" value="<?php echo $detail_cmhs->rt ?>" >
					</div>
				</div>
				<div class="col-md-6">
					<label class="col-sm-12 col-form-label">RW : </label>
					<div class="col-md-12">
						<input type="text" class="form-control" name="rw" value="<?php echo $detail_cmhs->rw ?>" >
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		
	</div>
				<div class="form-group row">
					
					 <div class="col-sm-12">
						<input type="submit" value="simpan" class="btn btn-primary" style="width:100%">
					</div>
				</div>
			   </form>
