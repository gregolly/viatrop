<?php get_header('interno'); ?>

<style>
.bg-blog{
  background-image: url("<?php the_field('background-blog', 15); ?>");
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 200px;
  margin-top: 48px;
}
</style>
<section class="bg-blog">
  <h1 class="title-blog">Notícias</h1>
</section>

<?php if (is_active_sidebar('viatrop-sidebar')) : ?>
<section class="container-blog container blog">
<?php else: ?>
<section class="container blog blog-full">
<?php endif; ?>
  <div class="row divisor">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="item-blog">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium'); ?>
      </a>  
        <div class="content-blog">
          <h2><?php echo wp_trim_words( get_the_title(), 3 ); ?></h2>
          <div class="date"><i class="far fa-calendar-alt"></i><?php the_time('d/m/y'); ?></div>
          <?php echo the_excerpt(); ?>
          <a class="read-more" href="<?php the_permalink(); ?>">leia mais &rarr;</a>
        </div>
        
      </article>
<?php endwhile; else: ?>

<?php endif; ?>
  </div>
  
  
</section>
<?php get_sidebar(); ?> 
</section>


<?php get_footer(); ?>