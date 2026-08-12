<?php get_header(); ?>
<main class="sub-jobs">
  <div class="sub-jobs__first-view site-subpage-first-view">
    <section class="sub-jobs__fv site-subpage-fv">
      <div class="sub-jobs__fv-heading site-subpage-fv__heading">
        <h1 class="sub-jobs__fv-title site-subpage-fv__title">jobs</h1>
        <p class="sub-jobs__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">募集要項</p>
      </div>
      <?php if (function_exists('bcn_display')) { ?>
        <div class="breadcrumb sub-jobs__breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList"><?php bcn_display(); ?></div>
      <?php } ?>
    </section>
  </div>

  <section class="site-archive-category site-archive-inner inner" aria-labelledby="jobs-category-title">
    <h2 id="jobs-category-title" class="site-archive-category__title site-heading--small-en">category</h2>
    <div class="site-archive-category__groups">
      <div class="site-archive-category__group">
        <h3 class="site-archive-category__group-title">雇用形態</h3>
        <div class="site-archive-category__list"><?php eco_planning_render_term_links('employment', true); ?></div>
      </div>
    </div>
  </section>

  <section class="sub-jobs__archive site-archive-inner inner" aria-label="募集要項一覧">
    <div class="sub-jobs__cards">
      <?php if (have_posts()) { ?>
        <?php $card_index = 0; ?>
        <?php while (have_posts()) { the_post(); $card_index++; ?>
          <?php get_template_part('template-parts/card', 'job', array('fallback_number' => (($card_index - 1) % 3) + 1)); ?>
        <?php } ?>
      <?php } else { ?>
        <p class="site-archive__empty">現在、募集要項はありません。</p>
      <?php } ?>
    </div>
    <?php eco_planning_render_pagination(); ?>
  </section>

  <?php get_template_part('template-parts/recruit', 'entry', array('class' => 'sub-jobs__entry')); ?>
</main>
<?php get_footer(); ?>
