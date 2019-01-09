<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" method="post">
                    <div class="form-body">
                        <div class="form-group">
                           <label for="" class="control-label"></label>
                                <input name="judul" placeholder="Judul" class="form-control span11" type="text">
                                <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                                <textarea class="ckeditor" name="editor1" ></textarea>
                                <span class="help-block"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="savePost()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
