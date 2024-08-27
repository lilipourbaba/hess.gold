const opentab = document.querySelectorAll('.tab');
const loginuser = document.querySelectorAll('.linetab');
const filtertab = document.querySelectorAll('.filter-tab');


const priceTab = document.querySelector('.price-tab');
const iconTab = document.querySelector('#icontab');

iconTab.addEventListener("click", () => {
  priceTab.classList.toggle("active");
});


opentab.forEach((elem) => {
  elem.addEventListener("click", () => {
    elem.classList.toggle("active");
  });
});
loginuser.forEach((elem) => {
  elem.addEventListener('click', () => {
    elem.querySelectorAll('.tab_content').classList.toggle('active');
  });
});

filtertab.forEach((elem) => {
  elem.addEventListener("click", () => {
    elem.classList.toggle("active");
  });
});











// mobileheader





const headertabOpen = document.querySelector('.open-pop');
const headertabclose = document.querySelector('.close-pop');
const topheader = document.querySelector('.top-header');

const mobileHamberger = document.getElementById('mobile_hamburger');

 
headertabOpen.addEventListener("click", () => {
  mobileHamberger.classList.add('active');
  topheader.classList.remove('grid-full');
  topheader.classList.add('grid-zero');

});
headertabclose.addEventListener("click", () => {
  mobileHamberger.classList.remove('active');
  topheader.classList.remove('grid-zero');
  topheader.classList.add('grid-full');
});
















 



 

const register_btn = document.querySelector('.register_btn')
register_btn?.addEventListener('click', (event) => {
  document.getElementById('login_form').style.display = 'none'
  document.getElementById('register_form').style.display = 'block'
})



const login_btn = document.querySelector('.login_btn')
login_btn?.addEventListener('click', (event2) => {
  document.getElementById('register_form').style.display = 'none'
    document.getElementById('login_form').style.display = 'block'

})

const number_login = document.getElementById('number_login');
const email_login = document.getElementById('email_login');


email_login?.addEventListener('click', (event) => {
  event.target.style.color = "red";

  document.getElementById('number_input').style.display = 'none'
  document.getElementById('mail_input').style.display = 'block'
 
})
number_login?.addEventListener('click', (event) => {
  event.target.style.color = "red";
  document.getElementById('number_input').style.display = 'block'
  document.getElementById('mail_input').style.display = 'none'


})

