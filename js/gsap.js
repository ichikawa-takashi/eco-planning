gsap.registerPlugin(ScrollTrigger);

// .js-fadein を付けた要素を、スクロールで画面に入ったタイミングでふわっと表示
gsap.utils.toArray(".js-fadein").forEach(function (el) {
  gsap.fromTo(
    el,
    { autoAlpha: 0, y: 30 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "top 75%",
      },
    }
  );
});

// .js-slidein-left を付けた要素を、スクロールで画面に入ったタイミングで左から右にスライドイン
gsap.utils.toArray(".js-slidein-left").forEach(function (el) {
  gsap.fromTo(
    el,
    { autoAlpha: 0, x: -60 },
    {
      autoAlpha: 1,
      x: 0,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "top 75%",
      },
    }
  );
});
