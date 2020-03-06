<footer class="footer">
  <div class="contact" id="kontakti">
    <div class="contact__head">
      <h2>Свържи се с нас</h2>

      <p>Винаги бихме се радвали да отговорим на вашите въпроси!
      За целта попълнете полетата и ни изпратете вашето запитване.</p>
    </div><!-- /.contact__head -->

    <div class="contact__main">
      <div class="contact__info">
        <div class="contact__form">
        <?php the_post(); if (get_field('ap_owner') == 'ЯНЧО') {
          $owner = 2;
        } else { $owner = 1; }?>
          <?php gravity_form($owner, false, false, false, '', true, 12); ?>
        </div><!-- /.contact__form -->

        <div class="contact__contacts">
          <img src="/wp-content/uploads/2018/12/logo.jpg" alt="" />

          <ul>
            <li><i class="fas fa-thumbtack"></i> ул.: "Подполковник Калитин" с/у ХЕИ</li>
            <li><i class="fas fa-phone-volume"></i> 0897 982 216</li>
            <li><i class="fas fa-envelope"></i> mait_eood@mail.bg</li>
          </ul>
        </div><!-- /.contact__contacts -->
      </div><!-- /.contact__info -->
    </div><!-- /.contact__main -->
  </div><!-- /.contact -->

  <div class="footer__foot">

    <a href="#" class="footer__logo">
      <img src="/wp-content/uploads/2018/12/logo.jpg" alt="" />
    </a>

    <nav class="footer__nav">
      <ul>
        <li><a href="/">Начало</a></li>
        <li><a href="/#za-nas">За нас</a></li>
        <li><a href="/apartamenti/">Апартаменти</a></li>
        <li><a href="/#lokacia">Локация</a></li>
        <li><a href="/#kontakti">Запитване</a></li>
      </ul>
    </nav><!-- /.footer__nav -->

    <a href="https://bultag.com/услуги/изработка-уеб-сайт" class="footer_copyright">
      <img src="/wp-content/uploads/2018/12/logo.jpg" alt="" />
    </a>
  </div><!-- /.footer__foot -->
</footer><!-- /.footer -->

<div class="icons">
  <div class="icons__call">
    <div class="icons__call1">
      <i class="fas fa-phone"></i>
    </div><!-- /.icons__call1 -->

    <div class="icons__call2">
      <a href="+359897982216">+359 897 982 216</a>
    </div><!-- /.icons__call2 -->
  </div><!-- /.icons__call -->

  <div class="icons__mail">
    <div class="icons__mail1">
      <a href="mainto:mait_eood@mail.bg"><i class="far fa-envelope"></i></a>
    </div><!-- /.icons__mail1 -->
  </div><!-- /.icons__mail -->

  <div class="icons__mail icons__location">
    <a href="#">
      <i class="fas fa-thumbtack"></i>
    </a>
  </div><!-- /.icons__location -->

</div><!-- /.icons -->
  
  <!-- build:js /assets/scripts/Vendor.js -->
  <script src="/wp-content/themes/kalitin/temp/scripts/Vendor.js"></script>
  <!-- endbuild -->

  <!-- build:js /assets/scripts/App.js -->
 <!--  <script src="/wp-content/themes/kalitin/temp/scripts/App.js"></script> -->
  <!-- endbuild -->

<script async="" src="http://kalitinlast.local/browser-sync/browser-sync-client.js"></script>


<script>
jQuery(document).ready(function( $ ) {
   $(".burger").click(function(){
    $(".burger, .nav, .header__logo, body").toggleClass("expanded");
});
  
  
});
  
</script>
<?php wp_footer(); ?>
</body
</html>