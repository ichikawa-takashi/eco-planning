<section class="sub-recruit__entry <?php echo isset($args['class']) ? esc_attr($args['class']) : ''; ?>">
  <div class="sub-recruit__entry-inner">
    <div class="sub-recruit__entry-background">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/recruit/entry.jpg')); ?>" alt="現場で働くエコ・プランニングのスタッフ">
    </div>
    <div class="sub-recruit__entry-content">
      <h2 class="sub-recruit__entry-title site-heading--section-en">entry</h2>
      <p class="sub-recruit__entry-subtitle site-heading-subtitle--default">エントリー</p>
      <p class="sub-recruit__entry-lead">常に変化し続けて<br>私たちと成長しませんか</p>
      <a class="sub-recruit__entry-button site-wide-button site-wide-button--white" href="<?php echo esc_url(home_url('/contact/?subject=recruit')); ?>">
        <span>エントリーはこちら</span>
        <span class="site-arrow-icon site-wide-button__icon" aria-hidden="true">
          <img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-blue.png')); ?>" alt="">
        </span>
      </a>
    </div>
  </div>
</section>
