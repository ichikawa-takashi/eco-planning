<?php
$light_header_body_classes = ['dismantling', 'industrial', 'waste'];
$current_body_classes = get_body_class();
$is_light_header = (bool) array_intersect($light_header_body_classes, $current_body_classes)
    || is_post_type_archive('job')
    || is_singular(['job', 'case', 'post']);
$header_classes = ['site-header'];

if ($is_light_header) {
    $header_classes[] = 'site-header--light';
}

$header_logo = $is_light_header ? 'logo-blue.png' : 'logo-white.png';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="<?php echo esc_attr(implode(' ', $header_classes)); ?>">
    <div class="site-header__inner">
      <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_theme_file_uri('/img/common/' . $header_logo)); ?>" alt="ECO PLANNING"<?php if (!$is_light_header) : ?> data-logo-default="<?php echo esc_url(get_theme_file_uri('/img/common/logo-white.png')); ?>" data-logo-scrolled="<?php echo esc_url(get_theme_file_uri('/img/common/logo-blue.png')); ?>"<?php endif; ?>>
      </a>

      <nav class="site-header__nav js-drawer" aria-label="グローバルナビゲーション">
        <ul class="site-header__nav-list">
          <li class="site-header__nav-item">
            <a class="site-header__nav-link" href="<?php echo esc_url(home_url('/benefit/')); ?>">私たちについて</a>
          </li>
          <li class="site-header__nav-item">
            <a class="site-header__nav-link" href="<?php echo esc_url(home_url('/service/')); ?>">事業紹介</a>
          </li>
          <li class="site-header__nav-item">
            <a class="site-header__nav-link" href="<?php echo esc_url(home_url('/case/')); ?>">実績・お客様の声</a>
          </li>
          <li class="site-header__nav-item">
            <a class="site-header__nav-link" href="<?php echo esc_url(home_url('/news/')); ?>">ニュース／スタッフ紹介</a>
          </li>
        </ul>

        <div class="site-header__buttons">
          <a class="site-header__button" href="<?php echo esc_url(home_url('/recruit/')); ?>">
            <span>recruit</span>
            <span class="site-arrow-icon site-header__button-icon" aria-hidden="true">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-blue.png" alt="">
            </span>
          </a>
          <a class="site-header__button site-header__button--contact" href="<?php echo esc_url(home_url('/contact/')); ?>">
            <span>contact</span>
            <span class="site-arrow-icon site-header__button-icon" aria-hidden="true">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-blue.png" alt="">
            </span>
          </a>
        </div>
      </nav>

      <button class="site-header__hamburger js-hamburger" type="button" aria-label="メニューを開く">
        <span class="site-header__hamburger-line"></span>
        <span class="site-header__hamburger-line"></span>
        <span class="site-header__hamburger-line"></span>
      </button>
    </div>
  </header>
