<?php get_header(); ?>

<div class="grid content">
  <div class="grid_row">
    <div class="grid_column grid_column--9 app_content content">
      <div class="grid_row">
        <div class="grid_column grid_column--12">
          <?php
            $args = array(
              'render_post_date' => False,
            );

            echo render_post_as_grid_item(get_post(), '12', '', 'full', $args);
          ?>
        </div>
      </div>

      <div class="grid_row">
        <div class="grid_column grid_column--12">
          <?php
            $post_id = $post->ID;
            $materials = get_field('material', $post_id);

            if($materials && is_array($materials)) {
          ?>
            <h2><?php pll_e('Material') ?></h2>
            <ul class="material">
              <?php
                foreach($materials as $material) {
                  echo render_material($material, $post_id);
                }
              ?>
            </ul>

          <?php
            }
           ?>
        </div>
      </div>
    </div>

    <div class="grid_column grid_column--3 app_aside aside">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
