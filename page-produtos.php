<?php get_header('interno'); 
//Template name: Produtos
?>
<section class="bg-photo">
  <h1>Produtos</h1>
</section>

<section class="container products">
        <?php $Produtos = new WP_Query([
            'posts_per_page' => 30,
            'post_type' => 'produtos',
        ]); 
          
        if($Produtos->have_posts()) : while($Produtos->have_posts()) : $Produtos->the_post();
        ?>
  <a href="<?php the_permalink(); ?>">
    <div class="item-product row">
      <?php the_post_thumbnail('medium'); ?>
      <div class="container-titulo-product">
        <h2 class="titulo-product"><?php the_title(); ?></h2>
      </div>
    </div>
  </a>
  <?php endwhile; else: endif; ?>
</section>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<section class="form-product container">
  <?php the_content(); ?>
</section>
<?php endwhile; else: endif; ?>

<?php get_footer(); ?>