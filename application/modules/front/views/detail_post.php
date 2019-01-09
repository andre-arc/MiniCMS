 
  <section class="page-wrapper section-gray blog-style-two single-page-wrapper padding paddv-80">
					<div class="container">
						<div class="row">
							<div class="col-md-9 clearfix">
								
								<div class="blog-item">
										<h2 class="item-title"><?php echo $post_data->judul; ?> </h2>
										<!-- Meta -->
										<div class="meta">
											<div class="row">
												<div class="col-md-6">
													<a href="#" title="" class="writted"><i class="dev-1"></i> By: <?php echo $post_data->username;?></a> 
													<span><a class="comment-number" href="#" title="">| <?php echo $post_data->dibaca; ?> Reads</a></span>
												</div>
												<div class="col-md-6">
													<a href="#" class="date" title=""><i class="dev-2"></i> <?php echo date('d M Y', strtotime($post_data->date_created));?></a>
												</div>
											</div>
										</div>
										<!-- /Meta -->
										<!-- Featured Image -->
										<div class="featured-image">
											<a href="#" title="">
												<img src="<?php echo $post_data->gambar;?>" alt="">
											</a>
											
										</div>
										<!-- /Featured Image -->
										
										
										<div class="content">
											<p><?php echo $post_data->isi_berita;?></p>
										</div>
										<!-- Comments -->
										<div class="comments">
										</div>
										<!-- /Comments -->
								</div>

								<div class="single-meta clearfix">
									<div class="metainfo">
										<div class="row">
											<div class="col-md-5">
												<ul>
													<?php
                                                      $tags = json_decode($post_data->tags);
                                                      if(!empty($tags)){
                                                          foreach($tags as $t){
                                                              $urlTag = base_url('tags/?t='.$t);
                                                              ?>
                                                              <li><a href="<?php echo $urlTag?>"><?php echo '#'.$t;?></a></li>
                                                              <?php
                                                          }
                                                      }
                                                        ?>
												</ul>
											</div>
											<div class="col-md-7">
												<span class="share-span">Share this post</span>
												<ul class="share-list">
													<li>
														<div class="fb-share-button" data-href="index.html" data-layout="button_count"></div>
													</li>
													<li>
														<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
														<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
													</li>
													<li>
														<!-- Place this tag in your head or just before your close body tag. -->
														<script src="https://apis.google.com/js/platform.js" async defer></script>

														<!-- Place this tag where you want the share button to render. -->
														<div class="g-plus" data-action="share" data-annotation="bubble"></div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<!-- Comments -->
                                   <br>
                                    <div id="disqus_thread"></div>
                                    <script>
                                        
                                    var disqus_config = function () {
                                    this.page.url = "<?php echo current_url();?>";  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = "<?php echo $post_data->judul_seo;?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                    };
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://dreanlab.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                    })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    
                                    
								<!-- /Comments -->

								<!-- Related Posts -->
<!--
								<div class="related-posts">
									<h2>Related Posts</h2>
									<div class="row">
										<div class="col-md-4">
											<div class="item-post">
												<a class="fimage" href="#" title="">
													<img src="http://placehold.it/262x262" alt="">
												</a>
												<h2 class="title"><a href="#">Black Voyages</a></h2>
												<span class="date">Sept 05, 2014 at 05:00 PM</span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="item-post">
												<a class="fimage" href="#" title="">
													<img src="http://placehold.it/262x262" alt="">
												</a>
												<h2 class="title"><a href="#">The Silent Dreaming</a></h2>
												<span class="date">Sept 05, 2014 at 05:00 PM</span>
											</div>
										</div>
										<div class="col-md-4">
											<div class="item-post">
												<a class="fimage" href="#" title="">
													<img src="http://placehold.it/262x262" alt="">
												</a>
												<h2 class="title"><a href="#">Snow of Flames</a></h2>
												<span class="date">Sept 05, 2014 at 05:00 PM</span>
											</div>
										</div>
									</div>
								</div>
-->
								<!-- /Related Posts -->

							</div>
							
							<?= $sidebar?>
						</div>
					</div>
				</section> 