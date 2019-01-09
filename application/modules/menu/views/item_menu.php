<div class="form-group">
        <label class="col-md-2 control-label"><?php echo ucwords($label);?> :</label>
        <div class="col-md-10">
            <?php
            if($label != 'link'){
                echo form_dropdown($label, $list_item,'', 'class="form-control"');
            }
            else{
                echo form_input($label, '', 'class="form-control"');
            }
            ?>
        </div>
    </div>