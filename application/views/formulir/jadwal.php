<style>
                            * {
                              box-sizing: border-box;
                            }

                            body {
                              background-color: #f1f1f1;
                            }

                            #regForm {
                              background-color: #ffffff;
                              margin-left: 10px;
                              font-family: Raleway;
                              padding: 40px;
                              width: 100%;
                              min-width: 300px;
                            }

                            h1 {
                              text-align: center;  
                            }

                            input {
                              padding: 10px;
                              width: 100%;
                              font-size: 17px;
                              font-family: Raleway;
                              border: 1px solid #aaaaaa;
                            }

                            /* Mark input boxes that gets an error on validation: */
                            input.invalid {
                              background-color: #ffdddd;
                            }

                            /* Hide all steps by default: */
                            .tab {
                              display: none;
                            }

                            button {
                              background-color: #4CAF50;
                              color: #ffffff;
                              border: none;
                              padding: 10px 20px;
                              font-size: 17px;
                              font-family: Raleway;
                              cursor: pointer;
                            }

                            button:hover {
                              opacity: 0.8;
                            }

                            #prevBtn {
                              background-color: #bbbbbb;
                            }

                            /* Make circles that indicate the steps of the form: */
                            .step {
                              height: 15px;
                              width: 15px;
                              margin: 0 2px;
                              background-color: #bbbbbb;
                              border: none;  
                              border-radius: 50%;
                              display: inline-block;
                              opacity: 0.5;
                            }

                            .step.active {
                              opacity: 1;
                            }

                            /* Mark the steps that are finished and valid: */
                            .step.finish {
                              background-color: #4CAF50;
                            }
                            </style>

<div class="page-body">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<?php echo $this->session->userdata('status_update'); 
								$this->session->set_userdata('status_update', ''); ?>
					<h4>Syarat dan Ketentuan Ujian PMB</h4>
				</div>
				<div class="card-block">
					<ol start=1>
						<li>Ujian PMB dapat dilakukan setiap pada hari Senin - Jum'at Pukul 08.00 - 14.00 </li>
						<li>Lokasi Ujian dilakukan pada kampus Stifar <a href="https://maps.app.goo.gl/L8GWvsPqgEKnQLPq8" target="_blank" class="btn btn-primary btn-sm">Lihat Lokasi</a></li>
						<li>Harap mengupload pas photo calon mahasiswa baru melalui menu <a href="<?php echo base_url();?>formulir/upload_foto" class="btn btn-primary btn-sm">Upload Foto</a> dan Mencetak berkas pendaftaran melalui halaman <a href="<?php echo base_url();?>formulir/cetak_formulir/<?php echo $nopen ?>" class="btn btn-primary btn-sm">cetak berkas</a> </li>
						<li>Jika terdapat kendala atau pertanyaan dapat menghubungi panitia PMB di nomor (+62 813-9311-1171 / (024) 6706147)</li>
					</ol>
					<!-- <table class="table table-stripped">
						<thead>
							<tr>
								<th>Hari Ujian</th>
								<th>Tanggal Ujian</th>
								<th>Jam Ujian</th>
								<th>Tanggal Pengumuman</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $jadwal->hari_ujian; ?></td>
								<td><?php echo date('d-m-Y',strtotime($jadwal->ujian)); ?></td>
								<td><?php echo $jadwal->jam_ujian; ?></td>
								<td><?php echo date('d-m-Y',strtotime($jadwal->pengumuman)); ?></td>
							</tr>
						</tbody>
					</table> -->
					
					
					<!-- <div class="card">
						<div class="card-header">
							Ujian Online PMB
						</div>
						<div class="card-content">
							<table class="table table-bordered">
								<tr>
									<td>Username</td>
									<td>: <?php echo $user->no_pendaftaran ?></td>
								</tr>
								<tr>
									<td>Password</td>
									<td>: <?php echo date('Ymd',strtotime($pmb_peserta->tanggal_lahir ))?></td>
								</tr>
								<tr>
									<td>Link</td>
									<td>: <a href="#" target="_blank" class="btn btn-primary">Ujian PMB Online</a></td>
								</tr>
								
							</table>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>
