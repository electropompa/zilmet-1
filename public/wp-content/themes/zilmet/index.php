<?php get_header(); ?>
  
  <div  class="col-12 col-sm-8 col-md-9">
    <main id="content" role="main"">

    <div class="row mb-3">
      <div class="col-lg-12">
        <?php if(function_exists('dp_breadcrumb')){ echo dp_breadcrumb(); } ?>
      </div>
    </div>
    <?php
      if (have_posts()):
        while (have_posts()): the_post(); 

          the_content();

        endwhile;
      endif; ?>
    </main>
  </div>

<?php get_footer(); ?>