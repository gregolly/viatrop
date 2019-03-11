<?php get_header('interno'); ?>


<section class="bg-blog">
  <h1 class="title-blog">Notícias</h1>
</section>

<?php if (is_active_sidebar('viatrop-sidebar')) : ?>
<section class="container-blog container">
<?php else: ?>
<section class="container">
<?php endif; ?>
  <div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="item-blog">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium'); ?>
      </a>  
        <div class="content-blog">
          <h2><?php the_title(); ?></h2>
          <p><?php the_excerpet(); ?></p>
        </div>
        <a href="<?php the_permalink(); ?>">leia mais &rarr;</a>
      </article>
<?php endwhile; else: ?>

<?php endif; ?>    
  </div>
</section>
</section>


<?php get_footer(); ?>