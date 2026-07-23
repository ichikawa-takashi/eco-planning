jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる

    var topBtn = $('.pagetop');
    topBtn.hide();

    // ボタンの表示設定
    $(window).scroll(function () {
        if ($(this).scrollTop() > 70) {
            // 指定px以上のスクロールでボタンを表示
            topBtn.fadeIn();
        } else {
            // 画面が指定pxより上ならボタンを非表示
            topBtn.fadeOut();
        }
    });

    // ボタンをクリックしたらスクロールして上に戻る
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 300, 'swing');
        return false;
    });

    //ドロワーメニュー
    $("#MenuButton").click(function () {
        // $(".l-drawer-menu").toggleClass("is-show");
        // $(".p-drawer-menu").toggleClass("is-show");
        $(".js-drawer-open").toggleClass("open");
        $(".drawer-menu").toggleClass("open");
        $("html").toggleClass("is-fixed");

    });



    // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

    $(document).on('click', 'a[href*="#"]', function () {
        let time = 400;
        let header = $('header').css('position') === 'fixed' ? $('header').innerHeight() : 0;
        let target = $(this.hash);
        if (!target.length) return;
        let targetY = target.offset().top - header;
        $('html,body').animate({
            scrollTop: targetY
        }, time, 'swing');
        return false;
    });

    // ハンバーガーメニュー
    $(function () {
        $(".js-hamburger").click(function () {
            $(this).toggleClass("is-open");
            if ($(this).hasClass("is-open")) {
                openDrawer();
            } else {
                closeDrawer();
            }
        });

        // backgroundまたはページ内リンクをクリックで閉じる
        $(".js-drawer a[href]").on("click", function () {
            closeDrawer();
        });

        // resizeイベント
        $(window).on('resize', function () {
            if (window.matchMedia("(min-width: 768px)").matches) {
                closeDrawer();
            }
        });
    });

    function openDrawer() {
        $(".site-header").addClass("is-drawer-open");
        $(".js-drawer").addClass("is-open");
        $(".js-hamburger").addClass("is-open");
        $(".js-hamburger").attr("aria-label", "メニューを閉じる");
        $("html").addClass("is-fixed");
    }

    function closeDrawer() {
        $(".site-header").removeClass("is-drawer-open");
        $(".js-drawer").removeClass("is-open");
        $(".js-hamburger").removeClass("is-open");
        $(".js-hamburger").attr("aria-label", "メニューを開く");
        $("html").removeClass("is-fixed");
    }

    // サービス詳細ページのループギャラリー
    $(".sub-service-detail__visual-gallery-track").each(function () {
        var track = this;
        var originalItems = Array.from(track.children);

        if (!originalItems.length || track.classList.contains("is-loop-ready")) return;

        originalItems.forEach(function (item) {
            item.dataset.galleryOriginal = "true";
        });

        for (var setIndex = 1; setIndex <= 2; setIndex++) {
            originalItems.forEach(function (item, itemIndex) {
                var clone = item.cloneNode(true);
                clone.dataset.galleryClone = String(setIndex);
                clone.removeAttribute("data-gallery-original");
                clone.setAttribute("aria-hidden", "true");

                var cloneImage = clone.querySelector("img");
                if (cloneImage) cloneImage.setAttribute("alt", "");

                if (itemIndex === 0) clone.dataset.galleryCloneStart = String(setIndex);
                track.appendChild(clone);
            });
        }

        function updateGalleryDistance() {
            var firstOriginal = track.querySelector("[data-gallery-original='true']");
            var firstClone = track.querySelector("[data-gallery-clone-start='1']");

            if (!firstOriginal || !firstClone) return;

            var distance = firstClone.offsetLeft - firstOriginal.offsetLeft;
            track.style.setProperty("--service-detail-gallery-distance", -distance + "px");
        }

        updateGalleryDistance();
        requestAnimationFrame(function () {
            updateGalleryDistance();
            track.classList.add("is-loop-ready");
        });

        $(window).on("resize", updateGalleryDistance);
    });

    // modal
    $(".js-modal-open").each(function () {
        $(this).on("click", function (e) {
            e.preventDefault();
            var target = $(this).data("target");
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            $("html,body").css("overflow", "hidden");
        });
    });
    $(".js-modal-close").on("click", function () {
        $(".js-modal").fadeOut();
        $("html,body").css("overflow", "initial");
    });
});
