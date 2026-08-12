<?php get_header(); ?>
<main class="sub-thanks__main">
    <div class="sub-thanks__first-view site-subpage-first-view">
      <section class="sub-thanks__fv site-subpage-fv">
        <div class="sub-thanks__fv-image site-subpage-fv__image"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/contact/thanks-fv.jpg" alt="笑顔で手を振るエコ・プランニングのスタッフ"></div>
        <div class="sub-thanks__fv-heading site-subpage-fv__heading">
          <h1 class="sub-thanks__fv-title site-subpage-fv__title">thank you!</h1>
          <p class="sub-thanks__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">送信完了</p>
        </div>
        <?php if (function_exists('bcn_display')) { ?>
          <div class="breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        <?php } ?>
      </section>
    </div>

  <section class="sub-thanks__message">
      <div class="sub-thanks__message-inner inner">
        <h2 class="sub-thanks__message-title">お問い合わせありがとうございます</h2>
        <p class="sub-thanks__message-text">この度は弊社へお問い合わせいただき、誠にありがとうございます。<br>3営業日までに弊社担当者から返信をさせていただきますので、今しばらくお待ちください。</p>
        <a class="sub-thanks__back-button site-wide-button site-wide-button--blue" href="<?php echo esc_url(home_url('/')); ?>">
          <span>TOPへ戻る</span>
          <span class="site-arrow-icon site-wide-button__icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-white.png" alt=""></span>
        </a>
      </div>
    </section>

    <section class="site-post-detail__related sub-thanks__related">
      <div class="inner site-post-detail__related-inner">
        <h2 class="site-post-detail__related-title site-heading--subpage-en">latest posts</h2>
        <p class="site-post-detail__related-subtitle site-heading-subtitle--default">新着記事</p>

        <div class="sub-news__cards site-post-detail__latest-cards">
          <?php
          $thanks_news_query = new WP_Query([
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 3,
            'no_found_rows'       => true,
            'ignore_sticky_posts' => true,
            'tax_query'           => [[
              'taxonomy' => 'staff',
              'operator' => 'NOT EXISTS',
            ]],
          ]);
          ?>
          <?php if ($thanks_news_query->have_posts()) : ?>
            <?php $thanks_news_index = 0; ?>
            <?php while ($thanks_news_query->have_posts()) : $thanks_news_query->the_post(); ?>
              <?php
              $thanks_news_index++;
              get_template_part('template-parts/card', 'news', [
                'fallback_number' => $thanks_news_index,
                'heading_tag'     => 'h3',
              ]);
              ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <p class="site-archive__empty">現在、記事はありません。</p>
          <?php endif; ?>
        </div>

        <div class="site-archive-category site-post-detail__category-block" aria-labelledby="thanks-category-title">
          <h2 id="thanks-category-title" class="site-archive-category__title site-heading--small-en">category</h2>
          <div class="site-archive-category__groups">
            <div class="site-archive-category__group">
              <h3 class="site-archive-category__group-title">ニュース</h3>
              <div class="site-archive-category__list">
                <?php eco_planning_render_term_links('category'); ?>
              </div>
            </div>
            <div class="site-archive-category__group">
              <h3 class="site-archive-category__group-title">スタッフ紹介</h3>
              <div class="site-archive-category__list">
                <?php eco_planning_render_term_links('staff'); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="site-post-detail__archive-button-wrap">
          <a class="site-post-detail__archive-button site-wide-button site-wide-button--blue" href="<?php echo esc_url(home_url('/news/')); ?>">
            <span>すべての記事一覧</span>
            <span class="site-arrow-icon site-wide-button__icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-white.png" alt=""></span>
          </a>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
