const blog_tab = document.getElementById("blog_tab");
const searchtab = document.querySelector(".searchtab");
const search = document.getElementById("search");
const searchtab_mobile = document.querySelector(".searchtab_mobile");
const search_form = document.getElementById("search_form");
const second_header = document.getElementById("second_header");
const search_container = document.getElementById("search-container");

const product_result = document.getElementById("product_result");
const product_tab = document.getElementById("product_tab");
const blog_result = document.getElementById("blog_result");

if (blog_tab) {
  blog_tab.addEventListener("click", () => {
    product_result.style.display = "none";
    blog_result.style.display = "block";

    blog_tab.style.color = "#910325";
    product_tab.style.color = "#54585f";
  });

  product_tab.addEventListener("click", () => {
    blog_result.style.display = "none";
    product_result.style.display = "block";
    product_tab.style.color = "#910325";
    blog_tab.style.color = "#54585f";
  });
}

searchtab_mobile.addEventListener("click", () => {
  search_form.style.display = "flex";
  second_header.style.display = "none";
});
const searchclose = document.querySelector(".search_close");
searchclose?.addEventListener("click", () => {
  search_form.style.display = "none";
  second_header.style.display = "flex";
});
if (searchtab) {
  searchtab.addEventListener("click", () => {
    search.classList.add("active");
  });
}
