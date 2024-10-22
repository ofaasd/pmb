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
					<h4>PENGUMUMAN CALON MAHASISWA BARU</h4>
				</div>
				<div class="card-block">
					<?php
						if($pengumuman == 1){
					?>
					<p>Selamat Anda dinyatakan <b>LOLOS</b> pendaftaran mahasiswa baru STIFAR</p>
					<?php
						}else{
					?>
					<p>Maaf anda Tidak LOLOS pendaftaran mahasiswa baru STIFAR</p>
					<?php } ?>
          <p>Harap hubungi admin PMB untuk mendapatkan langkah-langkah beriutnya</p>
				</div>
			</div>
		</div>
	</div>
</div>
