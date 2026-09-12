gsap.registerPlugin(ScrollTrigger);

// js-fadeup:縦に並ぶブロックを下から上にふわっと表示
gsap.utils.toArray(".js-fadeup").forEach(function (el) {
  gsap.fromTo(
    el,
    { autoAlpha: 0, y: 30 },
    {
      autoAlpha: 1,
      y: 0,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: { trigger: el, start: "top 75%" },
    }
  );
});

// js-slidein:横に並ぶブロックを左からスライドインさせながら表示
gsap.utils.toArray(".js-slidein").forEach(function (el) {
  gsap.fromTo(
    el,
    { autoAlpha: 0, x: -60 },
    {
      autoAlpha: 1,
      x: 0,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: { trigger: el, start: "top 75%" },
    }
  );
});

// js-slidein-stagger:兄弟要素をまとめて左から順番にスライドインさせる
var slideinStaggerGroups = new Map();
document.querySelectorAll(".js-slidein-stagger").forEach(function (el) {
  var parent = el.parentElement;
  if (!slideinStaggerGroups.has(parent)) slideinStaggerGroups.set(parent, []);
  slideinStaggerGroups.get(parent).push(el);
});
slideinStaggerGroups.forEach(function (els) {
  gsap.fromTo(
    els,
    { autoAlpha: 0, x: -60 },
    {
      autoAlpha: 1,
      x: 0,
      duration: 0.8,
      ease: "power2.out",
      stagger: 0.15,
      scrollTrigger: { trigger: els[0], start: "top 75%" },
    }
  );
});

// top-flow:タブで表示中のステップを、下から上にふわっと表示(順番に)
// 非表示タブは高さ0で誤発火するため、パネルが表示されたタイミングで初期化する
function animateTopFlowPanel(panel) {
  if (!panel || panel.dataset.flowAnimated === "true") return;

  var items = panel.querySelectorAll(".site-flow__item");
  if (!items.length) return;

  panel.dataset.flowAnimated = "true";

  items.forEach(function (item) {
    gsap.fromTo(
      item,
      { autoAlpha: 0, y: 30 },
      {
        autoAlpha: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: { trigger: item, start: "top 75%" },
      }
    );
  });
}

document.querySelectorAll(".js-top-flow-panel:not([hidden])").forEach(animateTopFlowPanel);

document.querySelectorAll(".js-top-flow-tab").forEach(function (tab) {
  tab.addEventListener("click", function () {
    var panel = document.querySelector(
      '.js-top-flow-panel[data-flow-panel="' + tab.dataset.flowTarget + '"]'
    );
    animateTopFlowPanel(panel);
    ScrollTrigger.refresh();
  });
});

// js-fadein:スライダーなど、位置は動かさずふわっと表示だけしたいブロック用
gsap.utils.toArray(".js-fadein").forEach(function (el) {
  gsap.fromTo(
    el,
    { autoAlpha: 0 },
    {
      autoAlpha: 1,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: { trigger: el, start: "top 75%" },
    }
  );
});
