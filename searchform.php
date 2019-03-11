<form id="form" role="search" method="get" action="<?php bloginfo('home'); ?>">
  <a href="#" class="search animated bounceInRight"><i class="fas fa-search"></i></a>
  <input class="search-input" type="text" name="s" value="<?php echo get_search_query(); ?>" class="form-control" placeholder="Buscar...">
</form>