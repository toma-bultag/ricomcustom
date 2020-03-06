<?php get_header(); ?>

<section class="image-map">
  <h1 class="home-title">Апартаменти Калитин</h1><!-- /.home-title -->
  <div class="image-map__img">
    <img src="/wp-content/uploads/2018/12/apartamenti-kalitin.jpg" border="0" usemap="#viz01Map" id="viz01" style="cursor:pointer" />

<map name="viz01Map">
    <area target="_blank" alt="" title="" href="/apartamenti/" coords="196,969,196,890,486,856,486,883,909,869,1436,880,1436,886,1724,895,1724,990,1163,1000,483,997" shape="poly" name="kalitin-parter" >

    <area target="_blank" alt="" title="" href="/apartamenti/" coords="189,818,189,856,174,859,174,890,486,857,485,883,909,869,1436,885,1762,896,1765,816,1731,810,1718,813,1690,811,1697,802,1662,796,1643,796,1514,788,1429,785,1407,776,1307,771,1200,763,1195,766,965,751,927,749,887,749,851,754,637,773,622,773,486,786,488,759,418,766,312,778,247,796,235,796,191,807,205,812" shape="poly" name="kalitin-et2"  >

    <area target="_blank" alt="" title="" href="/apartamenti/" coords="178,823,201,812,193,806,237,795,247,797,310,778,488,760,486,785,622,773,639,772,885,750,929,748,1192,765,1200,762,1407,777,1431,786,1646,795,1660,795,1696,801,1689,811,1721,814,1731,809,1762,814,1765,736,1731,724,1723,723,1648,704,1433,684,1409,672,965,633,859,639,639,667,488,684,491,660,312,687,247,714,235,714,196,731,218,736,188,750,188,787,174,795" shape="poly" name="kalitin-et3"  >

    <area target="_blank" alt="" title="" href="/apartamenti/" coords="176,760,218,743,193,736,235,717,245,721,308,692,488,665,488,689,622,670,639,673,858,644,851,641,885,636,927,634,1192,658,1202,658,1307,668,1407,677,1416,677,1470,680,1419,690,1662,709,1762,741,1765,658,1663,617,1646,614,1406,587,1409,572,1299,561,1195,550,958,522,927,516,887,516,854,526,637,570,622,566,486,592,488,566,308,604,247,638,235,638,193,660,215,666,188,685,189,717,174,729" shape="poly" name="kalitin-et4"  >

    <area target="_blank" alt="" title="" href="/apartamenti/" coords="178,689,215,667,191,660,235,637,247,640,308,603,486,565,486,592,622,567,637,569,887,518,927,516,968,521,1195,552,1406,572,1416,572,1470,577,1422,589,1646,613,1662,616,1762,657,1762,577,1646,525,1429,491,1470,477,1416,467,1407,472,1297,457,1307,452,1202,437,1197,443,958,406,966,403,931,398,887,399,851,409,859,411,639,464,622,459,488,494,488,467,310,514,245,557,237,557,191,586,218,587,188,609,188,652,176,662" shape="poly" name="kalitin-et5"  >

    <area target="_blank" alt="" title="" href="/apartamenti/" coords="188,608,213,588,189,588,237,556,245,557,308,513,488,466,486,495,619,459,639,464,856,410,854,408,887,398,929,398,965,401,956,408,1195,442,1200,435,1307,451,1294,459,1404,473,1416,468,1467,476,1428,490,1643,524,1762,578,1763,540,1724,520,1729,493,1641,442,1434,405,1438,383,1046,318,1048,279,936,259,851,264,771,291,771,327,513,401,517,385,347,435,186,557" shape="poly" name="kalitin-et6"  >
</map> 

    <?php if (is_front_page()) {
  ?>
<a href="#" class="scroll-down">
  <i class="fas fa-arrow-down"></i> <br />
  <span>РАЗГЛЕДАЙ</span>
</a>
<?php
} ?>
  </div><!-- /.image-map__img -->
</section><!-- /.image-map -->

