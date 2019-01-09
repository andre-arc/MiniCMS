			
		<?php
    $data_menu = json_decode($list_menu);
    $config['menu_tag_open'] = "<li>";
    $config['menu_tag_close'] = "</li>";
    $config['submenu_tag_open'] = "<ul class='drop-down'>";
    $config['submenu_tag_close'] = "</ul>";
    $menu = genFrontMenu($data_menu, $config);
?>  
<nav id="navigation" class="navbar-nav">
        <ul class="nav">
        <?php echo $menu;?>
    </ul>
</nav>