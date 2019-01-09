<?php
$tipe = array(
    '0' => '-- Pilih Tipe Menu --',
    'page' => 'Pages',
    'post' => 'Post',
    'kategori' => 'Kategori',
    'link' => 'Link'
    );
?>
<form action="" class="form-horizontal" id="form-menu" method="post">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Add Menu</h4>
</div>
<div class="modal-body">
                                       <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Label :
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control " name="label_menu" />
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Tipe Menu :</label>
                                            <div class="col-md-10">
                                                <?php echo form_dropdown('tipe_menu', $tipe, '', 'class="form-control " onchange="menu_type(this.value);"');?>
                                            </div>
                                        </div>
                                        
                                           <div id="menu-item">
                                               
                                           </div>

                                           

                                    </div>
                                    
  </div>
<div class="modal-footer">
    <button type="button" class="btn yellow btn-outline" data-dismiss="modal">Close</button>
        <button type="button" name="submit" class="btn green pull-right" onclick="submitForm()"><i class="fa fa-plus-circle"></i> Tambah </button>
</div>
</form>
<script>
function menu_type(data){
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('menu/menutype');?>",
                data:{ item:data},
                success: function(response) {
                    $('#menu-item').html(response);
                }
            });
    }
    
function submitForm(){
    var label = $('input[name=label_menu]').val();
    var tipe = $( "select[name=tipe_menu]" ).val();
    if(tipe != 'link'){
        var link = tipe+"/"+$('select[name='+tipe+']').val();
    }
    else{
        var link = $('input[name="'+tipe+'"]').val();
    }
    var html = '<li class="dd-item" data-label="'+label+'" data-tipe="'+tipe+'" data-link="'+link+'"><div class="dd-handle">'+label+' <span class="pull-right dd-nodrag"> | <a class="dark" href="#" onclick="removeList(this)"><i class="fa fa-close "></i></a></span></div></li>';
    $("#menu").append(html);
    $('#Mymodal').modal('hide');
    
    var data = window.JSON.stringify($('.dd').nestable('serialize'));
    $('#nestable_list_1_output').val(data);
}
    
</script>