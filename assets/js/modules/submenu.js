const parent = document.querySelector('.products-category');
const submenu = document.querySelector('#submenu');


function appendSubMenu() {
    if (submenu && parent) {
        parent.appendChild(submenu);

    } else {
        return
    }
}
appendSubMenu()
const products = document.querySelector(".menu-item-has-children");
const submenu_mobile = document.querySelector(".sub-menu");
products.addEventListener("click", () => {
  products.classList.add("active");
});