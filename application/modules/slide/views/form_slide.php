<?php
if(empty($formSlide)){
  $formSlide->id = '';
    $formSlide->judul = '';
    $formSlide->caption = '';
    $formSlide->gambar = '';
    $formSlide->link = '';
    $formSlide->urutan = '';
    $formSlide->type = 'tambah';
}
else{
    $formSlide->type = 'update';   
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
                                            <i class="fa fa-paint-brush font-blue"></i>
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
                                      <?= form_open('administrator/slide/save', 'class="form-horizontal"')?>
                                       <?= form_hidden('id', $formSlide->id);?>
                                       <div class="form-body">
                                       <div class="form-group">
                                                    <label class="control-label col-md-2">Judul
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <?= form_input('judul', $formSlide->judul, 'class="form-control"')?>
                                                     </div>
                                                        
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Link
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                       <?= form_input('link', $formSlide->link, 'class="form-control"')?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Gambar
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <?= form_input('gambar', $formSlide->gambar, 'id="gambar" class="form-control"')?>
                                                    </div>
                                                    <a class="iframe-btn btn blue" href="<?= base_url()?>filemanager/dialog.php?type=1&field_id=gambar" class="btn blue iframe-btn">browse</a>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-2">Order
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <?= form_input('order', $formSlide->urutan, 'class="form-control"')?>
                                                        </div>
                                                </div>

                                            <div class="form-group last">
                                                    <label class="control-label col-md-2">Caption
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <?= form_textarea('caption', $formSlide->caption, 'class="ckeditor" rows="7"');?>
                                                    </div>
                                                </div>
                                            
                                           <div class="form-actions">
                                               <button type="submit" name="submit" class="btn green col-md-offset-11" value="<?= $formSlide->type;?>"><i class="fa fa-check-circle-o"></i> <?= $formSlide->type ?></button>
                                           </div>

                                    </div>
                                    <?= form_close();?>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                </div>
           </div>