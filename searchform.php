<form role="search" method="get" class="search-form form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>">
   
    <input type="search" class="search-field form-control"
            placeholder="<?php echo esc_attr_x( 'Rechercher...', THEME_NAME_SPACE ) ?>"
            value="<?php echo get_search_query() ?>" name="s" />
    <button type="submit" class="search-submit btn btn-secondary ml-2"><span class="ion-ios-search-strong"></span></button>
</form>