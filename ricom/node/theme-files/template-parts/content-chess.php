<div class="chess__row">
  <?php if( get_sub_field('chess_image') ): ?>
    <a href="<?php echo the_sub_field('chess_image'); ?>" class="chess__first" style="background-image: url('<?php echo the_sub_field('chess_image'); ?>');" data-lightbox="kalitin">
  <?php endif; ?>

  </a><!-- /.chess__first -->

  <div class="chess__second">
    <div class="chess__content">
      <?php if( get_sub_field('chess_title') ): ?>
        <h3>
          <?php echo the_sub_field('chess_title'); ?>
        </h3>
      <?php endif; ?>
      
      <?php if( get_sub_field('chess_text') ): ?>
        <p>
          <?php echo the_sub_field('chess_text'); ?>
        </p>
      <?php endif; ?>
      
      <?php if( get_sub_field('chess_link') ): ?>
        <a href="<?php echo the_sub_field('chess_link'); ?>" class="btn"><?php echo the_sub_field('chess_link_text'); ?></a>
      <?php endif; ?>
    </div><!-- /.chess__content -->
  </div><!-- /.chess__second -->
</div><!-- /.chess__row -->