
<a href="<?php the_permalink(); ?>" class="ap-list__item ">
  <ul>
    <li><?php the_field('ap_entrance'); ?><?php the_field('ap_number'); ?></li>
    <li><?php the_field('ap_entrance'); ?></li>
    <li><?php the_field('ap_floor'); ?></li>
    <li><?php the_field('ap_type'); ?> </li>
    <!-- <li class="hide-on-mobile"><?php the_field('ap_size'); ?> m<sup>2</sup></li> -->
    <li class="full_size"><?php the_field('ap_full_size'); ?> m<sup>2</sup></li>
    <li class="hide-on-mobile"><?php the_field('ap_direction'); ?></li>
    <li class="status"><?php if ( get_field('ap_status') == "свободен" ) { echo '<span>Свободен</span>'; }
              else { echo '<span class="red">Продаден</span>'; }
       ?></li>
  </ul>
</a><!-- /.ap-list__item -->