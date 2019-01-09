<section class="page-wrapper section-gray blog-style-one single-page-wrapper padding paddv-80">
              <div class="container">
                  <h2>Pencarian : <span class="text-danger"><?php echo ucwords($this->input->get('s'));?></span></h2>
              </div>
              <br>
					<div class="container">
						<div class="row">
							<div class="col-md-9 clearfix">
							     <gcse:searchresults-only queryParameterName="s" imageSearchLayout="classic"></gcse:searchresults-only>
							</div>
							
							<?= $sidebar?>
						</div>
					</div>
				</section>