<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?>
<?php
$metaGeneratorContent = '';
$meta_generator = '';
if ($metaGeneratorContent) {
    remove_action('wp_head', 'wp_generator');
    $meta_generator = '<meta name="generator" content="' . $metaGeneratorContent . '" />' . "\n";
    $GLOBALS['meta_generator'] = true;
}
$hideHeader = false; // default header is visible
global $hideFooter;
$hideFooter = false; // default footer is visible
$pageBlog = is_home();
$pagePost = is_single();
$pageProducts = theme_woocommerce_enabled() ? is_shop() || is_product_category() : false;
$pageProduct = theme_woocommerce_enabled() ? is_product() : false;
$pageCart = theme_woocommerce_enabled() ? is_cart() : false;
$defaultPath = $pageProducts || $pageProduct || $pageCart ? '/woocommerce' : '';
if ($pageBlog) {
    $template = 'blog';
}
if ($pagePost) {
    $template = 'post';
}
if ($pageProducts) {
    $template = 'products';
}
if ($pageProduct) {
    $template = 'product';
}
if ($pageCart) {
    $template = 'cart';
}
$wpCustomTemplate = false;
global $isWpCustomTemplate, $blog_custom_template, $post_custom_template;
if ($isWpCustomTemplate) {
    $template = $blog_custom_template ? $blog_custom_template : $post_custom_template;
    if ($template) {
        $wpCustomTemplate = true;
    }
}
if ($pageBlog || $pagePost || $pageProducts || $pageProduct || $pageCart || $wpCustomTemplate) {
    $defaultName = $pageCart ? '‌shoppingCart' : $template;
    global ${$template . "_custom_template"};
    ${$template . "_custom_template"} = ${$template . "_custom_template"} ? ${$template . "_custom_template"} : $defaultName . 'Template';
    $customPath = $wpCustomTemplate ? $template : ${$template . "_custom_template"};
    $fileWithOptions = get_template_directory() . $defaultPath . '/template-parts/' . $customPath . '/custom-template-options.php';
    if ( file_exists( $fileWithOptions ) ) {
        include_once $fileWithOptions;
    }
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" style="font-size:<?php echo apply_filters('theme_base_font_size', '16'); ?>px">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $meta_generator; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    
    
    
</head>

<body <?php body_class(); ?><?php body_style_attribute(); ?> <?php body_data_attributes(); ?>>
<?php if (version_compare( $wp_version, '5.2', '>=' )) { wp_body_open(); } ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '020202' ); ?></a>
    <?php if (!$hideHeader) { ?>
    <header class="u-clearfix u-header u-sticky u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-white u-header" id="sec-a4c5" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
  <div class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
    <div class="u-layout">
      <div class="u-layout-row">
        <div class="u-container-style u-layout-cell u-size-11 u-layout-cell-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <?php $logo = theme_get_logo(array(
            'default_src' => "/images/logo.png",
            'default_url' => "https://localhost"
        )); $url = stripos($logo['url'], 'http') === 0 ? esc_url($logo['url']) : $logo['url']; ?><a <?php if (is_customize_preview()) echo 'data-default-src="' . esc_url($logo['default_src']) . '" '; ?>href="<?php echo $url; ?>" class="u-align-center u-image u-logo u-image-1 custom-logo-link" data-image-width="327" data-image-height="140">
              <img <?php if ($logo['svg']) { echo 'style="width:'.$logo['width'].'px"'; } ?>src="<?php echo esc_url($logo['src']); ?>" class="u-logo-image u-logo-image-1" data-image-width="148">
            </a>
          </div>
        </div>
        <div class="u-container-style u-layout-cell u-size-19 u-layout-cell-2">
          <div class="u-container-layout u-valign-middle u-container-layout-2">
            <p class="u-align-center u-text u-text-1">
              <span style="font-size: 1.5rem;">مــــطــــبــــعــــة   الــــتــــأمــــيــــنــات<br>
              </span>IMPRIMERIE DES ASSURANCES 
            </p>
          </div>
        </div>
        <div class="u-container-style u-layout-cell u-size-21 u-layout-cell-3">
          <div class="u-container-layout u-container-layout-3">
            <div class="u-align-center u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-group-1">
              <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl">
                <a href="https://localhost/wordpress-website-builder" class="u-active-none u-btn u-btn-rectangle u-button-style u-hover-none u-none u-text-body-color u-btn-1"><span class="u-icon"><svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752    c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z"></path></svg><img></span>&nbsp;+213 (0) 23 15 20 17 / 18 / 19 
                </a>
                <p class="u-text u-text-2"><span class="u-icon u-icon-2"><svg class="u-svg-content" viewBox="0 0 368.002 368.002" x="0px" y="0px" style="width: 1em; height: 1em;"><g><g><g><path d="M367.492,357.193l-48-128c-1.168-3.12-4.152-5.192-7.488-5.192h-73.352l27.616-48.696     c4.496-7.928,10.936-21.24,14.36-29.688c0.304-0.744,7.376-18.448,7.376-38.016c0-59.328-46.656-107.6-104-107.6     s-104,48.272-104,107.6c0,19.584,7.136,37.304,7.44,38.04c3.432,8.432,9.88,21.736,14.368,29.664l27.576,48.696H56.004     c-3.336,0-6.32,2.072-7.496,5.192l-48,128c-0.92,2.456-0.576,5.208,0.92,7.368c1.496,2.152,3.952,3.44,6.576,3.44h352     c2.624,0,5.08-1.288,6.576-3.44C368.076,362.401,368.412,359.649,367.492,357.193z M115.724,167.417     c-4.128-7.296-10.296-20.04-13.472-27.808c-0.064-0.152-6.248-15.52-6.248-32c0-50.512,39.48-91.608,88-91.608s88,41.096,88,91.6     c0,16.368-6.152,31.864-6.2,32.008c-3.152,7.776-9.312,20.504-13.456,27.8l-34.304,60.488c-0.032,0.056-0.088,0.104-0.12,0.16     l-32.992,58.232c-0.344,0.616-0.672,1.048-0.928,1.328c-0.256-0.28-0.568-0.704-0.92-1.312l-33.008-58.256     c0,0,0-0.008-0.008-0.008L115.724,167.417z M19.548,352.001l42-112h76.904l30.696,54.184c0.008,0.016,0.016,0.024,0.024,0.032     l7.864,13.88c2.84,5.008,11.08,5.008,13.92,0l7.888-13.92c0,0,0,0,0-0.008l30.736-54.168h76.88l42,112H19.548z"></path><path d="M240.004,104.001c0-30.88-25.128-56-56-56s-56,25.12-56,56s25.128,56,56,56S240.004,134.881,240.004,104.001z      M144.004,104.001c0-22.056,17.944-40,40-40c22.056,0,40,17.944,40,40c0,22.056-17.944,40-40,40     C161.948,144.001,144.004,126.057,144.004,104.001z"></path>
