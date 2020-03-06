
<li
  class="<?php if ( get_permalink()  ) {
    echo 'current-menu-item';
    if (get_field('fl_name')) {
    	the_field('fl_name')
    }
  } ?> "
><a href="<?php the_permalink(); ?> "><?php the_title(); ?> <?php the_permalink(); ?> <br /> <?php echo $current_menu_item; ?></a>
</li>

