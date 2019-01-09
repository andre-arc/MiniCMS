<?php
if(empty($formKategori)){
    $formKategori->id_kategori = '';
    $formKategori->nama_kategori = '';
    $formKategori->type = 'tambah';
}
else{ $formKategori->type = 'update';
        $formKategori->tags =  empty($formKategori->tags) ? '' : implode(',',json_decode($formKategori->tags));
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
                                    <span>Kategori</span>
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
                                            <span class="caption-subject font-blue sbold uppercase">Tambah Kategori</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                       <?php
                                        if($this->session->flashdata('warning')){
                                            echo alert('danger', $this->session->flashdata('warning'));
                                        }
                                        ?>
                                        <!-- BEGIN FORM-->
                                      <?= form_open('administrator/post/kategori/save', 'class="form-horizontal"')?>
                                       <?= form_hidden('id', $formKategori->id_kategori);?>
                                       <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nama Kategori:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <?= form_input('nm_kategori', $formKategori->nama_kategori, 'class="form-control"');?>
                                                </div>
                                        </div>
                                            
                                           <div class="form-actions">
                                               <button type="submit" name="submit" class="btn green col-md-offset-11" value="<?= $formKategori->type?>"><i class="fa fa-check-circle-o"></i> <?= $formKategori->type?></button>
                                           </div>

                                    </div>
                                    <?= form_close();?>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                </div>
           </div>