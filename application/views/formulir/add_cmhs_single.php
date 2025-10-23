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
        <form action="<?php echo base_url()?>formulir/cmhs_tambah_aksi_single" method="post" enctype="multipart/form-data">
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

                            Nama Lengkap <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required="" value="<?= $users->nama ?>"></p>

                            Nomor HP <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Nomor HP" name="nomor_hp" required="" value="<?= $users->no_wa ?>"></p>

                            Email <span class="text-danger">*</span> :
                            <p><input type="email" class="form-control" placeholder="Email" name="email" required="" value="<?= $users->email ?>"></p>

                            Jenis Kelamin <span class="text-danger">*</span> :
                            <p>
                                <select name="jk" class="form-control" required="">
                                    <option selected="" value="">Jenis Kelamin</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </p>

                            Agama <span class="text-danger">*</span> :
                            <p>
                                <select name="agama" class="form-control" required="">
                                    <option value="" selected="" disabled="">Pilih Agama</option>
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
                            Asal Kampus <?php }else{ ?> Asal Sekolah <?php } ?> <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" name="asal_sekolah" required=""></p>

                            Asal Kota <span class="text-danger">*</span> :
                            <p><input type="text" class="form-control" placeholder="Asal Kota" name="asal_kota" required=""></p>
                            <div id="jurusan">
											
                            </div>
                            Upload File Syarat Pendaftaran :
                            <p><input type='file' name="foto" required />
                            Maksimal 5 MB dengan format pdf.</p> 
                            
                            <input type="submit" value="simpan" class="btn btn-primary"> 
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
    $(document).ready(function(){
        get_jurusan()
    })
    function get_jurusan()
    {
        const gelombang = $("#gelombang").val();
        $.ajax({
            url : "<?php echo base_url();?>formulir/get_jurusan/",
            method: "POST",
            data:{id:gelombang},
            async: false,
            dataType: "json",
            success: function(data){
                //alert(data);
                //alert(data);
                temp = "";

                data.forEach((item, index) => {
                    temp += `Program Studi ${index + 1}
                    <p><select name='prodi[]' class="form-control" <?php if(stripos($gelombang->nama_gel, 'magister') || stripos($gelombang->nama_gel, 's2') || stripos($gelombang->nama_gel, 'apoteker')) { ?>
                            readonly <?php }?> >`
                    item.forEach((item2, index2) => {
                        temp += `<option value='${item2.id_program_studi}'>${item2.nama_prodi} ${item2.keterangan ?? ''}</option>`
                    });
                    temp += `</select></p>`
                });	

                $("#jurusan").html(temp);
            }
        });
    }
</script>