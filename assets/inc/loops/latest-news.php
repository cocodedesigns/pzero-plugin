            
              <div class="image" style="background-image: url('<?php 
              if ( has_post_thumbnail() ) {
                $fImg = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                $featImg = $fImg[0];
                echo $featImg;
              } else { } ?>');"></div>
              <div class="wrap">
                <div class="content row">
                  <h2 class="title"><?php 
                  if (strlen( get_the_title() ) > 30){
                    echo substr(get_the_title(), 0, 27) . '...';
                  } else {
                    echo get_the_title();
                  }
                  ?></h2>
                  <p class="date"><span class="icon far fa-calendar-alt"></span>
                    <span class="text"><?php the_time('F j, Y'); ?></span></p>
                  <p class="excerpt"><?php 
                  if (strlen( get_the_excerpt() ) > 100){
                    echo substr(get_the_excerpt(), 0, 97) . '...';
                  } else {
                    echo get_the_excerpt();
                  }
                  ?></p>
                  <p class="readmore"><a href="<?php the_permalink(); ?>" class="link">
                    <?php echo $settings['link_text']; ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                  </a></p>
                </div>
              </div>