<style>
	.alert-info{
		border:1px solid #2980b9;
		background:#3498db;
		color:#fff;
		font-size:12pt;
	}
</style>
	<form action="<?php echo base_url()?>formulir/update_jalur" method="post" enctype="multipart/form-data">		
		<input type="hidden" name="id" value="<?php echo $detail_cmhs2->id ?>">
		<h4>Jalur Pendaftaran</h4>
		<hr />
		<div class="row">
			<div class="col-md-12">
				Tahun Ajaran :
				<p>	
					<?php 
					$curr_ta = "";
					$gel_ta = $this->db->get('pmb_ta')->result();
					foreach($gel_ta as $gel_ta){
						if($gel_ta->is_active == 1){
							$curr_ta = $gel_ta->awal;
						}
					} ?>
					<input type="text" class="form-control" name="gel_ta" value="<?php echo $curr_ta?>" readonly>
				</p>

				PILIH JALUR<span class="text-danger">*</span> :
				<p>
					<select id="jalur" name="jalur" class="form-control"  required="">
						<?php if(!empty($curr_jalur) ){
							echo '<option value="' . $curr_jalur->id . '">'. $curr_jalur->nama .'</option>';
						}else{
							echo '<option value="0">Pilih Jalur Pendaftaran</option>';
						}?>
						
						<?php foreach($jalur as $row){
							echo "<option value='" . $row->id . "'>" . $row->nama . "</option>";
						}?>
					</select>
				</p>
				
				<div id="gel_text">PILIH GELOMBANG<span class="text-danger">*</span> :
					<p><select name="gelombang" id="gelombang" class="form-control" required="">
						<?php if(!empty($curr_jalur) ){
							echo '<option value="' . $curr_gelombang->id . '">'. $curr_gelombang->nama_gel .'</option>';
						}else{
							echo '<option value="0">Gelombang Pendaftaran</option>';
						}?>
					</select></p>
				</div>
				<div class="info_gelombang">
					<?php
						if(!empty($curr_gelombang)){
							echo '<div class="alert alert-info">' . nl2br($curr_gelombang->nama_gel_long) . '</div>';
						}
					?>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<input type="submit" value="simpan" class="btn btn-primary" style="width:100%">
					</div>
				</div>
			</div>
		</div>
</form>
<script>
	$(document).ready(function(){
		$('#jalur').change(function(){
			const jalur = $(this).val();
			if(jalur == 1 || jalur == 2){
				$("#nilai_mapel").show();
			}else{
				$("#nilai_mapel").hide();
			}

			if(jalur == 5 || jalur == 6){
				$("#area_pasca").show();
			}else{
				$("#area_pasca").hide();
			}
			$.ajax({
				url : "<?php echo base_url();?>formulir/get_gelombang/",
				method: "POST",
				data:{id:jalur},
				async: false,
				dataType: "json",
				success: function(data){
					$("#gelombang").html("<option value=''>Plih Gelombang</option>");
					let i;
					for (i = 0; i < data.length; i++) {
						$("#gelombang").append('<option value="'+ data[i].id +'">'+data[i].nama_gel+'</option>');
						i++;
					}
					get_jurusan();	
				}
			});
		});
		$('#gelombang').change(function(){
			//alert("test");
			const gelombang = $(this).val();
			$.ajax({
				url : "<?php echo base_url();?>formulir/get_info_gelombang/",
				method: "POST",
				data:{id:gelombang},
				async: false,
				dataType: "json",
				success: function(data){
					$(".info_gelombang").html(`<div class="alert alert-info">${data}</div>`);
					
				}
			});
		});
	});
</script>

