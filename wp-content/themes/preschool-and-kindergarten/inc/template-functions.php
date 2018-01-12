<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package preschool_and_kindergarten
 */


if( ! function_exists( 'preschool_and_kindergarten_doctype_cb' ) ) :
/**
 * Doctype Declaration
 * 
 * @since 1.0.1
*/
function preschool_and_kindergarten_doctype_cb(){
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;



if( ! function_exists( 'preschool_and_kindergarten_head' ) ) :
/**
 * Before wp_head
 * 
 * @since 1.0.1
*/
function preschool_and_kindergarten_head(){
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
}
endif;


if( ! function_exists( 'preschool_and_kindergarten_page_start' ) ) :
/**
 * Page Start
 * 
 * @since 1.0.1
*/
function preschool_and_kindergarten_page_start(){
    ?>
    <div id="page" class="site">
    <?php
}
endif;


if( ! function_exists( 'preschool_and_kindergarten_header_start' ) ) :
/**
 * Header Start
 * 
 * @since 1.0.1
*/
function preschool_and_kindergarten_header_start(){
    ?>
    <header id="masthead" class="site-header" role="banner">
       
    <?php 
}
endif;


if( ! function_exists( 'preschool_and_kindergarten_header_top' ) ) :
/**
 * Header Top
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_header_top(){ ?>

        <div class="header-t">
            <div class="container">
                <?php 
                    $email_address = get_theme_mod( 'preschool_and_kindergarten_email_address');
                    $phone_number  = get_theme_mod( 'preschool_and_kindergarten_phone' );
                    $social_header = get_theme_mod( 'preschool_and_kindergarten_ed_social' );
                ?>
                <ul class="contact-info">
                    <?php 
                        if($email_address){ ?>
                            <li>
                               <a href="mailto:<?php echo sanitize_email( $email_address ); ?>"><span class="fa fa-envelope"></span>
                               <?php echo esc_html( $email_address ); ?>
                               </a>
                            </li>
                    <?php } ?>
                    <?php 
                        if($phone_number){ ?>
                            <li>
                                <a href="tel:<?php echo preg_replace('/\D/', '', $phone_number); ?>">
                                    <span class="fa fa-phone"></span>
                                    <?php echo esc_html( $phone_number ); ?>
                                </a>
                            </li>
                    <?php } ?>
                </ul>
                <?php 
                /**
                 * Social Links
                 * 
                 * @hooked 
                */
                if($social_header) do_action('preschool_and_kindergarten_social'); ?>
            </div>
        </div> 
    <?php
    }

endif;


if( !function_exists( 'preschool_and_kindergarten_header_bottom' )):
/**
 * Header Bottom
 * 
 * @since 1.0.1
*/
   function preschool_and_kindergarten_header_bottom(){ ?>

        <div class="header-b">
            <div class="container"> 
                
                <div class="site-branding">
                    
                    <?php 
                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                        } 
                    ?>
                        <div class="text-logo">
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                            </h1>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php   
                            endif; ?>
                        </div>
                </div><!-- .site-branding -->
               
                <div id="mobile-header">
                    <a id="responsive-menu-button" href="#sidr-main">
                        <span class="fa fa-navicon"></span>
                    </a>
                </div>
            
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    
                    <?php wp_nav_menu( array( 
                            'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->
            
            </div>
        </div>

<?php 
   
   } 

endif;



if( ! function_exists( 'preschool_and_kindergarten_header_end' ) ) :
/**
 * Header End
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_header_end(){
        ?>
        </header>
        <?php
    }
endif;


if( ! function_exists( 'preschool_and_kindergarten_page_header' ) ):
/**
 * Page Header 
*/
    function preschool_and_kindergarten_page_header(){
        
        if(  ! ( is_front_page() ||  is_page_template('template-home.php') ) ){ ?>
            <div class="top-bar">
                <div class="container">
                    <div class="page-header">
                        <h1 class="page-title">
                            <?php 
                                if( is_page()){
                                    the_title();
                                }
                                  
                                if(is_search()){ 
                                    printf( esc_html__( 'Search Results for: %s', 'preschool-and-kindergarten' ), '<span>' . get_search_query() . '</span>' );
                                }
                                
                               /** For Woocommerce */
                            if( preschool_and_kindergarten_is_woocommerce_activated() && ( is_product_category() || is_product_tag() || is_shop() ) ){
                                if( is_shop() ){
                                    if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
                                        return;
                                    }
                                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                                
                                    if ( ! $_name ) {
                                        $product_post_type = get_post_type_object( 'product' );
                                        $_name = $product_post_type->labels->singular_name;
                                    }
                                    echo esc_html( $_name );
                                }elseif( is_product_category() || is_product_tag() ){
                                    $current_term = $GLOBALS['wp_query']->get_queried_object();
                                    echo esc_html( $current_term->name );
                                }
                            }else{
                                if( is_archive() ) the_archive_title();    
                            }
                                
                                if(is_404()) {
                                    printf( esc_html__( '404 - Page not found', 'preschool-and-kindergarten' )); 
                                }

                                if ( is_home() && ! is_front_page() ){
                                    single_post_title();
                                }
                            ?>
                        </h1>
                    </div>
                    <?php do_action( 'preschool_and_kindergarten_breadcrumbs' ); ?>  
                </div>
            </div>
            <?php 
            }
            $ed_section = preschool_and_kindergarten_ed_section();

            if( is_home() || ! $ed_section || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){  ?>

                <div class="container">
                    <div id="content" class="site-content">
                        <div class="row">
<?php       }
    }
endif;


