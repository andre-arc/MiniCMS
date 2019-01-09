<?php
if(empty($formMenu)){
     $formMenu->id = '';
    $formMenu->nama_menu = '';
    $formMenu->data_menu = '';
    $formMenu->type = 'simpan';
    $listmenu ="";
}
else{  $formMenu->type = 'update'; 
      $listmenu = generateMenu(json_decode($formMenu->data_menu));
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
                                    <span>Menu</span>
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
                                            <span class="caption-subject font-blue sbold uppercase">Tambah Menu</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                       <?php
                                        if($this->session->flashdata('warning')){
                                            echo alert('danger', $this->session->flashdata('warning'));
                                        }
                                        ?>
                                        <!-- BEGIN FORM-->
                                       <?= form_open('administrator/menu/save', 'class="form-horizontal"')?>
                                       <?= form_hidden('id', $formMenu->id)?>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nama Menu:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <?= form_input('nm_menu', $formMenu->nama_menu, 'class="form-control"')?>
                                                </div>
                                        </div>
                                       <div class="row">
                                           <div class="col-md-10 col-md-offset-2">
                                                   <div class="portlet box blue">
                                                  <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-grid"></i>Detail Menu </div>
                                            <div class="actions">
                                               <a class="btn default btn-sm" data-toggle="modal" data-target="#Mymodal" href="<?= base_url("menu/modal_menu") ?>"><i class="icon-pencil icon-white"></i> Tambah Menu</a>
                                            </div>
                                        </div>
                                                   <div class="portlet-body" style="min-height:300px">
                                                        <div class="dd" id="nestable_list_1">
                                                            <ol class="dd-list" id="menu">
                                                                <?= $listmenu?>
                                                            </ol>
                                                        </div>
                                                   </div>
                                               </div>
                                               <input type="hidden" name="data_menu" id="nestable_list_1_output">
                                           </div>
                                       </div>
                                            
                                           <div class="form-actions">
                                               <button type="submit" name="submit" class="btn green col-md-offset-11" value="<?= $formMenu->type?>"><i class="fa fa-check-circle-o"></i> <?= $formMenu->type?></button>
                                           </div>

                                    </div>
                                    <?= form_close()?>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                </div>
           </div>