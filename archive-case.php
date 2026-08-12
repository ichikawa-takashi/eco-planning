<?php get_header(); ?>
<main>
  <div class="sub-case-study__first-view site-subpage-first-view">
    <section class="sub-case-study__fv site-subpage-fv">
      <div class="sub-case-study__fv-image site-subpage-fv__image">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/case-study/fv.jpg')); ?>" alt="お客様へのインタビュー">
      </div>
      <div class="sub-case-study__fv-heading site-subpage-fv__heading">
        <h1 class="sub-case-study__fv-title site-subpage-fv__title">case study</h1>
        <p class="sub-case-study__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">実績 / お客様の声</p>
      </div>
      <?php if (function_exists('bcn_display')) { ?>
        <div class="breadcrumb sub-case-study__breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList"><?php bcn_display(); ?></div>
      <?php } ?>
    </section>
  </div>

  <section class="site-archive-category site-archive-inner inner" aria-labelledby="archive-category-title">
    <h2 id="archive-category-title" class="site-archive-category__title site-heading--small-en">category</h2>
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
  </section>

  <section class="sub-case-study__archive site-archive-inner inner" aria-label="実績・お客様の声の記事一覧">
    <div class="sub-case-study__cards">
      <?php if (have_posts()) { ?>
        <?php $card_index = 0; ?>
        <?php while (have_posts()) { the_post(); $card_index++; ?>
          <?php get_template_part('template-parts/card', 'case', array('fallback_number' => (($card_index - 1) % 6) + 1)); ?>
        <?php } ?>
      <?php } else { ?>
        <p class="site-archive__empty">現在、記事はありません。</p>
      <?php } ?>
    </div>
    <?php eco_planning_render_pagination(); ?>
  </section>

  <?php get_template_part('template-parts/contact', 'visual', array('class' => 'sub-archive__contact')); ?>
</main>
<?php get_footer(); ?>
