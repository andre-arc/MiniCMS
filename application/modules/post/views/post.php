

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
                        <h1 class="page-title"> SELAMAT DATANG ADMIN !

                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->



<div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="fa fa-newspaper-o font-dark"></i>
                                            <span class="caption-subject bold uppercase"> List Post</span>
                                        </div>

                                    </div>
                                    <div class="portlet-body">
                                        <?php
                                       if($this->session->flashdata('success')){   
                                        echo alert('success', $this->session->flashdata('success'));   

                                    }

                                       ?>
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <a class="btn btn-info" href='<?php echo base_url('administrator/post/add');?>'><i class="icon-plus"></i> Tambah Data</a>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button class="btn btn-info" onclick="$('.form').submit()"><i class="icon-trash"></i> Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form" action="<?php echo base_url('administrator/post/delete');?>" method="post" name="form">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Author</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal</th>
                                                    <th>View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                                foreach($listpost as $r){
                                                    $url = base_url('administrator/post/edit/').$r->id_berita;
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><input type="checkbox" name="checkbox[]" class="checkboxes" value="<?= $r->id_berita ?>" /></td>
                                                    <td><?= $r->id_berita ?></td>
                                                    <td><?= $r->username ?></td>
                                                    <td><a href="<?= $url ?>"><?= $r->judul ?></a></td>
                                                    <td><?= date('d-m-Y', strtotime($r->date_created)) ?></td>
                                                    <td><?= $r->dibaca ?></td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
