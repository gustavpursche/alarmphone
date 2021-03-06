<?php get_header(); ?>

<div class="grid">
  <div class="grid_row">
    <div class="grid_column grid_column--9 app_content">
      <div class="grid_row">
        <div class="grid_column grid_column--12">
          <?php
            $qu = get_queried_object();
            $options = array();

            if(!$qu) {
              return;
            }

            $args = array(
              'post_type' => 'media-review',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'lang' => 'en',
            );
          ?>

          <h1 class="headline headline--h1"><?php pll_e('Media Reviews'); ?></h1>

          <div class="release">
            <?php
              $taxonomy_items = get_terms('langgroups');
              $post_args = array(
                'render_post_text' => true,
                'text_to_teaser' => true,
                'strip_tags' => true,
              );

              if($taxonomy_items) {
                foreach($taxonomy_items as $taxonomy_item) {
                  // query for taxonomy slug
                  $args['tax_query'] = array(
                    array(
                      'taxonomy' => 'langgroups',
                      'field' => 'id',
                      'terms' => $taxonomy_item->term_id,
                    )
                  );
                  $posts = query_posts($args);
                  $taxonomy_item_name = $taxonomy_item->name;

                  echo '<div class="grid_row">';
                    echo '<h2>' . esc_html($taxonomy_item_name) . '</h2>';
                  echo '</div>';

                  foreach($posts as $post) {
                    echo '<div class="grid_row">';
                      echo render_blog_post($post, '12', 'release_item', 'preview', $post_args);
                    echo '</div>';
                  }
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="grid_column grid_column--3 app_aside aside">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
