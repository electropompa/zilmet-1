<?php
  get_header();
?>
<section class="col-md-9 news">

<?php
  if (have_posts()):
    while (have_posts()): the_post(); ?>


        <div class="row">
          <div class="col-md-12">
            <h1><? the_title(); ?></h1>

            <?php the_content(); ?>
          </div>
        </div>


    <?php
    endwhile;
  endif; ?>
  <?php wp_pagenavi();  ?>
</section>

<?php  get_footer(); 
?>