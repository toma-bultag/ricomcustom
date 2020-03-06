<?php get_header(); ?>
<?php $current_floor_num = get_field('fl_number'); ?>
<?php
              $allaps = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                )                 
                ));  

                $floor1 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'       => 'ap_floor',
                        'value'   => array('1'),    
                    )
                )                 
                ));  

                $floor2 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('2'),    
                    )
                )                 
                )); 

                $floor3 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('3'),    
                    )
                )                 
                )); 

                $floor4 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('4'),    
                    )
                )                 
                )); 

                $floor5 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('5'),    
                    )
                )                 
                )); 

                $floor6 = new WP_Query(array(
                  'post_type' => 'apartment',
                  'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_floor',
                        'value'   => array('6'),    
                    )
                )                 
                ));  
                $all = $allaps->found_posts; 
                $fl1 = $floor1->found_posts;                 
                $fl2 = $floor2->found_posts;
                $fl3 = $floor3->found_posts;
                $fl4 = $floor4->found_posts;
                $fl5 = $floor5->found_posts; 
                $fl6 = $floor5->found_posts; 
?>

  <h1 class="fl-title"><?php if (get_field('fl_name')) { echo get_field('fl_name'); } else { ?> ЕТАЖ <?php the_field('fl_number'); ?>  <?php echo $current_menu_item; } ?> <br /> <span>СВОБОДНИ 
  <strong>
  <?php
   if ($current_floor_num == 1) { echo $fl1; } 
   if ($current_floor_num == 2) { echo $fl2; } 
   if ($current_floor_num == 3) { echo $fl3; } 
   if ($current_floor_num == 4) { echo $fl4; } 
   if ($current_floor_num == 5) { echo $fl5; } 
   if ($current_floor_num == 6) { echo $fl6; }
   ?> </strong></span>
  
  </h1>

<div class="shell shell--big">
  <section class="image-map">
      <img class="image-map--floor" src="<?php the_post(); if (get_field('fl_image')) {
        the_field('fl_image'); } else { ?> /wp-content/uploads/2018/12/et-<?php the_field('fl_number'); ?>-1.png
      <?php } ?>" border="0" usemap="#viz01Map" id="viz01" style="cursor:pointer" />
     
     <map name="viz01Map">
          <?php 
            $current_floor = get_permalink();
      
            $apList = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'apartment'
            ));
            while($apList->have_posts()) {
              $apList->the_post(); ?>
              <?php  if( $current_floor_num == get_field('ap_floor') ):
               { ?>
                <area target="_blank" alt="" title="" href="<?php the_permalink(); ?>" coords="<?php the_field('ap_coords'); ?>" shape="poly" name="<?php the_field('ap_name'); ?>" >
               <?php 
                }
                // get_template_part('template-parts/content', 'floor_menu'); 
                 
              endif; } ?>
      </map> 
  </section>
</div><!-- /.shell shell--big -->

<section class="floors">
  <div class="shell">
    <!-- <?php wp_nav_menu(array('theme_location' => 'floorBgMenu')); ?>  -->
    
    <ul>
    <?php 
        $current_floor = get_permalink();
  
        $apList = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'etaj'
        ));
        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( 1 /* get_field('ap_status') == "свободен" */ /*AND get_field('ap_floor') == 2 */ ):
           { ?>
              <li
              class="<?php if ( $current_floor_num == get_field('fl_number')) { echo 'current-menu-item'; } ?> "
            ><a href="<?php the_permalink(); ?> "> <?php if (get_field('fl_name')) { echo get_field('fl_name'); } else { ?> ЕТАЖ <?php the_field('fl_number'); ?>  <?php echo $current_menu_item; } ?> </a>
            </li> 
           <?php 
            }
            // get_template_part('template-parts/content', 'floor_menu');              
          endif; } ?>
    </ul>
  </div><!-- /.shell -->
</section><!-- /.floors -->

<section class="ap-list">
  <h2><?php the_post(); if (get_field('fl_item-type')) { echo get_field('fl_item-type'); } else { ?>Апартаменти - <span>Етаж <?php echo $current_floor_num; } ?></span></h2>

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
          'post_type' => 'apartment'
          //da vkaram tuk usloviqta
          //funkciq, koqto vr1shta neshtata zatazi stranica i keshira
          // da definiram fukciq v php da napravq static #apartments = post
          //ako apartmentsa 3 = post...
          //smenqm new wp-querry s imeto na tazi funkciq i q vikam.. 
          // ne trqbva da imam proverki, ako go narpavq go narpawq v wp query, to ne gi vzima
          // wp querrry class - meta querry
          //vatre6esn array.. key.. 
          //kakto e sega, ako imam pagination, qnma da raboti kato horata
        ));

        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( $current_floor_num == get_field('ap_floor') ):
            get_template_part('template-parts/content', 'apartment');
           ?>    
      <?php endif; ?> 
    <?php
      }
     ?>
  </div><!-- /.ap_list__main -->
</section><!-- /.ap-list -->

<section class="lokacia" id="lokacia">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2907.436143921635!2d27.91560811609519!3d43.221314579138465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDEzJzE2LjciTiAyN8KwNTUnMDQuMSJF!5e0!3m2!1sen!2sbg!4v1544240166375" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section><!-- /.lokacia -->

<script>
  jQuery(document).ready(function () {

    var $k = jQuery.noConflict();

    $k('#viz01').mapster({
        mapKey: 'name',
        clickNavigate: true,
        singleSelect: true,
        fillOpacity: 0.8,
        showToolTip: true,
        fillColor: '84AB35',
      onConfigured: function() {
      //var offset = jQuery('#map1, #map2, #map2, #map3, #map4, #map5').offset().top;
      jQuery('#mapster_wrap_0').next().off('mousemove').on('mousemove', function( e ) {
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
        $current_floor = get_permalink();
  
        $apList = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'apartment'
        ));
        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php  if( $current_floor_num == get_field('ap_floor') ):
           { ?>
              {
            key: '<?php the_field('ap_name'); ?>',
            selected: <?php if (get_field('ap_status') == 'свободен') { echo 'false';} else { echo 'true'; } ?>,
            toolTip: '<div class="allpopup <?php if (get_field('ap_status') != 'свободен') { echo 'busy';} ?>"><p class="toppart"><?php the_field('ap_type_name') ?> <?php the_field('ap_entrance') ?><?php the_field('ap_number') ?></p><p class="bottompart"><?php the_field('ap_status'); ?></p><p class="bottompart-number"><?php the_field('ap_full_size'); ?> m<sup>2</sup></p></div>',
            fillOpacity: 0.3,
            fillColor: '000000',
          }, 
           <?php 
            }
            // get_template_part('template-parts/content', 'floor_menu');              
          endif; } ?>
    ]
    });
});
</script>

<?php get_footer(); ?>