<section class="ap-list">
  <h2>Апартаменти в <span>KALITIN</span></h2>

  <div class="ap-list__head">
    <ul>
      <li>Номер</li>
      <li>Вход</li>
      <li>Етаж</li>
      <li>Вид</li>
      <li>Чиста площ</li>
      <li>Обща площ</li>
      <li>Изложение</li>
      <li>Статус</li>
    </ul>
  </div><!-- /.ap-list__head -->
    
  <div class="ap_list__main">
    <?php 
        $apList = new WP_Query(array(
          'posts_per_page' => 5,
          'post_type' => 'apartment'
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

     <h2 class="title"><a href="/apartamenti/" class="btn btn--middle">Разгледайте всички</a></h2>
  </div><!-- /.ap_list__main -->
</section><!-- /.ap-list -->

<section class="chess">
  <div class="chess__row">
    <a href="/wp-content/uploads/2018/12/kalitin-apartamenti-szapad.jpg" class="chess__first" style="background-image: url('/wp-content/uploads/2018/12/kalitin-apartamenti-sseveroiztok.jpg');" data-lightbox="kalitin">
  
    </a><!-- /.chess__first -->

    <div class="chess__second">
      <div class="chess__content">
        <h3>
          Комфорт и спокойствие за Вашето семейство на конкурентни цени.
        </h3>

        <p>
          Сдържаният лукс, най-модерните тенденции в архитектурата и жилищното строителство, цялото изпълнение на сградата и добрата локоция – всичко това прави комплекс „Калитин“ желано място за инвестиция и нещо много повече от добро място за живеене във Варна<span class=""></span>
        </p>

        <a href="/apartamenti/" class="btn">Разгледайте Апартаментите</a>
      </div><!-- /.chess__content -->
    </div><!-- /.chess__second -->
  </div><!-- /.chess__row -->

  <div class="chess__row">
    <a href="/wp-content/uploads/2018/12/kalitin-apartamenti-szapad.jpg" class="chess__first" style="background-image: url('/wp-content/uploads/2018/12/kalitin-apartamenti-sseveroiztok.jpg');" data-lightbox="kalitin">
  
    </a><!-- /.chess__first -->

    <div class="chess__second">
      <div class="chess__content">
        <h3>
          Комфорт и спокойствие за Вашето семейство на конкурентни цени.
        </h3>

        <p>
          Сдържаният лукс, най-модерните тенденции в архитектурата и жилищното строителство, цялото изпълнение на сградата и добрата локоция – всичко това прави комплекс „Калитин“ желано място за инвестиция и нещо много повече от добро място за живеене във Варна<span class=""></span>
        </p>

        <a href="/apartamenti/" class="btn">Разгледайте Апартаментите</a>
      </div><!-- /.chess__content -->
    </div><!-- /.chess__second -->
  </div><!-- /.chess__row -->

  <div class="chess__row">
    <a href="/wp-content/uploads/2018/12/kalitin-apartamenti-szapad.jpg" class="chess__first" style="background-image: url('/wp-content/uploads/2018/12/kalitin-apartamenti-sseveroiztok.jpg');" data-lightbox="kalitin">
  
    </a><!-- /.chess__first -->

    <div class="chess__second">
      <div class="chess__content">
        <h3>
          Комфорт и спокойствие за Вашето семейство на конкурентни цени.
        </h3>

        <p>
          Сдържаният лукс, най-модерните тенденции в архитектурата и жилищното строителство, цялото изпълнение на сградата и добрата локоция – всичко това прави комплекс „Калитин“ желано място за инвестиция и нещо много повече от добро място за живеене във Варна<span class=""></span>
        </p>

        <a href="/apartamenti/" class="btn">Разгледайте Апартаментите</a>
      </div><!-- /.chess__content -->
    </div><!-- /.chess__second -->
  </div><!-- /.chess__row -->
</section><!-- /.chess -->

<section class="gallery">
  <?php the_field('b'); ?>

  <?php 

  $images = get_field('gallery');

  if( $images ): ?>
      <ul>
          <?php foreach( $images as $image ): ?>
              <li>
                  <a href="<?php echo $image['url']; ?>">
                       <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                  </a>
                  <p><?php echo $image['caption']; ?></p>
              </li>
          <?php endforeach; ?>
      </ul>
<?php endif; ?>
</section><!-- /.gallery -->

<section class="lokacia" id="lokacia">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2907.436143921635!2d27.91560811609519!3d43.221314579138465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDPCsDEzJzE2LjciTiAyN8KwNTUnMDQuMSJF!5e0!3m2!1sen!2sbg!4v1544240166375" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section><!-- /.lokacia -->



      




















<?php get_footer(); ?>