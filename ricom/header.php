<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	

  <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>> 

<header class="header">
	<div class="shell">
		<a class="header__logo" href="#">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo/Logo Ricom.png" alt="Ricom Logo">			
		</a><!-- /.logo -->		

			<input type="checkbox" class="header__navCheckbox" id="navi-toggle">
			<label for="navi-toggle" class="header__navButton"><span class="header__navIcon header__navIconClicked">&nbsp;</span></label>

			<!--<div class="header__navBackground">&nbsp;</div>-->

			<nav class="header__nav">
				<ul>
					<li><a href="#">Начало</a></li>
					<li class="menu-item-has-children">
						<a href="#">Имоти</a>		
					<ul class="sub-menu">
						<li><a href="#">Назад</a>						
						<li><a href="#">Наеми</a></li>
						<li><a href="#">Продажби</a></li>
					</ul><!-- imotiNav -->
				
					</li><!-- /.menu-item-has-children -->			
					<li><a href="#">Брокери</a></li>
					<li><a href="#">Услуги</a></li>
					<li class="menu-item-has-children">
						<a href="#">Полезно</a>
						<ul class="sub-menu">
							<li><a href="#">Назад</a>						
							<li><a href="#">Блог</a>						
							<li><a href="#">Препоръки</a></li>
							<li><a href="#">Въпроси и отговори</a></li>
							<li><a href="#">Поверителност и защита 
								<br>на личните данни</a></li>
							<li class="menu-item-has-children">
								<a href="#">Кариери</a>
								<ul class="sub-menu">
									<li><a href="#">Назад</a>						
									<li><a href="#">Брокер на недвижими 
										<br>имоти</a>						
									<li><a href="#">Офис Асистент</a></li>									
								</ul><!-- karieriNav -->
							</li>
						</ul>
					</li><!-- poleznoNav -->
					
					<li><a href="#">За Нас</a></li>
					<li><a href="#">Контакти</a></li>				
				</ul><!-- ul osnovna Nav -->
			</nav><!-- /.header__nav -->

	</div><!-- /.shell -->
</header><!-- /.header -->