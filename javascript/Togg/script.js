const article1 = document.querySelector(".article-1");
const article2 = document.querySelector(".article-2");
const togggle = function () {
  let clrTem1 = article1.style.backgroundColor;
  let clrTem2 = article2.style.backgroundColor;
  article1.style.backgroundColor = clrTem2;
  article2.style.backgroundColor = clrTem1;
};
article1.addEventListener("click", togggle);
article2.addEventListener("click", togggle);
