<style>
    .alert-info{
        border:1px solid #2980b9;
        background:#3498db;
        color:#fff;
        font-size:12pt;
    }
</style>
<div class="card">
    <div class="card-header">
        <?php echo $this->session->userdata('status_update'); 
                    $this->session->set_userdata('status_update', ''); ?>
        <h5>FORM PENDAFTARAN CALON MAHASISWA BARU</h5>
    </div>
    <div class="card-block">
        <form action="<?php echo base_url()?>formulir/update_detail_single" method="post" enctype="multipart/form-data">
            <hr />
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="gel_ta" value="<?= $gelombang->ta_awal ?>/<?= $gelombang->ta_akhir ?>" readonly>
                            <p></p>
                            <div id="gel_text">PILIH GELOMBANG<span class="text-danger">*</span> :
                                <p><select name="gelombang" id="gelombang" class="form-control" required="" readonly>
                                    <option value="<?= $gelombang->id ?>"><?= $gelombang->nama_gel ?></option>
                                </select></p>
                            </div>
                            <div class="col-sm-12">
                                <label>No. Pendaftaran : </label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?php echo $detail_cmhs->id ?>" name="id" hidden="">
                                <input type="text" class="form-control" readonly="" name="nopen" value="<?php echo $detail_cmhs->nopen ?>"  maxlength="16">
                            </div>
                            <div class="col-sm-12">
                                <?php if(empty($detail_cmhs->nopen)){?>
                                <a href="#" class="btn btn-primary btn-mini" id="validasi_biodata" onclick="return validasi()">Validasi </a> Untuk Mendapatkan No. Pendaftaran</a>
                                <?php } ?>
                            </div><br />
                            Nama Lengkap <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="" value="<?= $detail_cmhs->nama ?>"></p>

                            Nomor HP <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Nomor HP" name="nomor_hp" required="" value="<?= $detail_cmhs->hp ?>"></p>

                            Email <span class="text-danger">*</span> :
                            <p><input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?= $users->email ?>"></p>

                            Jenis Kelamin <span class="text-danger">*</span> :
                            <p>
                                <select name="jk" class="form-control" required="">
                                    <option selected="" value="<?php echo $detail_cmhs->jk ?>"><?php if($detail_cmhs->jk == 1){ echo "Laki - Laki"; }else{ echo "Perempuan"; } ?></option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </p>

                            Agama <span class="text-danger">*</span> :
                            <p>
                                <select name="agama" class="form-control" required="">
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
                            </p>
                            <?php if(stripos($gelombang->nama_gel, 'magister') || stripos($gelombang->nama_gel, 's2') || stripos($gelombang->nama_gel, 'apoteker')) { ?>
                            Asal Kampus <?php }else{ ?> Asal Sekolah <?php } ?><span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" value="<?= $asal_sekolah->asal_sekolah ?>" required=""></p>
                            Asal Kota<span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Asal Kota" name="asal_kota" value="<?= $detail_cmhs->asal_kota ?>" required=""></p>
                            
                            <?php foreach($list_prodi as $key=>$row){?>
							Program Studi <?= ($key+1)?>
                                <?php if(stripos($gelombang->nama_gel, 'Apoteker')) { ?>
                                    <?php foreach($row as $detail){ ?>
                                        <input type="hidden" name="prodi[]" value="<?= $detail_cmhs->pilihan1 ?>">
                                    <?php } ?>
                                    <p><select class="form-control" disabled>
                                        <?php foreach($row as $detail){ 
                                            $pilihan = "";
                                            if($key == 0){
                                                $pilihan = $detail_cmhs->pilihan1;
                                            }else{
                                                $pilihan = $detail_cmhs->pilihan2;
                                            }
                                            ?>
                                            <option value="<?= $detail->id_program_studi; ?>" <?= ($pilihan == $detail->id_program_studi)?"selected":"" ?>><?=$detail->nama_prodi?></option>
                                        <?php } ?>
                                    </select></p>        
                                <?php }else{ ?>
							        <p><select name='prodi[]' class="form-control">
                                        <?php foreach($row as $detail){ 
                                            $pilihan = "";
                                            if($key == 0){
                                                $pilihan = $detail_cmhs->pilihan1;
                                            }else{
                                                $pilihan = $detail_cmhs->pilihan2;
                                            }
                                            ?>
                                            <option value="<?= $detail->id_program_studi; ?>" <?= ($pilihan == $detail->id_program_studi)?"selected":"" ?>><?=$detail->nama_prodi?></option>
                                        <?php } ?>
                                    </select></p>
                            <?php } 
                                }	?>
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
                                    <embed src="<?php echo base_url()?>assets/file_pmb/<?= $detail_cmhs->file_pendukung ?>" width="100%" height="400" type="application/pdf">	
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3">
                                <input type="submit" value="simpan" class="btn btn-info"> 
                            </p>
                        </div>

                        <div class="col-sm-6">
                            
                                <div class="info_gelombang">
                                    <div class="alert alert-info"><?= nl2br($gelombang->nama_gel_long) ?></div>
                                </div>
                            
                        </div>
                    </div>
                </fieldset>
        </form>
    </div>
</div>
        
<script>
    function validasi(){
		var r = confirm("Jika Anda melakukan validasi, maka data pendaftaran Anda akan dikirim ke sistem. Selanjutnya Anda tidak dapat mengubah data Anda dan akan diberikan nomor pendaftaran. Data yang tidak divalidasi akan diabaikan dari sistem pendaftaran.");
		if (r == true) {
			return window.location.href = "<?php echo base_url()?>formulir/validasi_biodata";
		} else {
			return false;
		}
	}
</script>