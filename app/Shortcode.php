<?php 

namespace Habib\Button_Shortcode_Creator\App;

/**
 * Admin Class
 */
class Shortcode {
    /**
     * Class constructor
     */
    public function __construct( ) {
        add_shortcode( 'bsc_button', [$this, 'button_shortcode'] );
    }
    
    /**
     * Shortcode
     */
    /**
     * Create shortcode
     */
    public function button_shortcode( $atts ) {
        $post_id = $atts['id'];

        // Get post object by post ID
        $post = get_post($post_id);

        if( $post ) {

            $post_id = $post->ID;

            $sub_title      = get_post_meta( $post_id, 'bsc_subtitle', true );
            $bsc_offer      = get_post_meta( $post_id, 'bsc_offer', true );

            ?>
                <div class="bsc-container">
                    <div class="bsc-image">
                        <?php
                            if( has_post_thumbnail( $post_id ) ) {
                                echo get_the_post_thumbnail( $post_id );
                            }
                        ?>
                    </div>
                    <div class="bsc-content">
                        <?php
                            if( $sub_title ) {
                                printf( '<h3 class="%s">%s</h3>', 'bsc_sub_title', $sub_title );
                            }
                            printf( '<h2 class="%s">%s</h2>', 'bsc_title', get_the_title( $post_id ) );
                            if( $bsc_offer ) {
                                printf( '<h4 class="%s">%s</h4>', 'bsc_offer_title', $bsc_offer );
                            }
                        ?>
                        <?php 
                            printf(
                                "<a href='%s'>Hello</a>",
                                '#'
                            )
                        ?>
                    </div>
                </div>
            <?php 
        }
    }
}