</g>
</g>
</g></svg><img></span>  13, rue HAMI Abderrahmane - Bab El Oued - ALGER 
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="u-align-center u-container-style u-layout-cell u-size-9 u-layout-cell-4">
          <div class="u-container-layout u-valign-top-xs u-container-layout-5">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
            ob_start();
            ?><nav class="u-menu u-menu-dropdown u-offcanvas u-offcanvas-shift u-menu-1" data-position="menu principal" data-responsive-from="MD">
    <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
      <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
        <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
      </a>
    </div>
    <div class="u-custom-menu u-nav-container">
      {menu}
    </div>
    <div class="u-custom-menu u-nav-container-collapse">
      <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
        <div class="u-sidenav-overflow">
          <div class="u-menu-close"></div>
          {responsive_menu}
        </div>
      </div>
      <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
    </div>
  </nav><?php
            $menu_template = ob_get_clean();
            echo Theme_NavMenu::getMenuHtml(array(
                'container_class' => 'u-menu u-menu-dropdown u-offcanvas u-offcanvas-shift u-menu-1',
                'menu' => array(
                    'menu_class' => 'u-nav u-spacing-20 u-unstyled u-nav-1',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-border-active-grey-90 u-border-hover-grey-50 u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base',
                    'link_style' => 'padding: 10px;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link u-white',
                    'submenu_link_style' => '',
                ),
                'responsive_menu' => array(
                    'menu_class' => 'u-align-center u-nav u-popupmenu-items u-unstyled u-nav-5',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-button-style u-nav-link',
                    'link_style' => 'padding: 10px;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link',
                    'submenu_link_style' => '',
                ),
                'theme_location' => 'menu principal',
                'template' => $menu_template,
            )); ?>
</header>
    
    <?php } ?>
    <div id="content">
