<?php get_header(); ?>
<main>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <?php
  $current_post_id = get_the_ID();
  $area_terms = eco_planning_get_post_terms($current_post_id, ['area']);
  $employment_terms = eco_planning_get_post_terms($current_post_id, ['employment']);
  $requirements = [
      '職種'       => eco_planning_get_field_value('job_position', $current_post_id),
      '仕事内容'   => eco_planning_get_field_value('job_description', $current_post_id),
      '雇用形態'   => eco_planning_get_field_value('job_employment_type', $current_post_id),
      '勤務時間'   => eco_planning_get_field_value('job_working_hours', $current_post_id),
      '勤務地'     => eco_planning_get_field_value('job_location', $current_post_id),
      '最寄駅'     => eco_planning_get_field_value('job_nearest_station', $current_post_id),
      '給与'       => eco_planning_get_field_value('job_salary', $current_post_id),
      '休日・休暇' => eco_planning_get_field_value('job_holidays', $current_post_id),
      '福利厚生'   => eco_planning_get_field_value('job_benefits', $current_post_id),
      'その他要件' => eco_planning_get_field_value('job_requirements', $current_post_id),
  ];
  $requirements = array_filter($requirements, static function ($value) {
      return '' !== trim(wp_strip_all_tags((string) $value));
  });
  ?>

  <div class="sub-jobs__first-view site-subpage-first-view">
    <section class="sub-jobs__fv site-subpage-fv">
      <div class="sub-jobs__fv-heading site-subpage-fv__heading">
        <p class="sub-jobs__fv-title site-subpage-fv__title">jobs</p>
        <p class="sub-jobs__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">募集要項</p>
      </div>
      <?php if (function_exists('bcn_display')) { ?>
        <div class="breadcrumb sub-jobs__breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList"><?php bcn_display(); ?></div>
      <?php } ?>
    </section>
  </div>

  <article class="sub-jobs-detail__article inner">
    <div class="sub-jobs-detail__article-header">
      <div class="sub-jobs-detail__article-copy">
        <div class="sub-jobs-detail__meta">
          <?php foreach ($area_terms as $area_term) : ?>
            <span class="sub-jobs-detail__area"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-map-blue.png')); ?>" alt=""><?php echo esc_html($area_term->name); ?></span>
          <?php endforeach; ?>
          <?php foreach ($employment_terms as $employment_term) : ?>
            <span class="sub-jobs-detail__tag"><?php echo esc_html($employment_term->name); ?></span>
          <?php endforeach; ?>
        </div>
        <h1 class="sub-jobs-detail__article-title"><?php the_title(); ?></h1>
        <?php if (has_excerpt()) : ?><p class="sub-jobs-detail__article-lead"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
      </div>
      <figure class="sub-jobs-detail__main-visual">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('full', ['alt' => the_title_attribute(['echo' => false])]); ?>
        <?php else : ?>
          <img src="<?php echo esc_url(get_theme_file_uri('/img/common/no-image.jpg')); ?>" alt="">
        <?php endif; ?>
      </figure>
    </div>

    <div class="sub-jobs-detail__editor-content site-post-detail__content">
      <?php the_content(); ?>
    </div>
  </article>

  <?php if ($requirements) : ?>
    <section class="sub-jobs-detail__requirements inner" aria-labelledby="jobs-requirements-title">
      <h2 id="jobs-requirements-title" class="sub-jobs-detail__requirements-title">募集要項</h2>
      <dl class="sub-jobs-detail__requirements-list">
        <?php foreach ($requirements as $label => $value) : ?>
          <div class="sub-jobs-detail__requirements-row">
            <dt><?php echo esc_html($label); ?></dt>
            <dd><?php echo wp_kses_post($value); ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
      <div class="sub-jobs-detail__requirements-button-wrap">
        <a class="sub-jobs-detail__requirements-button site-wide-button site-wide-button--blue" href="<?php echo esc_url(home_url('/contact/?subject=recruit')); ?>">
          <span>エントリーはこちら</span>
          <span class="site-arrow-icon site-wide-button__icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-white.png')); ?>" alt=""></span>
        </a>
      </div>
    </section>
  <?php endif; ?>

  <section class="sub-recruit__jobs sub-jobs-detail__related">
    <div class="sub-recruit__jobs-inner inner">
      <div class="sub-recruit__jobs-heading">
        <h2 class="sub-recruit__jobs-title site-heading--subpage-en">jobs</h2>
        <p class="sub-recruit__jobs-subtitle site-heading-subtitle--default">その他の募集要項</p>
      </div>
      <div class="sub-recruit__jobs-list">
        <?php
        $related_jobs = new WP_Query([
            'post_type'      => 'job',
            'posts_per_page' => 3,
            'post__not_in'   => [$current_post_id],
        ]);
        $card_number = 1;
        while ($related_jobs->have_posts()) : $related_jobs->the_post();
            get_template_part('template-parts/card-job-related', null, ['fallback_number' => $card_number]);
            $card_number++;
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
      <div class="sub-recruit__jobs-bottom">
        <a class="sub-recruit__jobs-button site-wide-button site-wide-button--blue" href="<?php echo esc_url(get_post_type_archive_link('job')); ?>">
          <span>募集要項一覧</span>
          <span class="site-arrow-icon site-wide-button__icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-white.png')); ?>" alt=""></span>
        </a>
      </div>
    </div>
  </section>

  <?php get_template_part('template-parts/recruit-entry', null, ['class' => 'sub-jobs-detail__entry']); ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
