<?php get_header(); ?>

<?php
 $ap_name = get_field('ap_name');
 $ap_floor = get_field('ap_floor');
 $ap_coords = get_field('ap_coords');

  ?>

<?php include locate_template('template-parts/acropolbuild/apartment_top.php', false, false); ?>



<section class="ap">
  <h1 class="ap__title">
   <?php the_field('ap_type_name') ?> № <?php the_field('ap_entrance') ?><?php the_field('ap_number') ?> <br />
    <span><?php if (get_field('ap_entrance')) { ?>Вход <?php the_field('ap_entrance') ?> ,<?php } ?> Етаж <?php the_field('ap_floor') ?></span>
  </h1><!-- /.ap__title -->

  <ul class="ap__details">
    <li class="ap__fl">ет.<?php the_field('ap_floor') ?></li>
    <?php if (get_field('ap_full_size')) { ?>
    <li><?php the_field('ap_full_size') ?> m2 <span>Обща Площ</span></li>
    <?php } ?>
    <li><?php the_field('ap_size') ?> m2 <span>Чиста Площ</span></li>
    <li class="ap__status"><?php the_field('ap_status') ?> <span>Статус</span></li>
    <?php if (get_field('ap_direction')) { ?>
    <li class="ap__direction"><?php the_field('ap_direction') ?> <span>Изглед</span></li>
    <?php } ?>
    <!-- <li class="ap__print">Версия за печат <i class="fas fa-print"></i></li> -->
    <li class="ap__back"><a href="/etaji/етаж-<?php the_field('ap_floor') ?>/"><i class="fas fa-undo"></i></a></li>
  </ul><!-- /.ap__details -->

  <div class="ap__blueprint">
  <?php if (get_field('ap_type_name') == 'Апартамент' OR get_field('ap_type_name') == 'Магазин' OR get_field('ap_type_name') == 'Бар' ) { ?>
    <div class="ap__blueprint--left">
      <a href="/wp-content/uploads/2018/12/ap_<?php the_field('ap_name') ?>-1.png"  data-lightbox="apartament">

     
      <img src="<?php if (get_field('ap_image')) { echo get_field('ap_image'); } else { ?>/wp-content/uploads/2018/12/ap_<?php the_field('ap_name') ?>-1.png <?php } ?>" alt="" border="0" usemap="#viz02Map" id="viz02" style="cursor:pointer" />
    
    <map name="viz02Map">
        <area target="_blank" alt="" title="" href="#" coords="0,0,4547,4059" shape="rect" name="ap" >
    </map>
      </a>
    </div><!-- /.ap__blueprint--left -->
   <?php } ?>

    <div class="ap__blueprint--right">
      <a href="/wp-content/uploads/2018/12/et-<?php the_field('ap_floor'); ?>-1.png" data-lightbox="apartament">                   
      
     <img src="/wp-content/uploads/2018/12/et-<?php the_field('ap_floor'); ?>-1.png" alt="" border="0" usemap="#viz01Map" id="viz01" style="cursor:pointer" />
    
    <map name="viz01Map">
        <area target="_blank" alt="" title="" href="/apartamenti/apartment-g10/" coords="<?php the_field('ap_coords') ?>" shape="poly" name="<?php the_field('ap_name') ?>" >,

        <?php 
  
        $apList = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'apartment'
        ));
        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( $ap_floor == get_field('ap_floor') ):
           { ?>
            <area target="_blank" alt="" title="" href="<?php the_permalink(); ?>" coords="<?php the_field('ap_coords'); ?>" shape="poly" name="<?php the_field('ap_name'); ?>" >
           <?php 
            }
            // get_template_part('template-parts/content', 'floor_menu'); 
             
          endif; } ?>
    </map>
      
      </a>
    </div><!-- /.ap__blueprint--right -->
  </div><!-- /.ap__blueprint -->
</section><!-- /.ap --> 

<script>
  jQuery(document).ready(function () {

    var $k = jQuery.noConflict();

    $k('#viz01, #viz02').mapster({
        mapKey: 'name',
        clickNavigate: true,
        singleSelect: true,
        fillOpacity: 0.8,
        showToolTip: true,
        fillColor: '84AB35',
      onConfigured: function() {
      //var offset = jQuery('#map1, #map2, #map2, #map3, #map4, #map5').offset().top;
      jQuery('#mapster_wrap_0, #mapster_wrap_1').next().off('mousemove').on('mousemove', function( e ) {
        var $tooltip = jQuery('.mapster_tooltip');
        if ( $tooltip.length ) {
          $tooltip.css({
            'top': e.pageY - $tooltip.width()/3,
            'left': e.clientX - $tooltip.width()/.8
          });
        }
      });
    },
    areas: [ 
            <?php 
  
        $apList = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'apartment'
        ));
        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( $ap_floor == get_field('ap_floor') ):
           { ?>
              {
            key: '<?php the_field('ap_name'); ?>',
            selected: <?php if ( get_field('ap_name') == $ap_name ) { echo 'true';} else { echo 'false'; } ?>,
            toolTip: '<div class="allpopup <?php if (get_field('ap_status') != 'свободен') { echo 'busy';} ?>"><p class="toppart"><?php if ('ap_type_name' == 'Апартамент') { ?> Ап. <?php } ?> <?php the_field('ap_entrance') ?><?php the_field('ap_number') ?> - <span style="text-transform: capitalize;"><?php the_field('ap_status') ?></span></p><p class="bottompart">  <?php the_field('ap_type') ?>, вход <?php the_field('ap_entrance'); ?>, ет.<?php the_field('ap_floor') ?></p><p class="bottompart-number"><?php the_field('ap_full_size') ?> m<sup>2</p></div>',
            fillOpacity: 0.3,
            fillColor: '000000',
          }, 
           <?php 
            }            
          endif; } ?>
          /* {
            key: '<?php the_field('ap_name') ?>',
            selected: true,
            toolTip: '<div class="allpopup"><p class="toppart">Апартамент <?php the_field('ap_entrance') ?><?php the_field('ap_number') ?></p><p class="bottompart"></p><p class="bottompart-number"><?php the_field('ap_full_size') ?> m<sup>2</sup></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, */
          {
            key: 'ap',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">Апартамент <?php the_field('ap_entrance') ?><?php the_field('ap_number') ?></p><p class="bottompart"><?php the_field('ap_type') ?>, вход <?php the_field('ap_entrance'); ?>, ет.<?php the_field('ap_floor') ?></p><p class="bottompart-number"><?php the_field('ap_full_size') ?> m<sup>2</p></div>',
            fillOpacity: 0,
            fillColor: '666666',
          }, 
    ]
    });
});
</script>

<?php get_footer(); ?>