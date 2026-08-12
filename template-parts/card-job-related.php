<?php
$fallback_number = isset($args['fallback_number']) ? (int) $args['fallback_number'] : 1;
$fallback_number = max(1, min(3, $fallback_number));
$area_terms = eco_planning_get_post_terms(get_the_ID(), ['area']);
$employment_terms = eco_planning_get_post_terms(get_the_ID(), ['employment']);
?>
<article class="sub-recruit__jobs-card">
  <a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('large', ['class' => 'sub-recruit__jobs-image', 'alt' => the_title_attribute(['echo' => false])]); ?>
    <?php else : ?>
      <img class="sub-recruit__jobs-image" src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="">
    <?php endif; ?>
  </a>
  <div class="sub-recruit__jobs-meta">
    <?php foreach ($area_terms as $area_term) : ?>
      <span class="sub-recruit__jobs-area"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-map.png')); ?>" alt=""><?php echo esc_html($area_term->name); ?></span>
    <?php endforeach; ?>
    <?php foreach ($employment_terms as $employment_term) : ?>
      <span class="sub-recruit__jobs-tag"><?php echo esc_html($employment_term->name); ?></span>
    <?php endforeach; ?>
  </div>
  <h3 class="sub-recruit__jobs-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</article>
