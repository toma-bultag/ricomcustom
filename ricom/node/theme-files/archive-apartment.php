<?php get_header(); ?>

<section class="ap-list">
  <div class="ap-list__header">
    <h1>Апартаменти

    <span>КАЛИТИН</span></h1>
  </div><!-- /.ap-list__header -->

  <div class="ap-list__head">
    <ul>
      <li>Номер <strong>№</strong></li>
      <li>Вход <strong>Вх.</strong></li>
      <li>Етаж <strong>Ет.</strong></li>
      <li>Вид <strong>Вид</strong></li>
      <li class="full_size">Площ <strong>m<sup>2</sup></strong></li>
      <li class="hide-on-mobile">Изглед <strong>^</strong></li>
      <li>Статус <strong>Ст.</strong></li>
    </ul>
  </div><!-- /.ap-list__head -->
    
  <div class="ap_list__main">
    <?php 
        $apList = new WP_Query(array(
          'posts_per_page' => -1, 
          'post_type' => 'apartment',
          'meta_key' => 'ap_name',
          'orderby' => 'meta_value',
          'order' => 'ASC',
          'meta_query'     => array(                
                    array(
                        'key'     => 'ap_type_name',
                        'value'   => array('Апартамент', 'Магазин', 'Бар'),    
                    ),                                      
          )
        ));

        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( 1 /* get_field('ap_status') == "свободен" */ /*AND get_field('ap_floor') == 2 */ ):
            get_template_part('template-parts/content', 'apartment');
           ?>    
      <?php endif; ?> 
    <?php
      }
     ?>
  </div><!-- /.ap_list__main -->
</section><!-- /.ap-list -->
    
   

<?php get_footer(); ?>