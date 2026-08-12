<?php
$fallback_number = isset($args['fallback_number']) ? (int) $args['fallback_number'] : 1;
$fallback_number = max(1, min(3, $fallback_number));
$area_terms = eco_planning_get_post_terms(get_the_ID(), ['area']);
$employment_terms = eco_planning_get_post_terms(get_the_ID(), ['employment']);
?>
<a class="sub-jobs__card" href="<?php the_permalink(); ?>">
  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('large', ['class' => 'sub-jobs__image', 'alt' => the_title_attribute(['echo' => false])]); ?>
  <?php else : ?>
    <img class="sub-jobs__image" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="">
  <?php endif; ?>
  <div class="sub-jobs__meta">
    <?php foreach ($area_terms as $area_term) : ?>
      <span class="sub-jobs__area"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-map.png')); ?>" alt=""><?php echo esc_html($area_term->name); ?></span>
    <?php endforeach; ?>
    <?php foreach ($employment_terms as $employment_term) : ?>
      <span class="sub-jobs__tag"><?php echo esc_html($employment_term->name); ?></span>
    <?php endforeach; ?>
  </div>
  <h2 class="sub-jobs__card-title"><?php the_title(); ?></h2>
</a>
