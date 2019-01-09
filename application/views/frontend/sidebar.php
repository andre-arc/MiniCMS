<div class="col-md-3">
								<div class="sidebar">

									<!-- Search Widget -->
									<div class="shadow widget widget_search">
										<form class="search-area" method="get" id="searchform" action="<?php echo base_url("cari");?>">
											  <input type="text" class="form-control" name="s" id="s" value="" placeholder="Search...">
										</form>
									</div>
									<!-- /Search Widget -->
									
									<!-- Popullar Widget -->
									<div class="shadow widget widget_popullar">
										<ul class="tab-title">
											<li><a class="tab-popullar active" href="#">Populer</a></li>
											<li><a class="tab-recent" href="#">Recent</a></li>
											<li><a class="tab-comments" href="#">Comments</a></li>
										</ul>

										<div class="content">

											<!-- Popullar items -->
											<ul id="tab-popullar" class="tab-contents active">
												<?php
                                          if(!empty($popular_post)){
                                              foreach($popular_post as $r){
                                                  $url = base_url('post/'.$r->judul_seo);
                                                  ?>
												<li>
													<a href="<?php echo $url;?>" class="clearfix">
														<img src="<?php echo $r->gambar;?>" alt="">
														<h2>
															<?php echo $r->judul;?>
															<span><?php echo date('d M Y', strtotime($r->date_created));?></span>
														</h2>
													</a>
												</li>
												<?php
                                              }
                                          }
                                                ?>
											</ul>
											<!-- /Popullar items -->

											<!-- Recent Items -->
											<ul id="tab-recent" class="tab-contents">
											<?php
                                          if(!empty($recent_post)){
                                              foreach($recent_post as $r){
                                                  $url = base_url('post/'.$r->judul_seo);
                                                  ?>
												<li>
													<a href="<?php echo $url;?>" class="clearfix">
														<img src="<?php echo $r->gambar;?>" alt="">
														<h2>
															<?php echo $r->judul;?>
															<span><?php echo date('d M Y', strtotime($r->date_created));?></span>
														</h2>
													</a>
												</li>
												<?php
                                              }
                                          }
                                                ?>
											</ul>
											<!-- /Recent Items -->

											<!-- Comments Items -->
											<ul id="tab-comments" class="tab-contents">
												<li>
													<a href="#" class="clearfix">
														<img src="http://placehold.it/50x50" alt="">
														<h2>
															Lorem ipsum dolor sit amet, cect etuer adipiscing elit
															<span>Sept 25, 2013 at 18:10</span>
														</h2>
													</a>
												</li>
												<li>
													<a href="#" class="clearfix">
														<img src="http://placehold.it/50x50" alt="">
														<h2>
															Lorem ipsum dolor sit amet, cect etuer adipiscing elit
															<span>Sept 25, 2013 at 18:10</span>
														</h2>
													</a>
												</li>
												<li>
													<a href="#" class="clearfix">
														<img src="http://placehold.it/50x50" alt="">
														<h2>
															Lorem ipsum dolor sit amet, cect etuer adipiscing elit
															<span>Sept 25, 2013 at 18:10</span>
														</h2>
													</a>
												</li>
											</ul>
											<!-- /Comments Items -->

										</div> 
									</div>
									<!-- Popullar Widget -->

									<!-- Category Widget -->
									<div class="shadow widget widget_category">
										<h2 class="widget-title">Categories</h2>
										<ul>
										 <?php
                                  if(!empty($list_category)){
                                      foreach($list_category as $r){
                                          $url = base_url('kategori/'.$r->nama_kategori);
                                          ?>
                                          <li><a href="<?php echo $url;?>"><?php echo $r->nama_kategori;?></a></li>
                                          <?php
                                      }
                                  }
                                            ?>
										</ul>
									</div>
									<!-- /Category Widget -->
								</div>
							</div>