// const body = document.querySelector("body");
// const element = document.getElementById("g-pointer-1");
// const halfAlementWidth = element.offsetWidth ;
 
// function setPosition(x, y) {
//   element.style.transform = `translate(${x - halfAlementWidth}px, ${y - halfAlementWidth}px)`;
// }

// body.addEventListener("mousemove", (e) => {
//   window.requestAnimationFrame(function () {
//     setPosition(e.clientX, e.clientY);
//   });
// });











const customize_button = document.getElementById("customize_button");
const customize_section = document.getElementById("customize_section");
const close_customize = document.getElementById("close_customize");

if (customize_button && close_customize && customize_section) {
  customize_button.addEventListener("click", () => {
    customize_section.classList.add("active");
  });
  close_customize.addEventListener("click", () => {
    customize_section.classList.remove("active");
  });
}

const customize_button_mb = document.getElementById("customize_button_mb");

if (customize_button_mb && close_customize && customize_section) {
  customize_button_mb.addEventListener("click", () => {
    customize_section.classList.add("active");
  });
  close_customize.addEventListener("click", () => {
    customize_section.classList.remove("active");
  });
}

// const customize_button = document.querySelectorAll("customize-button");
// const customize_section = document.getElementById('customize_section');
// const close_customize = document.getElementById('close_customize');
// const customize_mb_button = document.getElementById("customize_mb_button");

// customize_button.forEach((elem) => {
//     elem.addEventListener("click", () => {
//                 console.log(customize_button);

//             customize_section.style.display = "flex";
//         });
//         close_customize.addEventListener("click", () => {
//             customize_section.style.display = "none";
//         });
//     })

// // if (customize_mb_button && close_customize && customize_section) {
// //   customize_mb_button.addEventListener("click", () => {
// //     customize_section.style.display = "flex";
// //   });

// // }
