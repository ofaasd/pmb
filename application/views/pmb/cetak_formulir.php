<table width="100%">
	<tr>
		<td width="60px"><img src="<?php echo base_url();?>/assets/images/logo/logo.png" style="width: 100px; height: 100;"></td>
		<td colspan="3"><center><h2>FORMULIR PENDAFTARAN<br>SEKOLAH TINGGI ILMU FARMASI</h2><p>Alamat : JL Sarwo Edhie Wibowo Km 1 Semarang || Email : stifar_yaphar@yahoo.com || Telp. (024) 6706147 <br> Website: https://stifar.ac.id</p></center></td>
	</tr>
	<tr>
		<td colspan="4"><img src="<?php echo base_url('assets/images/line.jpg')?>"></td>
	</tr>
</table>
<table width="100%" >
<?php foreach($cetak as $c){?>
	<tr>
		<td>Nomor Pedaftaran</td>
		<td> : </td>
		<td> <?php echo $c->nopen ?> </td>
	</tr>
	<tr>
		<td>Jalur / Gelombang Pendaftaran</td>
		<td> : </td>
		<td> <?php echo $data['gelombang']; ?> </td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td> : </td>
		<td> <?php echo $c->nama ?> </td>
	</tr>
	<tr>
		<td>Nomor KTP</td>
		<td> : </td>
		<td> <?php echo $c->noktp ?> </td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td> : </td>
		<td> <?php echo ($c->jk == 1)?"Laki-laki":"Perempuan" ?> </td>
	</tr>
	<tr>
		<td>Tempat & Tanggal Lahir</td>
		<td> : </td>
		<td> <?php echo $c->tempat_lahir ?>, <?php $tgl = date_create($c->tanggal_lahir); echo date_format($tgl, "d-m-Y"); ?> </td>
	</tr>
	<tr>
		<td>Nomor Telpon / HP</td>
		<td> : </td>
		<td> <?php echo $c->telpon ?> / <?php echo $c->hp ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td> : </td>
		<td> <?php echo $c->alamat ?>,&emsp;&emsp;RT : <?php echo $c->rt ?>&emsp; RW : <?php echo $c->rw ?></td>
	</tr>
	<tr>
		<td>Kelurahan</td>
		<td> : </td>
		<td> <?php echo $c->kelurahan ?></td>
	</tr>
	<tr>
		<td>Kecamatan</td>
		<td> : </td>
		<td> <?php echo $data['nm_kec']; ?></td>
	</tr>
	<tr>
		<td>Kota / Kabupaten</td>
		<td> : </td>
		<td> <?php echo $data['nm_kab']; ?></td>
	</tr>
	<tr>
		<td>Provinsi</td>
		<td> : </td>
		<td> <?php echo $data['nm_prop']; ?></td>
	</tr>
	<tr>
		<td>Warga Negara</td>
		<td> : </td>
		<td> <?php echo $data['nama_negara']; ?></td>
	</tr>
	<tr>
		<td>Kode POS</td>
		<td> : </td>
		<td> <?php echo $c->kodepos ?></td>
	</tr>
	<tr>
		<td>Agama</td>
		<td> : </td>
		<td> <?php if($c->agama == 1){echo "Islam";}else if($c->agama == 2){echo "Kristen";}else if($c->agama == 3){echo "Katolik"; }else if($c->agama == 4){echo "Hindu";}else if($c->agama == 5){echo "Budha";}else if($c->agama == 6){echo "Konghucu";}else if($c->agama == 99){echo "Lainnya"; } ?> </td>
	</tr>
	<tr>
		<td colspan="3"><hr></td>
	</tr>
	<tr>
		<td>Pendidikan Terakhir</td>
		<td> : </td>
		<td> <?php echo $data['sekolah']['pendidikan_terakhir']; ?> </td>
	</tr>
	<tr>
		<td>Asal Sekolah</td>
		<td> : </td>
		<td> <?php echo $data['sekolah']['asal_sekolah']; ?> </td>
	</tr>
	<tr>
		<td>Jurusan / Akreditasi</td>
		<td> : </td>
		<td> <?php echo $data['sekolah']['jurusan']; ?> / <?php echo $data['sekolah']['akreditasi']; ?> </td>
	</tr>
	<tr>
		<td>Alamat Sekolah</td>
		<td> : </td>
		<td> <?php echo $data['sekolah']['alamat']; ?> </td>
	</tr>
	<tr>
		<td>Kota / Provinsi</td>
		<td> : </td>
		<td> <?php echo $data['nm_kab_asal']; ?> / <?php echo $data['nm_prop_asal']; ?></td>
	</tr>
	<tr>
		<td>Nama Ayah</td>
		<td> : </td>
		<td> <?php echo $c->nama_ayah ?> </td>
	</tr>
	<tr>
		<td>Nama Ibu</td>
		<td> : </td>
		<td> <?php echo $c->nama_ibu ?> </td>
	</tr>
	<tr>
		<td>Pilihan Pertama</td>
		<td> : </td>
		<td> <?php echo  $data['jurusan1'] ?? "-"; ?> </td>
	</tr>
	<tr>
		<td>Pilihan Kedua</td>
		<td> : </td>
		<td> <?php echo $data['jurusan2'] ?? "-"; ?> </td>
	</tr>
	<!-- <tr>
		<td>Kelas Dipilih</td>
		<td> : </td>
		<td> <?php if($c->kelas == 1){echo "Reguler";}else if($c->kelas == 2){echo "Karyawan";}else if($c->kelas == 3){echo "RPL";}else if($c->kelas == 4){echo "Kimia Farma";} ?></td>
	</tr>
	<tr>
		<td>Jenis Pendaftaran</td>
		<td> : </td>
		<td> <?php if($c->jenis_pendaftaran == 1){echo "Peserta Didik Baru";}else if($c->jenis_pendaftaran == 2){echo "Pindahan";}else if($c->jenis_pendaftaran == 11){echo "Alih Jenjang";}else if($c->jenis_pendaftaran == 12){echo "Lintas Jalur";} ?></td>
	</tr> -->
	
	<tr>
		<td colspan="3"><br><br><img src="<?php echo base_url().'assets/foto_pmb_peserta/'.$c->foto_peserta;?>" style="width:125px;height:180px;border: 5px;" ></td>
	</tr>
<?php }?>
</table>
