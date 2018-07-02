<?php get_header(); ?>
  
  <div  class="col-xs-12 col-sm-8 col-md-9">

  <?php if(function_exists('dp_breadcrumb')){echo dp_breadcrumb();} 

    if (have_posts()):
      while (have_posts()): the_post(); 

        the_content();

      endwhile;
    endif; ?>
  </div>

<?php get_footer(); ?>