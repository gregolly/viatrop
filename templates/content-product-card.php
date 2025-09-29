<?php
/**
 * Template Part: Content Product Card
 *
 * Displays a single product card.
 */
?>
<div class="col-sm-6 col-lg-4 product-card-item">
    <div class="card h-100">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
        <?php else : ?>
            <img src="https://placehold.co/600x400/006461/FFFFFF?text=Produto" class="card-img-top" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <div class="card-text mb-3"><?php the_excerpt(); ?></div>
            <button type="button" class="btn btn-success mt-auto" style="background-color: #BDCE00; border-color: #BDCE00;" data-bs-toggle="modal" data-bs-target="#quoteModal">
                Solicitar Cotação
            </button>
        </div>
    </div>
</div>