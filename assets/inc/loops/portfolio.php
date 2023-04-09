  <a href="<?php the_permalink(); ?>">
    <div class="image" style="background-image: url('<?php 
    if ( has_post_thumbnail() ) {
      $fImg = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
      $featImg = $fImg[0];
      echo $featImg;
    } else { } ?>');"></div>
    <div class="wrap">
      <div class="content row">
        <div class="metadata col-12 m-col-12 row">
          <p class="date col-12 m-col-12"><?php 
            $cat = ''; // I have this set in some shortcodes
            if (!isset($cat) || $cat == '') {
              if ( has_primary_category() ){
                $primary = get_primary_categories( get_the_ID() );
                echo $primary['project-scope']->name;
              } else {
                if ( class_exists('WPSEO_Primary_Term') ) {
                  // Show the post's 'Primary' category, if this Yoast feature is available, & one is set. category can be replaced with custom terms
                  $primary = new WPSEO_Primary_Term( 'project-scope', get_the_id() );
                  $primary = $primary->get_primary_term();
                  $term    = get_term( $primary );
                  if ( is_wp_error( $term ) ) {
                      $cats = get_the_terms( get_the_ID(), 'project-scope' );
                      $cat = $cats[0];
                  } else {
                      $cat = $term;
                  }
                } else {
                  $cats = get_the_terms( get_the_ID(), 'project-scope' );
                  $cat = $cats[0];
                }
              }
            }
            echo $cat->name;
          ?></p>
        </div>
        <h2 class="title col-12"><?php the_title(); ?></h2>
      </div>
    </div>
  </a>