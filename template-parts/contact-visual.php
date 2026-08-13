<section class="site-contact-section <?php echo isset($args['class']) ? esc_attr($args['class']) : ''; ?>">
  <div class="site-contact site-contact--visual">
    <div class="site-contact__background">
      <img src="<?php echo esc_url(get_theme_file_uri('/img/common/contact-bg.jpg')); ?>" alt="">
    </div>
    <div class="site-contact__visual-content">
      <div class="site-contact__heading">
        <h2 class="site-contact__title site-heading--section-en">contact</h2>
        <p class="site-contact__subtitle site-heading-subtitle--default">お問い合わせ</p>
      </div>
      <p class="site-contact__lead">
        解体、産業廃棄物回収・持込、<br>
        不用品回収からハウスクリーニングまで<br>
        お困りごとは何でもお気軽にご相談ください。
      </p>

      <div class="site-contact__list">
        <div class="site-contact__card site-contact__card--phone">
          <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-contact-phone.png')); ?>" alt="">
          <p class="site-contact__card-title">お電話でのお問い合わせ</p>
          <a class="site-contact__phone-number" href="tel:0595833330">0595-83-3330</a>
          <p class="site-contact__note">お電話の際に「ホームページを見て」<br>とお伝えください。</p>
        </div>

        <div class="site-contact__card site-contact__card--mail">
          <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-contact-mail.png')); ?>" alt="">
          <p class="site-contact__card-title">メールでのお問い合わせ</p>
          <a class="site-contact__button" href="<?php echo esc_url(home_url('/contact/')); ?>">
            <span>お問い合わせ</span>
            <span class="site-arrow-icon site-contact__button-icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-blue.png')); ?>" alt=""></span>
          </a>
        </div>

        <div class="site-contact__card site-contact__card--line">
          <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri('/img/common/icon-contact-line.png')); ?>" alt="">
          <p class="site-contact__card-title">LINEでのお問い合わせ</p>
          <a class="site-contact__button" href="https://line.me/R/ti/p/@lia0806h" target="_blank" rel="noopener noreferrer">
            <span>LINE 友達追加</span>
            <span class="site-arrow-icon site-contact__button-icon" aria-hidden="true"><img src="<?php echo esc_url(get_theme_file_uri('/img/common/arrow-blue.png')); ?>" alt=""></span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
