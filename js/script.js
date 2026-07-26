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

    // 共通ループギャラリー
    $(".js-loop-gallery-track").each(function () {
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
            track.style.setProperty("--site-loop-gallery-distance", -distance + "px");
        }

        updateGalleryDistance();
        requestAnimationFrame(function () {
            updateGalleryDistance();
            track.classList.add("is-loop-ready");
        });

        $(window).on("resize", updateGalleryDistance);
    });

    var topBackgroundSlides = $(".js-top-background-slide");

    if (topBackgroundSlides.length > 1 && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        var currentTopBackgroundSlide = 0;

        window.setInterval(function () {
            topBackgroundSlides.eq(currentTopBackgroundSlide).removeClass("is-active");
            currentTopBackgroundSlide = (currentTopBackgroundSlide + 1) % topBackgroundSlides.length;
            topBackgroundSlides.eq(currentTopBackgroundSlide).addClass("is-active");
        }, 5000);
    }

    if (document.querySelector(".js-top-reasons-slider") && typeof Swiper !== "undefined") {
        new Swiper(".js-top-reasons-slider", {
            loop: true,
            centeredSlides: true,
            slidesPerView: "auto",
            spaceBetween: 40,
            speed: 700,
            pagination: {
                el: ".top-reasons__pagination",
                clickable: true
            },
            navigation: {
                prevEl: ".top-reasons__navigation--prev",
                nextEl: ".top-reasons__navigation--next"
            },
            breakpoints: {
                769: {
                    spaceBetween: 40
                }
            }
        });
    }

    var prepareLoopSlides = function (slider, minimumSlides) {
        var wrapper = slider ? slider.querySelector(".swiper-wrapper") : null;
        var slides = wrapper ? Array.from(wrapper.children) : [];

        if (wrapper && slides.length > 1 && slides.length < minimumSlides) {
            var originalSlides = slides.slice();
            var cloneIndex = 0;

            while (wrapper.children.length < minimumSlides) {
                var clone = originalSlides[cloneIndex % originalSlides.length].cloneNode(true);

                clone.setAttribute("aria-hidden", "true");
                clone.classList.add("is-loop-clone");
                clone.querySelectorAll("a, button, input, select, textarea, [tabindex]").forEach(function (element) {
                    element.setAttribute("tabindex", "-1");
                });
                wrapper.appendChild(clone);
                cloneIndex++;
            }
        }
    };

    var voicesSlider = document.querySelector(".js-top-voices-slider");

    if (voicesSlider && typeof Swiper !== "undefined") {
        prepareLoopSlides(voicesSlider, 10);

        new Swiper(voicesSlider, {
            loop: true,
            centeredSlides: true,
            slidesPerView: "auto",
            spaceBetween: 10,
            speed: 700,
            navigation: {
                prevEl: ".top-voices__navigation--prev",
                nextEl: ".top-voices__navigation--next"
            }
        });
    }

    var worksSlider = document.querySelector(".js-top-works-slider");

    if (worksSlider && typeof Swiper !== "undefined") {
        prepareLoopSlides(worksSlider, 10);

        new Swiper(worksSlider, {
            loop: true,
            centeredSlides: true,
            slidesPerView: "auto",
            spaceBetween: 15,
            speed: 700,
            navigation: {
                prevEl: ".top-works__navigation--prev",
                nextEl: ".top-works__navigation--next"
            },
            breakpoints: {
                769: {
                    spaceBetween: 100
                }
            }
        });
    }

    var staffSlider = document.querySelector(".js-top-staff-slider");

    if (staffSlider && typeof Swiper !== "undefined") {
        prepareLoopSlides(staffSlider, 10);

        new Swiper(staffSlider, {
            loop: true,
            slidesPerView: "auto",
            spaceBetween: 8,
            speed: 700,
            navigation: {
                prevEl: ".top-staff__navigation-button--prev",
                nextEl: ".top-staff__navigation-button--next"
            },
            breakpoints: {
                769: {
                    spaceBetween: 10
                }
            }
        });
    }

    var companyHistorySlider = document.querySelector(".js-company-history-slider");

    if (companyHistorySlider && typeof Swiper !== "undefined") {
        new Swiper(companyHistorySlider, {
            slidesPerView: "auto",
            spaceBetween: 12,
            speed: 700,
            navigation: {
                prevEl: ".sub-company__history-navigation--prev",
                nextEl: ".sub-company__history-navigation--next"
            },
            breakpoints: {
                769: {
                    spaceBetween: 20
                }
            }
        });
    }

    var topFlowTabs = Array.from(document.querySelectorAll(".js-top-flow-tab"));
    var topFlowPanels = Array.from(document.querySelectorAll(".js-top-flow-panel"));

    function activateTopFlowTab(activeTab, moveFocus) {
        var target = activeTab ? activeTab.dataset.flowTarget : "";

        topFlowTabs.forEach(function (tab) {
            var isActive = tab === activeTab;

            tab.classList.toggle("is-active", isActive);
            tab.setAttribute("aria-selected", String(isActive));
            tab.setAttribute("tabindex", isActive ? "0" : "-1");
        });

        topFlowPanels.forEach(function (panel) {
            panel.hidden = panel.dataset.flowPanel !== target;
        });

        if (moveFocus) activeTab.focus();
    }

    topFlowTabs.forEach(function (tab, tabIndex) {
        tab.addEventListener("click", function () {
            activateTopFlowTab(tab, false);
        });

        tab.addEventListener("keydown", function (event) {
            var nextIndex = tabIndex;

            if (event.key === "ArrowRight") nextIndex = (tabIndex + 1) % topFlowTabs.length;
            if (event.key === "ArrowLeft") nextIndex = (tabIndex - 1 + topFlowTabs.length) % topFlowTabs.length;
            if (event.key === "Home") nextIndex = 0;
            if (event.key === "End") nextIndex = topFlowTabs.length - 1;
            if (nextIndex === tabIndex) return;

            event.preventDefault();
            activateTopFlowTab(topFlowTabs[nextIndex], true);
        });
    });

    $(".js-keyword-loop").each(function () {
        var loop = this;
        var motion = loop.querySelector(".top-strengths__keyword-motion");
        var track = loop.querySelector(".top-strengths__keyword-track");

        if (!motion || !track || loop.classList.contains("is-loop-ready")) return;

        var clone = track.cloneNode(true);
        clone.setAttribute("aria-hidden", "true");
        motion.appendChild(clone);
        loop.classList.add("is-loop-ready");
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
