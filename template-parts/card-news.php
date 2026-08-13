<?php
$fallback_number = isset($args['fallback_number']) ? (int) $args['fallback_number'] : 1;
$fallback_number = max(1, min(9, $fallback_number));
$terms = eco_planning_get_post_terms(get_the_ID(), ['category', 'staff']);
$heading_tag = isset($args['heading_tag']) && in_array($args['heading_tag'], ['h2', 'h3'], true) ? $args['heading_tag'] : 'h2';
?>
<article class="sub-news__card">
  <a class="sub-news__card-link" href="<?php the_permalink(); ?>">
    <div class="sub-news__thumbnail">
      <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large', ['alt' => the_title_attribute(['echo' => false])]); ?>
      <?php else : ?>
        <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="">
      <?php endif; ?>
    </div>
    <div class="sub-news__card-body">
      <?php if ($terms) : ?>
        <div class="sub-news__categories">
          <?php foreach ($terms as $term) : ?>
            <span class="sub-news__category"><?php echo esc_html($term->name); ?></span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <<?php echo esc_attr($heading_tag); ?> class="sub-news__card-title"><?php the_title(); ?></<?php echo esc_attr($heading_tag); ?>>
      <span class="sub-news__link"><span>詳しくはこちら</span><span class="site-arrow-icon sub-news__link-icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-white.png')); ?>" alt=""></span></span>
    </div>
  </a>
</article>
