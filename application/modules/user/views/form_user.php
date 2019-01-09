<?php
if(empty($formUser)){
    $formUser->id_user = '';
    $formUser->nama_lengkap = '';
    $formUser->email = '';
    $formUser->username = '';
    $formUser->no_telp = '';
    $formUser->level = '0';
    $formUser->type = 'tambah';
    $status = 'required';

}
else{
    $formUser->type = 'update';
    $status = '';
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
                                    <span>User</span>
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
                                            <i class="fa fa-user font-blue"></i>
                                            <span class="caption-subject font-blue sbold uppercase">Tambah User</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                       <?php
                                        if($this->session->flashdata('warning')){
                                            echo alert('danger', $this->session->flashdata('warning'));
                                        }
                                        ?>
                                        <!-- BEGIN FORM-->
                                      <?= form_open('administrator/user/save', 'class="form-horizontal"')?>
                                       <?= form_hidden('id', $formUser->username);?>
                                       <div class="form-body">
                                       
                                       <div class="form-group">
                                            <label class="col-md-2 control-label">Username:</label>
                                            <div class="col-md-7">
                                                <?= form_input('username', $formUser->username, 'class="form-control" required')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Nama Lengkap:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                <?= form_input('nama', $formUser->nama_lengkap, 'class="form-control" ')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Email:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-7">
                                                 <?= form_input('email', $formUser->email, 'class="form-control" ')?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Level</label>
                                            <div class="col-md-7">
                                                <?php echo form_dropdown('level', $level, $formUser->level, "class='table-group-action-input form-control input-medium' required");?>
                                            </div>
                                        </div>

                                        <?php
                                            foreach($formPass as $name => $data){
                                        ?>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label"><?php echo $data[0];?>:</label>
                                            <div class="col-md-7">
                                               <?= form_password($name, $data[1], 'class="form-control pass"'.$status)?>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>

                                            <div class="form-group">
                                               <div class="col-md-offset-2">
                                                <input type="checkbox" class="form-checkbox showPassword" > Show password
                                                </div>
                                            </div>
                                            
                                           <div class="form-actions">
                                               <button type="submit" name="submit" class="btn green col-md-offset-11" value="<?= $formUser->type?>"><i class="fa fa-check-circle-o"></i> <?= $formUser->type?></button>
                                           </div>

                                    </div>
                                    <?= form_close();?>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                </div>
           </div>