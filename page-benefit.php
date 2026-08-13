<?php get_header(); ?>
<main>
    <div class="sub-about__first-view site-subpage-first-view">
      <section class="sub-about__fv site-subpage-fv">
        <div class="sub-about__fv-image site-subpage-fv__image">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/fv.jpg" alt="夕日に染まる都市の風景">
        </div>
  
        <div class="sub-about__fv-heading site-subpage-fv__heading">
          <h1 class="sub-about__fv-title site-subpage-fv__title">about us</h1>
          <p class="sub-about__fv-subtitle site-subpage-fv__subtitle site-heading-subtitle--default">私たちについて</p>
        </div>
  
        <?php if (function_exists('bcn_display')) { ?>
          <div class="breadcrumb site-subpage-fv__breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        <?php } ?>
      </section>
    </div>

  <section class="sub-about__introduction">
      <div class="sub-about__introduction-inner inner">
        <div class="sub-about__introduction-heading">
          <h2 class="sub-about__introduction-title site-heading--page-jp">誠実に、つくそう</h2>
          <p class="sub-about__introduction-subtitle site-heading-subtitle--en">Let's serve sincerely</p>
        </div>

        <div class="sub-about__introduction-texts">
          <p class="sub-about__introduction-text">誠実に、つくそう。</p>
          <p class="sub-about__introduction-text">街は集合体だ。</p>
          <p class="sub-about__introduction-text">建物が建つ。人が集まる。<br>だからこそ、不要なモノも生まれる。</p>
          <p class="sub-about__introduction-text">時間の流れと共に新陳代謝を繰り返す街を<br>持続化させる為に、私たちは存在している。</p>
          <p class="sub-about__introduction-text">私たちは解体工事と産業廃棄物処理を<br>ワンストップで行う会社です。</p>
          <p class="sub-about__introduction-text">いま目の前にある問題につくし、<br>街の純度を高め、人々の暮らしを守ります。</p>
        </div>
      </div>
    </section>

    <section class="sub-about__gallery site-loop-gallery" aria-label="私たちの取り組み">
      <div class="sub-about__gallery-track site-loop-gallery__track js-loop-gallery-track">
        <div class="sub-about__gallery-item site-loop-gallery__item">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/gallery-01.jpg" alt="都市の風景">
        </div>
        <div class="sub-about__gallery-item site-loop-gallery__item">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/gallery-02.jpg" alt="街を歩く女性">
        </div>
        <div class="sub-about__gallery-item site-loop-gallery__item">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/gallery-03.jpg" alt="資料を手渡す女性">
        </div>
        <div class="sub-about__gallery-item site-loop-gallery__item">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/gallery-04.jpg" alt="街を行き交う人々">
        </div>
      </div>
    </section>

    <section class="sub-about__message">
      <div class="sub-about__message-inner inner">
        <h2 class="sub-about__message-title site-heading--primary-jp">
          社会に驚きと変化を。<br>
          既存の枠を超えた挑戦を続ける
        </h2>

        <div class="sub-about__message-texts">
          <p class="sub-about__message-text">
            「解体屋らしくない」と言われることがあります。それは私たちにとって、誇りです。常識の逆張りを楽しみ、世の中に驚きと変化を与えたい。まず一歩を踏み出すスピード感を大切に、既存の枠にとらわれない自由な発想で、社会に新しい「ワクワク」を創り出すことを目指しています。誰よりも「この街をさらに綺麗にしたい」「澄んだ空気を皆様に届けたい」という想いを持ち、「誠実さ」を武器に関わるすべての方々の日常に彩りをもたらせるよう、今後も邁進してまいります。
          </p>
          <p class="sub-about__message-text">
            蛇口をひねれば水が出る。そんな「当たり前」を守る、普段は意識されることのないインフラでありたい。私たちの仕事は、街の代謝を支える縁の下の領域にあります。建物を解体し、廃棄物を適正に処理する。誰も見ていない場所で、誰かの平穏な日常を守り抜く。私たちはこの事業を「誠実さ」を武器として展開しながら、既存の枠にとどまらない挑戦で「新しいワクワク」を創り出し続けています。社会の「土台」を支える責任と誇りを持って、街の新しい未来を皆様とともに築いてまいります。
          </p>
          <p class="sub-about__message-text">
            私は、解体工事や廃棄物処理の仕事を、単なる「きつい仕事」ではなく、街を整え、人々の暮らしを守る誇りある仕事だと考えています。だからこそ、業界に残る古い3Kのイメージを変え、社員一人ひとりが前向きに、ワクワクしながら挑戦できる「新3K」の会社をつくりたい。誠実に人と現場に向き合いながら、エコ・プランニングらしい未来を育てていきます。
          </p>
        </div>
      </div>
    </section>

    <section class="sub-about__representative">
      <div class="sub-about__representative-inner">
        <div class="sub-about__representative-image">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/representative.jpg" alt="株式会社エコ・プランニング代表取締役 吉田孔顕">
        </div>

        <div class="sub-about__representative-content">
          <p class="sub-about__representative-position">株式会社エコ・プランニング 代表取締役</p>
          <h2 class="sub-about__representative-name">吉田 孔顕</h2>

          <h3 class="sub-about__representative-profile-title">代表プロフィール</h3>
          <dl class="sub-about__representative-profile">
            <div class="sub-about__representative-profile-row">
              <dt>2002年</dt>
              <dd>私立鈴鹿中学6年制　卒業</dd>
            </div>
            <div class="sub-about__representative-profile-row">
              <dt>2006年</dt>
              <dd>兵庫県私立芦屋大学　卒業</dd>
            </div>
            <div class="sub-about__representative-profile-row">
              <dt>2009年</dt>
              <dd>アメリカ合衆国ニューヨーク州NCLC校　留学</dd>
            </div>
            <div class="sub-about__representative-profile-row">
              <dt>2012年</dt>
              <dd>株式会社エコ・プランニング　入社</dd>
            </div>
            <div class="sub-about__representative-profile-row">
              <dt>2014年</dt>
              <dd>株式会社エコ・プランニング　代表取締役　就任</dd>
            </div>
          </dl>
        </div>
      </div>
    </section>

    <section class="sub-about__principles">
      <article class="sub-about__principle">
        <div class="sub-about__principle-image">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/vision.jpg" alt="解体現場に立つエコ・プランニングのスタッフ">
        </div>
        <div class="sub-about__principle-inner inner">
          <div class="sub-about__principle-heading">
            <h2 class="sub-about__principle-title site-heading--subpage-en">vision</h2>
            <p class="sub-about__principle-subtitle site-heading-subtitle--default">私たちの使命</p>
          </div>
          <div class="sub-about__principle-content">
            <h3 class="sub-about__principle-lead">世の中に変化を与え、誇れる会社に</h3>
            <p class="sub-about__principle-text">
                このビジョンには「既存の常識」を打ち破り、「新しい挑戦」にワクワクする意識を大切にしようという想いが込められています。エコ・プランニングは解体・産廃業という社会インフラを支える重要な使命とともに、野外音楽フェスの開催や海外事業など、従来の枠を超えた発想で新たな価値を創造しています。社員一人ひとりが「面白い」「誇れる」と自信を持って取り組める仕事を通じ、世の中にポジティブな影響をもたらすべく、今後も邁進してまいります。	
            </p>
          </div>
        </div>
      </article>

      <article class="sub-about__principle">
        <div class="sub-about__principle-image">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/purpose.jpg" alt="街の風景">
        </div>
        <div class="sub-about__principle-inner inner">
          <div class="sub-about__principle-heading">
            <h2 class="sub-about__principle-title site-heading--subpage-en">purpose</h2>
            <p class="sub-about__principle-subtitle site-heading-subtitle--default">私たちが目指すもの</p>
          </div>
          <div class="sub-about__principle-content">
            <h3 class="sub-about__principle-lead">
              街の純度を高め、<br>
              人々の暮らしを守る
            </h3>
            <p class="sub-about__principle-text">
                日々の生活では意識されずとも、街の代謝を支えるインフラとして誠実に尽くすこと。この意識を常に持ち続け、エコ・プランニングは業務に取り組んでいます。解体や廃棄物処理を通じて街の不純物を取り除き、不要なものを資源へと変えることで新たな循環を創り出す。縁の下の力持ちとして、人々の健やかな暮らしを永続的に守り続けることが私たちの役割です。	
            </p>
          </div>
        </div>
      </article>

      <article class="sub-about__principle">
        <div class="sub-about__principle-image">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/value.jpg" alt="解体現場で打ち合わせをするスタッフ">
        </div>
        <div class="sub-about__principle-inner inner">
          <div class="sub-about__principle-heading">
            <h2 class="sub-about__principle-title site-heading--subpage-en">value</h2>
            <p class="sub-about__principle-subtitle site-heading-subtitle--default">行動指針</p>
          </div>
          <div class="sub-about__principle-content">
            <h3 class="sub-about__principle-lead sub-about__principle-lead--value">
              自ら楽しみながら、関わる人達に尽くそう常に挑戦し、<br>
              ワクワクし続けよう世間が抱く業界のイメージを打破しよう<br>
              無事故無災害を一番に考えよう
            </h3>
            <p class="sub-about__principle-text">
                4つのバリューは「新3K（かっこいい・稼げる・感動）」実現への核です。安全の要である「無事故・無災害」を最優先として、「関わる人たちすべてに尽くす」誠実さを徹底。常識に縛られず、自ら仕事を楽しみながら「常に挑戦し、ワクワクし続けること」を忘れない姿勢で、業界につきまとう「3K（きつい・汚い・危険）」のイメージの払拭を目指しています。これらの言葉を通じて社員が仕事に誇りを持ち、社会に変化と感動を与えることがエコ・プランニングの目標です。
            </p>
          </div>
        </div>
      </article>
    </section>

    <section class="site-contact-section sub-about__contact">
      <div class="site-contact site-contact--visual">
        <div class="site-contact__background">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/contact-bg.jpg" alt="">
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
              <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-contact-phone.png" alt="">
              <p class="site-contact__card-title">お電話でのお問い合わせ</p>
              <a class="site-contact__phone-number" href="tel:0595833330">0595-83-3330</a>
              <p class="site-contact__note">お電話の際に「ホームページを見て」<br>とお伝えください。</p>
            </div>

            <div class="site-contact__card site-contact__card--mail">
              <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-contact-mail.png" alt="">
              <p class="site-contact__card-title">メールでのお問い合わせ</p>
              <a class="site-contact__button" href="<?php echo esc_url(home_url('/contact/')); ?>">
                <span>お問い合わせ</span>
                <span class="site-arrow-icon site-contact__button-icon" aria-hidden="true">
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-blue.png" alt="">
                </span>
              </a>
            </div>

            <div class="site-contact__card site-contact__card--line">
              <img class="site-contact__icon" src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/icon-contact-line.png" alt="">
              <p class="site-contact__card-title">LINEでのお問い合わせ</p>
              <a class="site-contact__button" href="https://line.me/R/ti/p/@lia0806h" target="_blank" rel="noopener noreferrer">
                <span>LINE 友達追加</span>
                <span class="site-arrow-icon site-contact__button-icon" aria-hidden="true">
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/img/common/arrow-blue.png" alt="">
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
