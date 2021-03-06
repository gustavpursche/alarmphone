<?php
  $page_title = wp_title('', false);
  $page_description = get_bloginfo('description');
  $page_name = get_bloginfo('name');
  $css_directory = get_bloginfo('template_directory');

  $donation_url = get_field('donation_button_url', 'option');

  if( !$page_title ) {
    $page_title = __($page_name);
  } else {
    $page_title .= ' | ' . __($page_name);
  }

  if(!is_front_page() && !is_home()) {
    $home = esc_url( home_url( '/' ) );
  }
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <title>
      <?php echo $page_title; ?>
    </title>

    <link rel="stylesheet"
          href="<?php bloginfo('stylesheet_url'); ?>"
          type="text/css" />
    <meta name="viewport"
          content="initial-scale=1" />
    <link rel="shortcut icon"
          href="<?php bloginfo('template_url'); ?>/favicon.png" />
    <link rel="alternate"
          type="application/rss+xml"
          title="<?php echo $page_name; ?>"
          href="<?php bloginfo('rss2_url'); ?>" />

    <?php
      if( $page_description ) {
    ?>

      <meta name="description"
            content="<?php echo wp_strip_all_tags( $page_description ); ?>" />

    <?php
      }

      wp_head();
    ?>
  </head>
  <body>
    <div class="app">

      <header class="grid app_header header">
        <div class="grid_row">
          <div class="header_service">
            <div class="grid">
              <div class="grid_row">
                <div class="grid_column grid_column--9 header_service-social-col">
                  <div class="header_service-item">
                    <?php echo render_social_menu(); ?>
                  </div>
                </div>
                <div class="grid_column grid_column--3 header_service-service">
                  <?php echo render_donation_menu(); ?>

                  <?php
                    if(function_exists('pll_the_languages')) {
                      echo render_language_select();
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="grid_row header_brand-phone-container">
          <div class="grid_column grid_column--3 header_phone">
            <div class="header_phone-inner">
              <div class="header_phone-text">
                <p class="header_phone-label"><?php pll_e('In case of emergency call'); ?></p>
                <a href="tel:<?php pll_e('+334 86 51 71 61'); ?>"
                   class="header_phone-number headline headline--h3"><?php pll_e('+334 86 51 71 61'); ?></a>
              </div>
            </div>
          </div>

          <div class="grid_column grid_column--9 header_brand u-cf">
            <?php
              if(isset($home)) {
            ?>
              <a href="<?php echo $home ?>"
                 rel="nofollow">
            <?php
              }
            ?>

              <svg class="header_logo"
                   xmlns="http://www.w3.org/2000/svg"
                   width="141.73"
                   height="141.73"
                   viewBox="0 0 141.73 141.73">
                <title><?php pll_e('Alarmphone Logo'); ?></title>
                <path fill="#fff" d="M68.322 69.537c-.203.203-.305.45-.305.743v4.136c0 .277.106.52.317.73.21.21.454.316.73.316h4.187c.28 0 .52-.105.71-.316s.29-.453.29-.73V70.28c0-.308-.09-.56-.29-.755s-.43-.292-.7-.292h-4.19c-.29 0-.54.1-.74.304m-4.73-2.543h15.13V50.64H63.59v16.354zm52.19-2.4c.42 2.21.63 4.41.63 6.61s-.21 4.403-.63 6.612c-.42 2.207-1.05 4.344-1.89 6.41-.84 2.064-1.9 4.068-3.17 6.014-1.27 1.947-2.75 3.756-4.42 5.428l-4.87-4.875c1.797-1.797 3.297-3.766 4.5-5.908 1.235-2.17 2.14-4.38 2.72-6.633.58-2.25.867-4.6.87-7.047-.003-2.428-.294-4.774-.876-7.04-.594-2.275-1.5-4.488-2.71-6.64-1.215-2.15-2.72-4.12-4.503-5.91l4.874-4.874c1.674 1.68 3.15 3.49 4.424 5.43s2.334 3.95 3.176 6.02c.84 2.07 1.472 4.2 1.892 6.41m-14.74-1.22c1.04 2.59 1.557 5.2 1.55 7.83.007 2.63-.51 5.24-1.55 7.83-1.033 2.58-2.543 4.87-4.53 6.86l-4.91-4.91c1.32-1.32 2.33-2.85 3.04-4.59.69-1.72 1.03-3.45 1.03-5.19 0-1.74-.35-3.47-1.045-5.2-.685-1.72-1.694-3.24-3.023-4.57l4.91-4.9c1.99 1.98 3.5 4.27 4.53 6.85m-19.51 21.8c0 1.12-.37 2.08-1.12 2.87-.74.8-1.67 1.22-2.77 1.27-.015 0-.052.01-.11.03-.055.02-.1.02-.13.02H64.93c-.034 0-.078-.01-.135-.02-.057-.02-.094-.025-.11-.025-1.103-.05-2.028-.47-2.774-1.267s-1.12-1.752-1.12-2.87V49.06c0-1.138.41-2.11 1.22-2.923.81-.812 1.79-1.217 2.92-1.217.52-.115 1.3-.196 2.34-.245 1.04-.05 2.34-.073 3.9-.073 3.15 0 5.23.105 6.23.316 1.14 0 2.11.405 2.92 1.217s1.22 1.785 1.22 2.92V85.17zm-34.9-13.98c0 1.74.344 3.47 1.03 5.19.71 1.74 1.72 3.27 3.04 4.59L45.82 85.9c-1.986-1.99-3.5-4.273-4.53-6.854-1.04-2.592-1.556-5.2-1.547-7.83-.01-2.63.507-5.24 1.548-7.83 1.04-2.582 2.55-4.866 4.538-6.855l4.904 4.91c-1.33 1.33-2.34 2.856-3.03 4.576-.69 1.73-1.04 3.47-1.04 5.21m-5.73-19.59c-1.78 1.79-3.29 3.76-4.5 5.91-1.21 2.15-2.11 4.37-2.71 6.64-.58 2.27-.87 4.61-.87 7.04 0 2.45.29 4.8.87 7.05.58 2.25 1.49 4.47 2.72 6.64 1.21 2.14 2.71 4.11 4.51 5.91l-4.88 4.88c-1.67-1.672-3.15-3.48-4.422-5.43-1.275-1.943-2.334-3.95-3.175-6.012-.84-2.062-1.47-4.2-1.892-6.41-.42-2.21-.63-4.41-.63-6.61s.21-4.4.63-6.61c.423-2.21 1.054-4.344 1.895-6.41.84-2.063 1.9-4.07 3.18-6.014 1.28-1.95 2.75-3.76 4.43-5.43l4.88 4.873zm90.77 19.09c0-33.68-27.31-61-61-61s-61 27.32-61 61c0 33.69 27.31 61 61 61s61-27.31 61-61"/>
              </svg>

            <?php
              if(isset($home)) {
            ?>
              </a>
            <?php
              }
            ?>


            <div class="header_title">
              <?php
                if(isset($home)) {
              ?>
                  <a href="<?php echo $home; ?>"
                    class="header_title-link">

              <?php
                }
              ?>

              <p class="header_title-preheadline">
                <?php pll_e('Watch the med'); ?>
              </p>
              <strong class="header_title-headline headline headline--h1">
                <?php pll_e('Alarmphone'); ?>
              </strong>
              <p class="header_title-postheadline">
                <?php pll_e('Hotline for boatpeople in distress. No rescue, but Alarm.'); ?>
              </p>

              <?php
                if(isset($home)) {
              ?>
                </a>
              <?php
                }
              ?>
            </div>

          </div>
        </div>

        <div class="grid_row">
          <nav class="grid_column grid_column--12 header_navigation">
            <?php
              if(has_nav_menu( 'primary' )) {
                wp_nav_menu( array(
      						'menu_class'     => 'header_navigation-container',
      						'theme_location' => 'primary',
      					) );
              }
            ?>
          </nav>
        </div>
      </header>
