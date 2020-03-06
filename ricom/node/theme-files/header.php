<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
  <link rel="shortcut icon" href="/wp-content/uploads/favicon-panoramni-apartamenti.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<?php wp_head(); ?>

</head>
<body  <?php body_class(); ?>>

  <header class="header <?php if (is_front_page()) {  } else {echo 'fixed';}  ?>">
    <div class="header__logo">
      <a href="/">
        <img src="/wp-content/uploads/2018/12/logo.jpg" alt="Апартаменти Калитин Варна" />
      </a>
    </div><!-- /.header__logo -->

    <nav class="nav">
      <div class="nav__inner">
        <div class="nav__left">
        <ul>
          <li><a href="/">Начало</a></li>
          <li><a href="/#za-nas">За проекта</a></li>
          <li><a href="/apartamenti/">Апартаменти</a></li>
        </ul>
      </div><!-- /.nav__left -->

      <div class="nav__right">
        <ul>
          <li><a href="/#lokacia">Локация</a></li>
          <li><a href="/#kontakti">Контакти</a></li>
          <li><a href="/#kontakti">Запитване</a></li>
        </ul>
      </div><!-- /.nav__right -->
      </div><!-- /.nav__inner -->
    </nav><!-- /.nav --> 

  <div class="burger">
    <span></span>
    <span></span>
    <span></span>
  </div><!-- /.burger  -->
  </header>
