<?php get_header(); ?>
<main>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
  $current_post_id = get_the_ID();
  $post_terms = eco_planning_get_post_terms($current_post_id, ['works', 'voice']);
  ?>
  <div class="site-post-detail__first-view site-subpage-first-view">
    <section class="site-post-detail__fv">
      <div class="site-post-detail__fv-inner inner">
        <p class="site-post-detail__fv-title site-subpage-fv__title">case study</p>
        <p class="site-post-detail__fv-subtitle site-heading-subtitle--default">実績 / お客様の声</p>
        <?php if (function_exists('bcn_display')) { ?>
          <div class="breadcrumb site-post-detail__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList"><?php bcn_display(); ?></div>
        <?php } ?>
      </div>
    </section>
  </div>

  <article class="site-post-detail__article">
    <div class="site-post-detail__article-header">
      <div class="site-post-detail__meta">
        <?php if ($post_terms) : ?>
          <div class="site-post-detail__categories">
            <?php foreach ($post_terms as $post_term) : ?>
              <span class="site-post-detail__category"><?php echo esc_html($post_term->name); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <time class="site-post-detail__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
      </div>
      <h1 class="site-post-detail__article-title"><?php the_title(); ?></h1>
      <?php get_template_part('template-parts/social-share'); ?>
    </div>
    <div class="site-post-detail__content">
      <?php if (has_post_thumbnail()) : ?>
        <figure><?php the_post_thumbnail('full', ['alt' => the_title_attribute(['echo' => false])]); ?></figure>
      <?php else : ?>
        <figure><img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt=""></figure>
      <?php endif; ?>
      <?php the_content(); ?>
    </div>
    <?php get_template_part('template-parts/social-share', null, ['bottom' => true]); ?>
  </article>

  <section class="site-post-detail__related">
    <div class="inner site-post-detail__related-inner">
      <h2 class="site-post-detail__related-title site-heading--subpage-en">latest posts</h2>
      <p class="site-post-detail__related-subtitle site-heading-subtitle--default">新着記事</p>
      <div class="sub-case-study__cards site-post-detail__latest-cards">
        <?php
        $latest_posts = new WP_Query([
            'post_type'      => 'case',
            'posts_per_page' => 3,
            'post__not_in'   => [$current_post_id],
        ]);
        $card_number = 1;
        while ($latest_posts->have_posts()) : $latest_posts->the_post();
            get_template_part('template-parts/card-case', null, ['fallback_number' => $card_number, 'heading_tag' => 'h3']);
            $card_number++;
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
      <div class="site-archive-category site-post-detail__category-block" aria-labelledby="detail-category-title">
        <h2 id="detail-category-title" class="site-archive-category__title site-heading--small-en">category</h2>
        <div class="site-archive-category__groups">
          <div class="site-archive-category__group">
            <h3 class="site-archive-category__group-title">実績</h3>
            <div class="site-archive-category__list"><?php eco_planning_render_term_links('works'); ?></div>
          </div>
          <div class="site-archive-category__group">
            <h3 class="site-archive-category__group-title">お客様の声</h3>
            <div class="site-archive-category__list"><?php eco_planning_render_term_links('voice'); ?></div>
          </div>
        </div>
      </div>
      <div class="site-post-detail__archive-button-wrap">
        <a class="site-post-detail__archive-button site-wide-button site-wide-button--blue" href="<?php echo esc_url(get_post_type_archive_link('case')); ?>">
          <span>すべての記事一覧</span><span class="site-arrow-icon site-wide-button__icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-white.png')); ?>" alt=""></span>
        </a>
      </div>
    </div>
  </section>
  <?php get_template_part('template-parts/contact-visual', null, ['class' => 'site-post-detail__contact']); ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
