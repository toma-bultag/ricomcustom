<?php get_header(); ?>

<section class="image-map">
  <div class="image-map__img">
    <img src="/wp-content/uploads/2018/12/apartamenti-kalitin.jpg" border="0" usemap="#viz01Map" id="viz01" style="cursor:pointer" />

<map name="viz01Map">
    <area target="_blank" alt="" title="" href="/etaji/партер/" coords="196,969,196,890,486,856,486,883,909,869,1436,880,1436,886,1724,895,1724,990,1163,1000,483,997" shape="poly" name="kalitin-parter" >

    <area target="_blank" alt="" title="" href="/etaji/етаж-2/" coords="189,818,189,856,174,859,174,890,486,857,485,883,909,869,1436,885,1762,896,1765,816,1731,810,1718,813,1690,811,1697,802,1662,796,1643,796,1514,788,1429,785,1407,776,1307,771,1200,763,1195,766,965,751,927,749,887,749,851,754,637,773,622,773,486,786,488,759,418,766,312,778,247,796,235,796,191,807,205,812" shape="poly" name="kalitin-et2"  >

    <area target="_blank" alt="" title="" href="/etaji/етаж-3/" coords="178,823,201,812,193,806,237,795,247,797,310,778,488,760,486,785,622,773,639,772,885,750,929,748,1192,765,1200,762,1407,777,1431,786,1646,795,1660,795,1696,801,1689,811,1721,814,1731,809,1762,814,1765,736,1731,724,1723,723,1648,704,1433,684,1409,672,965,633,859,639,639,667,488,684,491,660,312,687,247,714,235,714,196,731,218,736,188,750,188,787,174,795" shape="poly" name="kalitin-et3"  >

    <area target="_blank" alt="" title="" href="/etaji/етаж-4/" coords="176,760,218,743,193,736,235,717,245,721,308,692,488,665,488,689,622,670,639,673,858,644,851,641,885,636,927,634,1192,658,1202,658,1307,668,1407,677,1416,677,1470,680,1419,690,1662,709,1762,741,1765,658,1663,617,1646,614,1406,587,1409,572,1299,561,1195,550,958,522,927,516,887,516,854,526,637,570,622,566,486,592,488,566,308,604,247,638,235,638,193,660,215,666,188,685,189,717,174,729" shape="poly" name="kalitin-et4"  >

    <area target="_blank" alt="" title="" href="/etaji/етаж-5/" coords="178,689,215,667,191,660,235,637,247,640,308,603,486,565,486,592,622,567,637,569,887,518,927,516,968,521,1195,552,1406,572,1416,572,1470,577,1422,589,1646,613,1662,616,1762,657,1762,577,1646,525,1429,491,1470,477,1416,467,1407,472,1297,457,1307,452,1202,437,1197,443,958,406,966,403,931,398,887,399,851,409,859,411,639,464,622,459,488,494,488,467,310,514,245,557,237,557,191,586,218,587,188,609,188,652,176,662" shape="poly" name="kalitin-et5"  >

    <area target="_blank" alt="" title="" href="/etaji/етаж-6/" coords="188,608,213,588,189,588,237,556,245,557,308,513,488,466,486,495,619,459,639,464,856,410,854,408,887,398,929,398,965,401,956,408,1195,442,1200,435,1307,451,1294,459,1404,473,1416,468,1467,476,1428,490,1643,524,1762,578,1763,540,1724,520,1729,493,1641,442,1434,405,1438,383,1046,318,1048,279,936,259,851,264,771,291,771,327,513,401,517,385,347,435,186,557" shape="poly" name="kalitin-et6"  >
</map> 

    <?php if (is_front_page()) {
  ?>
<a href="#ap-list" class="scroll-down">
  <i class="fas fa-arrow-down"></i> <br />
  <span>РАЗГЛЕДАЙ</span>
</a>
<?php
} ?>
  </div><!-- /.image-map__img -->
</section><!-- /.image-map -->

<section class="ap-list home" id="ap-list">
  <h1 class="home-title">Апартаменти Калитин</h1><!-- /.home-title -->

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
          'posts_per_page' => 5,
          'post_type' => 'apartment',
          'orderby' => 'rand',
          'meta_query'     => array(
                    array(
                        'key'     => 'ap_status',
                        'value'   => array('свободен'),    
                    ),
                    array(
                        'key'     => 'ap_type',
                        'value'   => array('бар', 'магазин', 'едностаен', 'двустаен', 'тристаен', 'четиристаен'), 
                        
                    ),
          )
        ));

        while($apList->have_posts()) {
          $apList->the_post(); ?>
          <?php   if(  get_field('ap_floor') > 0 ):   get_template_part('template-parts/content', 'apartment');
           ?>    
      <?php endif; ?> 
    <?php
      }
     ?>

     <h2 class="title"><a href="/apartamenti/" class="btn btn--middle">Разгледайте всички</a></h2>
  </div><!-- /.ap_list__main -->
</section><!-- /.ap-list -->

<section class="chess home" id="za-nas">  
  <?php the_post();
  // check if the repeater field has rows of data
  if( have_rows('chess') ):
    // loop through the rows of data
      while ( have_rows('chess') ) : the_row();
        get_template_part('template-parts/content', 'chess');
      endwhile;
  else :
      // no rows found
  endif;
  ?>


</section><!-- /.chess -->
<!--
<section class="gallery">
  <div class="shell shell--big">
    <?php the_post();

    $images = get_field('gallery');

    if( $images ): ?>
        <ul class="gallery">
            <?php foreach( $images as $image ): ?>
                <li>
                    <a href="<?php echo $image['url']; ?>" data-lightbox="gallery">
                         <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
  </div><!-- /.shell -->
<!-- </section><!-- /.gallery --> 

<section class="lokacia" id="lokacia">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2907.436143921635!2d27.91560811609519!3d43.221314579138465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDEzJzE2LjciTiAyN8KwNTUnMDQuMSJF!5e0!3m2!1sen!2sbg!4v1544240166375" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section><!-- /.lokacia -->

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
                        'key'     => 'ap_floor',
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
    areas: [ {
            key: 'kalitin-parter',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ПАРТЕР</p><p class="bottompart">Свободни магазини</p><p class="bottompart-number"><?php echo $fl1; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, {
            key: 'kalitin-et2',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ЕТАЖ 2</p><p class="bottompart">Свободни апартаменти</p><p class="bottompart-number"><?php echo $fl2; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, {
            key: 'kalitin-et3',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ЕТАЖ 3</p><p class="bottompart">Свободни апартаменти</p><p class="bottompart-number"><?php echo $fl3; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, {
            key: 'kalitin-et4',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ЕТАЖ 4</p><p class="bottompart">Свободни апартаменти</p><p class="bottompart-number"><?php echo $fl4; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, {
            key: 'kalitin-et5',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ЕТАЖ 5</p><p class="bottompart">Свободни апартаменти</p><p class="bottompart-number"><?php echo $fl5; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          }, {
            key: 'kalitin-et6',
            selected: false,
            toolTip: '<div class="allpopup"><p class="toppart">ЕТАЖ 6</p><p class="bottompart">Свободни апартаменти</p><p class="bottompart-number"><?php echo $fl6; ?></p></div>',
            fillOpacity: 0.5,
            fillColor: '666666',
          },
    ]
    });
});
</script>

<?php get_footer(); ?>