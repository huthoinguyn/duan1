const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);
const header = $("header"),
  slider = $(".slider");
window.onscroll = (e) => {
  if (window.scrollY > header.offsetHeight) {
    header.classList.add("is-fixed");
    header.style.height = "80px";
    body.style.paddingTop = header.offsetHeight + "px";
  } else if ((window.scrollY < 2)) {
    header.classList.remove("is-fixed");
    header.style.height = "120px";
    body.style.paddingTop = 0;
  }
};