if( ! function_exists( 'preschool_and_kindergarten_page_content_image' ) ) :
/**
 * Page Featured Image
*/
function preschool_and_kindergarten_page_content_image(){
    $sidebar_layout = preschool_and_kindergarten_sidebar_layout();
    if( has_post_thumbnail() ){
        echo '<div class="post-thumbnail">';
        ( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) ? the_post_thumbnail( 'preschool-and-kindergarten-with-sidebar' ) : the_post_thumbnail( 'preschool-and-kindergarten-without-sidebar' );    
        echo '</div>';
    }
}
endif;

if( ! function_exists( 'preschool_and_kindergarten_post_content_image' ) ) :
/**
 * Post Featured Image
*/
function preschool_and_kindergarten_post_content_image(){
    if( has_post_thumbnail() ){ 
        echo is_single() ? '<div class="post-thumbnail">' : '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail">';    
        
        is_active_sidebar( 'right-sidebar' ) ? the_post_thumbnail( 'preschool-and-kindergarten-with-sidebar' ) : the_post_thumbnail( 'preschool-and-kindergarten-without-sidebar' );    
        
        echo is_single() ? '</div>' : '</a>';
    }        
}
endif;

if( ! function_exists( 'preschool_and_kindergarten_post_entry_header' ) ) :
/**
 * Post Entry Header
*/
function preschool_and_kindergarten_post_entry_header(){
    ?>
    <header class="entry-header">
        <?php
            if( is_single() ){
                the_title( '<h1 class="entry-title">', '</h1>' );
            }else{
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
        ?>
        <div class="entry-meta">
            <?php 
            if ( 'post' === get_post_type() ){ 
                preschool_and_kindergarten_get_post_meta(); 
            } 
            ?>
        </div>
    </header><!-- .entry-header -->
    <?php
}
endif;

if( ! function_exists( 'preschool_and_kindergarten_post_author' ) ) :
/**
 * Author Bio
 * 
*/
function preschool_and_kindergarten_post_author(){
    if( get_the_author_meta( 'description' ) ){
    ?>
    <section class="author">
        <div class="img-holder">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 77 ); ?>
        </div>
        <div class="text-holder">
            <span class="name"><?php printf( esc_html__( 'Posted by %s', 'preschool-and-kindergarten' ), get_the_author_meta( 'display_name' ) ); ?></span>              
            <?php echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); ?>
        </div>
    </section>
    <?php  
    }  
}
endif;


if( ! function_exists( 'preschool_and_kindergarten_content_end' ) ) :
/**
 * Content End
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_content_end(){
        $ed_section = preschool_and_kindergarten_ed_section();

        if( is_home() || ! $ed_section || ! ( is_front_page()  || is_page_template( 'template-home.php' ) ) ){
        ?>
                    </div><!-- row -->
                </div><!-- .container -->
            </div><!-- #content -->
            
        <?php
        }
    }
    endif;



if( ! function_exists( 'preschool_and_kindergarten_footer_start' ) ) :
/**
 * Footer Start
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_footer_start(){
        ?>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
        <?php
    }
endif;



if( ! function_exists( 'preschool_and_kindergarten_footer_top' ) ) :
/**
 * Footer Top
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_footer_top(){    
        if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) || is_active_sidebar( 'footer-four' ) ){
        ?>
           <div class="footer-t">
                <div class="row">
                    
                    <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
                        <div class="column">
                           <?php dynamic_sidebar( 'footer-one' ); ?>    
                        </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                        <div class="column">
                           <?php dynamic_sidebar( 'footer-two' ); ?>    
                        </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                        <div class="column">
                           <?php dynamic_sidebar( 'footer-three' ); ?>  
                        </div>
                    <?php } ?>

                    <?php if( is_active_sidebar( 'footer-four' ) ){ ?>
                        <div class="column">
                           <?php dynamic_sidebar( 'footer-four' ); ?>   
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php 
        }   
    }
endif;



if( ! function_exists( 'preschool_and_kindergarten_footer_bottom' ) ) :
/**
 * Footer Bottom
 * 
 * @since 1.0.1 
*/
    function preschool_and_kindergarten_footer_bottom(){
        $copyright_text = get_theme_mod( 'preschool_and_kindergarten_footer_copyright_text' );
    ?>
        <div class="site-info">
        <?php if( $copyright_text ){
                echo wp_kses_post( $copyright_text );
            }else{ 
                echo esc_html__( '&copy; Copyright ', 'preschool-and-kindergarten' ) . date('Y'); ?> 
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>.
            <?php } ?>
                
            <a href="<?php echo esc_url( 'http://raratheme.com/wordpress-themes/preschool-and-kindergarten/' ); ?>" rel="author" target="_blank"><?php echo esc_html__( 'Preschool and Kindergarten by Rara Theme.', 'preschool-and-kindergarten' ); ?></a>
            <?php printf( esc_html__( 'Powered by %s', 'preschool-and-kindergarten' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'preschool-and-kindergarten' ) ) .'" target="_blank">WordPress.</a>' ); ?>

        </div>
    <?php }
endif;



if( ! function_exists( 'preschool_and_kindergarten_footer_end' ) ) :
/**
 * Footer End
 * 
 * @since 1.0.1 
*/
    function preschool_and_kindergarten_footer_end(){
        ?>
        </div>
        </footer><!-- #colophon -->
        <?php
    }
endif;

if( ! function_exists( 'preschool_and_kindergarten_page_end' ) ) :
/**
 * Page End
 * 
 * @since 1.0.1
*/
    function preschool_and_kindergarten_page_end(){
        ?>
        </div><!-- #page -->
        <?php
    }
endif;
