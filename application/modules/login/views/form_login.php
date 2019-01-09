<?= form_open("login/proses", "class='login-form'")?>
<h3 class="form-title font-green">Sign In</h3>

<div class="alert alert-danger display-hide">
    <button class="close" data-close="alert"></button>
    <span> Enter any username and password. </span>
</div>

<div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
    <label class="control-label visible-ie8 visible-ie9">Username</label>
    <?= form_input('username', '', 'class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Username"')?>
     </div>
    
<div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Password</label>
    <?= form_password('password', '', 'class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="Password"')?> 
    </div>
    
<div class="form-actions text-center">
    <button type="submit" class="btn green uppercase">Login</button>
</div>
<?= form_close()?>