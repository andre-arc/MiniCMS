<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/'.$this->tpl.'/favicon');?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/'.$this->tpl.'/favicon');?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/'.$this->tpl.'/favicon');?>/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php echo base_url('assets/'.$this->tpl.'/favicon');?>/manifest.json">
    <link rel="mask-icon" href="<?php echo base_url('assets/'.$this->tpl.'/favicon');?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">




	<title><?= $title ?></title>

	<?= $css ?>

</head>

<body class="paged">
<!-- Site Container -->
	<div class="site-container">
			<!-- header -->
			<header class="header">
				<div class="container default">
					<div class="navbar">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand clearfix" href="#"><img alt="" style="height:35px;margin-top:4%;" src="<?php echo base_url('assets/'.$this->tpl);?>/img/logo.png"></a>
						</div> <!-- /navbar-header -->
						<div class="navbar-collapse collapse navbar-right">
						<?= $menu ?>
						</div>
					</div>
				</div><!-- /Container -->
			</header>
			<!-- /header -->

			<!-- Wrapper -->
			<div class="wrapper clearfix">