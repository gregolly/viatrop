<?php get_header('interno'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="container titulo-custom-post">
  <h1><?php the_title(); ?></h1>
</section>

<section class="container">
  <p><?php the_content(); ?></p>
</section>
<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>