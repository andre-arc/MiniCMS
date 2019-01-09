<?php
if(empty($formPost)){
    $formPost->id_berita = '';
    $formPost->id_kategori = '';
    $formPost->judul = '';
    $formPost->readmore = '';
    $formPost->tags = '';
    $formPost->isi_berita = '';
    $formPost->type = 'tambah';
}
else{ $formPost->type = 'update';
        $formPost->tags =  empty($formPost->tags) ? '' : implode(',',json_decode($formPost->tags));
    }

?>
   <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Post</span>
                                </li>
                            </ul>

                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> SELAMAT DATANG ADMIN !</h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                   <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-newspaper-o font-blue"></i>
                                            <span class="caption-subject font-blue sbold uppercase">Tambah Post</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                       <?php
                                        if($this->session->flashdata('warning')){
                                            echo alert('danger', $this->session->flashdata('warning'));
                                        }
                                        ?>
                                        <!-- BEGIN FORM-->
                                      <?= form_open_multipart('administrator/post/save', 'class="form-horizontal"')?>
                                       <?= form_hidden('id', $formPost->id_berita);?>
                                       <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Judul:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <?= form_input('judul', $formPost->judul, 'class="form-control"');?>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Kategori:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <?php echo form_dropdown('kategori', $listkategori,  $formPost->id_kategori, "class='form-control'");?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Isi:</label>
                                            <div class="col-md-10">
                                                <?= form_textarea('editor1', $formPost->isi_berita, 'class="ckeditor" rows="12"');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Text Readmore:</label>
                                            <div class="col-md-10">
                                                <?= form_textarea('readmore', $formPost->readmore, 'class="form-control" rows="8"');?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">tags:</label>
                                            <div class="col-md-8">
                                                <?= form_input('tags', $formPost->tags, 'class="form-control"');?>
                                                <span class="required">* </span><i>Pisahkan tag dengan koma</i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label class="control-label col-md-2">Featured Image
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input  name="gambar" id="gambar" value='<?php echo $formPost->gambar;?>' type="text" class="form-control" />
                                                    </div>
                                                   <a href="<?= base_url()?>filemanager/dialog.php?type=1&field_id=gambar" class="btn blue iframe-btn" type="button">Browse</a>
                                                    <br><br>
                                                        <img class="col-md-3 img-rounded col-md-offset-3" id="img_preview" src="<?php echo $formPost->gambar;?>" alt="">
                                                </div>
                                            
                                           <div class="form-actions">
                                               <button type="submit" name="submit" class="btn green col-md-offset-11" value="<?php echo $formPost->type;?>"><i class="fa fa-check-circle-o"></i> <?php echo $formPost->type;?></button>
                                           </div>

                                    </div>
                                    <?= form_close();?>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                </div>
           </div>