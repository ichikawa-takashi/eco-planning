<footer class="site-footer">
    <div class="site-footer__inner inner">
      <div class="site-footer__top">
        <div class="site-footer__brand">
          <a class="site-footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/logo-blue.png" alt="ECO PLANNING">
          </a>
          <div class="site-footer__certifications">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/logo-mems.png" alt="M-EMS">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/logo-sdgs.png" alt="SDGs">
          </div>
        </div>

        <div class="site-footer__navigation">
          <nav class="site-footer__nav" aria-label="フッターナビゲーション">
            <div class="site-footer__nav-group">
              <a class="site-footer__nav-heading" href="<?php echo esc_url(home_url('/benefit/')); ?>">私たちについて</a>
              <a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a>
            </div>
            <div class="site-footer__nav-group">
              <a class="site-footer__nav-heading" href="<?php echo esc_url(home_url('/service/')); ?>">事業紹介</a>
              <a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/dismantling/')); ?>">解体・アスベスト除去</a>
              <a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/industrial/')); ?>">産業廃棄物回収</a>
              <a class="site-footer__nav-link" href="<?php echo esc_url(home_url('/waste/')); ?>">産業廃棄物持ち込み</a>
            </div>
            <div class="site-footer__nav-group">
              <a class="site-footer__nav-heading" href="<?php echo esc_url(home_url('/case/')); ?>">実績 / お客様の声</a>
              <a class="site-footer__nav-heading" href="<?php echo esc_url(home_url('/news/')); ?>">ニュース / スタッフ紹介</a>
              <a class="site-footer__nav-heading" href="<?php echo esc_url(home_url('/job-description/')); ?>">募集要項一覧</a>
            </div>
          </nav>

          <div class="site-footer__buttons">
            <a class="site-footer__button site-footer__button--recruit" href="<?php echo esc_url(home_url('/recruit/')); ?>">
              <span>recruit</span>
              <span class="site-arrow-icon site-footer__button-icon" aria-hidden="true">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-white.png" alt="">
              </span>
            </a>
            <a class="site-footer__button site-footer__button--contact" href="<?php echo esc_url(home_url('/contact/')); ?>">
              <span>contact</span>
              <span class="site-arrow-icon site-footer__button-icon" aria-hidden="true">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-white.png" alt="">
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="site-footer__concept">
        <img class="site-footer__concept-mark" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/concept-mark.png" alt="">
        <p class="site-footer__concept-copy">
          誠実に、<br>
          つくそう。
        </p>
      </div>

      <div class="site-footer__bottom">
        <div class="site-footer__information">
          <p class="site-footer__description">解体工事、収集運搬、産廃処理なら三重県津市の株式会社エコ・プランニング</p>
          <p class="site-footer__copyright">Copyright © <?php echo wp_date("Y");?> Eco planning. All right reserved.</p>
        </div>

        <div class="site-footer__socials">
          <a class="site-footer__social-link" href="https://line.me/R/ti/p/@lia0806h" target="_blank" rel="noopener noreferrer" aria-label="LINE">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-line.png" alt="">
          </a>
          <a class="site-footer__social-link" href="https://www.facebook.com/ecopla123/?locale=ja_JP" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-facebook.png" alt="">
          </a>
          <a class="site-footer__social-link" href="https://x.com/ecopla3003" target="_blank" rel="noopener noreferrer" aria-label="X">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-x.png" alt="">
          </a>
          <a class="site-footer__social-link" href="https://www.instagram.com/ecoplanning_official/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-instagram.png" alt="">
          </a>
          <a class="site-footer__social-link" href="https://www.youtube.com/@%E3%82%A8%E3%82%B3%E3%83%97%E3%83%A9%E3%81%A1%E3%82%83%E3%82%93%E3%81%AD%E3%82%8B%E3%83%BC%E4%B8%89%E9%87%8D%E3%81%8B%E3%82%89%E4%B8%96%E7%95%8C" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-youtube.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>

</html>
