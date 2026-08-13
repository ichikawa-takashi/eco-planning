<?php get_header(); ?>
<main class="sub-contact__main">
    <div class="sub-contact__first-view site-subpage-first-view">
      <section class="sub-contact__fv site-subpage-fv">
        <div class="sub-contact__fv-image site-subpage-fv__image"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/contact/fv.jpg" alt="電話でお問い合わせに対応するスタッフ"></div>
        <div class="sub-contact__fv-heading site-subpage-fv__heading">
          <h1 class="sub-contact__fv-title site-subpage-fv__title">contact</h1>
          <p class="sub-contact__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">お問い合わせ</p>
        </div>
        <?php if (function_exists('bcn_display')) { ?>
          <div class="breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        <?php } ?>
      </section>
    </div>

  <section class="sub-contact__content">
      <div class="sub-contact__inner inner">
        <div class="sub-contact__body">
          <p class="sub-contact__introduction">以下のフォームに必要事項をご入力の上、ご登録ください。<br>担当部署よりご回答いたします。</p>
          <div class="js-contact-form-wrap" data-privacy-url="<?php echo esc_url(home_url('/company/#privacy')); ?>">
            <?php
echo do_shortcode(
  '[contact-form-7 id="5f31ae1" title="問い合わせフォーム" html_class="sub-contact__form"]'
);
?>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php get_footer(); ?>