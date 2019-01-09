<section class="page-wrapper section-gray blog-style-two padding paddv-80">
              <div class="container">
                  <h2>Artikel dengan Tag : <span class="text-danger"><?php echo ucwords('#'.$this->input->get('t'));?></span></h2>
              </div>
              <br>
					<div class="container">
						<div class="row">
							<div class="col-md-9 clearfix">
							     <?php
                                  if(!empty($list_post)){
                                      foreach($list_post as $r){
                                          $url = base_url('post/'.$r->judul_seo);
                                          ?>
								<div class="shadow blog-item">
										<h2 class="item-title"><?php echo $r->judul; ?> </h2>
										<!-- Meta -->
										<div class="meta">
											<div class="row">
												<div class="col-md-6">
													<a href="#" title="" class="writted"><i class="dev-1"></i> By: <?php echo $r->username;?></a>
													<span><a class="comment-number" href="#" title="">| <?php echo $r->dibaca; ?> Reads</a></span>
												</div>
												<div class="col-md-6">
													<a href="#" class="date" title=""><i class="dev-2"></i> <?php echo date('d M Y', strtotime($r->date_created));?></a>
												</div>
											</div>
										</div>
										<!-- /Meta -->
										<!-- Featured Image -->
										<div class="featured-image">
											<a href="#" title="">
												<img src="<?php echo $r->gambar;?>" alt="">
											</a>
										</div>
										<!-- /Featured Image -->
										
										<div class="content">
											<p><?php echo $r->readmore; ?></p>
										</div>
										<div class="tags">
                                            <?php
                                          $tags = json_decode($r->tags);
                                          if(!empty($tags)){
                                              foreach($tags as $t){
                                                  $urlTag = base_url('tags/?t='.$t);
                                                  ?>
                                                  <span><a class="date" href="<?php echo $urlTag?>" title=""><?php echo '#'.$t;?></a></span>
                                                  <?php
                                              }
                                          }
                                            ?>
				                        </div>
										<!-- Comments -->
										<div class="comments clearfix">
											<a class="read" href="<?php echo $url; ?>">Read More</a>
										</div>
										<!-- /Comments -->
								</div>
                                <?php
                              }
                          }
                                
                          ?>
                          <div class="pagination">
                              <?php echo htmlspecialchars_decode($this->pagination->create_links());?>
                          </div>
							</div>
							
							<?= $sidebar?>
						</div>
					</div>
				</section>