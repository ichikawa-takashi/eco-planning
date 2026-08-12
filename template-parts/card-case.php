<?php
$fallback_number = isset($args['fallback_number']) ? (int) $args['fallback_number'] : 1;
$fallback_number = max(1, min(6, $fallback_number));
$terms = eco_planning_get_post_terms(get_the_ID(), ['works', 'voice']);
$client_name = eco_planning_get_field_value('case_client_name');
$heading_tag = isset($args['heading_tag']) && in_array($args['heading_tag'], ['h2', 'h3'], true) ? $args['heading_tag'] : 'h2';
?>
<article class="sub-case-study__card">
  <div class="sub-case-study__thumbnail">
    <?php if (has_post_thumbnail()) : ?>
      <?php the_post_thumbnail('large', ['alt' => the_title_attribute(['echo' => false])]); ?>
    <?php else : ?>
      <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="">
    <?php endif; ?>
  </div>
  <div class="sub-case-study__card-body">
    <?php if ($terms) : ?>
      <div class="sub-case-study__tags">
        <?php foreach ($terms as $term) : ?><span class="sub-case-study__tag"><?php echo esc_html($term->name); ?></span><?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if ($client_name) : ?><p class="sub-case-study__company"><?php echo esc_html($client_name); ?></p><?php endif; ?>
    <<?php echo esc_attr($heading_tag); ?> class="sub-case-study__card-title"><?php the_title(); ?></<?php echo esc_attr($heading_tag); ?>>
    <a class="sub-case-study__link" href="<?php the_permalink(); ?>"><span>詳しくはこちら</span><span class="site-arrow-icon sub-case-study__link-icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-white.png')); ?>" alt=""></span></a>
  </div>
</article>
