<?php get_header('interno'); ?>

<?php if (! is_active_sidebar('viatrop-sidebar')) {
	return;
}
?>
<aside class="container-sidebar">
  <ul class="unstyled-list">
    <?php dynamic_sidebar('viatrop-sidebar'); ?>
  </ul>
</aside>


<?php get_footer(); ?>