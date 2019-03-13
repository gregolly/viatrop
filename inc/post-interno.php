<?php get_header('interno'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<style>
.bg-title-post{
  background-image: url("<?php the_field('background-post-inner', 15); ?>");
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 200px;
  margin-top: 48px;
  margin-bottom: 20px;
}
</style>
<section class="titulo-custom-post bg-title-post">
  <div class="container">
    <h1 class="title-single"><?php the_title(); ?></h1>
  </div>  
</section>

<section class="container content-post">
  <?php the_content(); ?>
</section>
<?php endwhile; else: ?>

<?php endif; ?>

<?php get_footer(); ?>