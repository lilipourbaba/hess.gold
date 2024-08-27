/////////////////////////////////// slider
const inputLeft = document.getElementById("input-left");
const inputRight = document.getElementById("input-right");
const minPrice = document.querySelector(".min_price");
const maxPrice = document.querySelector(".max_price");

const thumbLeft = document.querySelector(".slider > .thumb.left");
const thumbRight = document.querySelector(".slider > .thumb.right");
const range = document.querySelector(".slider > .range");

const setLeftValue = () => {
    const _this = inputLeft;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];
    _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);
    const percent = ((_this.value - min) / (max - min)) * 100;
    thumbLeft.style.left = percent + "%";
    range.style.left = percent + "%";
    if (minPrice) {
        minPrice.innerHTML = inputLeft.value;
    }
};

const setRightValue = () => {
    const _this = inputRight;
    const [min, max] = [parseInt(_this.min), parseInt(_this.max)];
    _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);
    const percent = ((_this.value - min) / (max - min)) * 100;
    thumbRight.style.right = 100 - percent + "%";
    range.style.right = 100 - percent + "%";
    if (maxPrice) {

        maxPrice.innerHTML = Math.round(inputRight.value / 1000000);
    }
};

inputLeft?.addEventListener("input", setLeftValue);
inputRight?.addEventListener("input", setRightValue);




////////////////////////////////////////////////////////  responsive
const mobile_filter = document.querySelector('.mobile_filter')
const filter_form = document.getElementById('#archive-product-filter-form')
const mobile_res = document.querySelector('.mobile_res')
const mobile_res_content = document.querySelector('.mobile_res_content')
const filter_box = document.querySelector('#filter_box')
const close_icon = document.querySelector('.mobile_res .close_filter')
const backdrop = document.querySelector('.backdrop')

mobile_filter?.addEventListener('click', () => {
    mobile_res.style.display = 'block'
    backdrop.style.display = 'block'
    mobile_res_content.appendChild(filter_box)
    filter_box.classList.remove('d-md-none')
})


function closePopUp() {
    mobile_res.style.display = 'none'
    backdrop.style.display = 'none'
    mobile_res_content.innerHTML = ''
}
close_icon?.addEventListener('click', (e) => {
    closePopUp()
})



////////////////////////////////////////////////////// ajax request
const weight_item = document.querySelectorAll('.weight_item')
const weight_item_input = document.querySelector('.weight_item_input')

weight_item.forEach((item) => {
    item.addEventListener('click', (e) => {
        weight_item_input.value = ""
        weight_item_input.value = item.innerHTML

        e.target.classList.add('active_filter')
        e.target.classList.remove('filters')

        // console.log(e.target.nextElementSibling)


        // Step 1
        const parent = item.parentNode;

        // Step 2
        // const parentNodes = parent.children;

        // Step 3
        const parentNodesArray = Array.from(parent.children);
        const siblings = parentNodesArray.filter(function (sibling) {
            return sibling !== item;
        });
        // console.log(siblings)
        siblings.forEach((elm) => {
            elm.classList.remove('active_filter')
            elm.classList.add('filters')

        })


    })
})

const orderItems = document.querySelectorAll('.orderbyItem')
const orderby_input = document.querySelector('.orderby_input')

orderItems.forEach((item) => {
    item.addEventListener('click', (e) => {
        orderby_input.value = ""
        orderby_input.value = item.getAttribute('orderby')
        e.target.classList.add('active_filter')
        e.target.classList.remove('filters')

        // Step 1
        const parent = item.parentNode;

        // Step 2
        // const parentNodes = parent.children;

        // Step 3
        const parentNodesArray = Array.from(parent.children);
        const siblings = parentNodesArray.filter(function (sibling) {
            return sibling !== item;
        });
        // console.log(siblings)
        siblings.forEach((elm) => {
            elm.classList.remove('active_filter')
            elm.classList.add('filters')

        })
    })

})

filter_form?.addEventListener('submit', () => {
    closePopUp()
})




/////////////////////filtered items
const urlFilterParams = new URLSearchParams(window.location.search);
const filtered_box = document.querySelector('.filtered_box')
// const filItem = document.querySelector('.fil_item')
const filItemRemove = document.querySelector('.fil_item_remove')
 


const paramsFiltered = urlFilterParams.forEach((paramVal, paramKey) => {
    // console.log(paramKey, paramVal);

    if (!paramVal) return;

    var paramText = paramVal;

    if (paramKey == 'orderby') {
        if (paramVal == 'price') {
            paramText = 'ارزان ترین';
        }

        if (paramVal == 'price-desc') {
            paramText = 'گران ترین';
        }

        if (paramVal == 'date') {
            paramText = 'ارزان ترین';
        }

        if (paramVal == 'popularity') {
            paramText = 'ارزان ترین';
        }
    }

    if (paramKey == 'min_price') {
        paramText = 'شروع قیمت از  ' + paramText;
    }

    if (paramKey == 'max_price') {
        paramText = 'تا ' + paramText;
    }

    const div = document.createElement('div');
    div.innerHTML = `<div class="fil_item d-flex gap-4 jc-center ai-center"><i class="iconsax fil_item_remove" icon-name="x"></i><div>${paramText}</div></div>`;


    filtered_box?.appendChild(div)


    div.addEventListener('click', () => {
        const url = window.location.search;
        const urlParams = new URLSearchParams(url);
        urlParams.delete(paramKey);
        const newUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();
        location.href = newUrl;
    })



});

//  filItemRemove?.addEventListener('click', (elem) => {
//         const url = window.location.search;
//         const urlParams = new URLSearchParams(url);
//         const item = elem.target.parent
//         if (item.classList.contain('weight')) {
//             urlParams.delete('weight');
//         }
//         if (item.classList.contain('min_price')) {
//             urlParams.delete('min_price');
//         }
//         if (item.classList.contain('max_price')) {
//             urlParams.delete('max_price');
//         }
//         if (item.classList.contain('orderby')) {
//             urlParams.delete('orderby');
//         }

//         const newUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();
//         location.href = newUrl
//     })








// console.log(newUrl);

/////////////////////////////
// const rangePrice = document.querySelectorAll('.price_range');
// const maximumPrice = document.getElementById('input-right');
// const minimumPrice = document.getElementById('input-left');
// const weightGroup = document.querySelectorAll('.weight');



// const selectedweight = document.querySelector('.selectedweight');
// const ajaxFilterRes = document.querySelector('.archive-product-main')

// rangePrice?.forEach(element => {
//     element.addEventListener('change', function (event) {
//         filterProduct(minimumPrice, maximumPrice, element.dataset.termId)
//     })
// });

// weightGroup?.forEach(element => {
//     element.addEventListener('click', function (event) {
//         // console.log(element.dataset);
//         filterProduct(minimumPrice, maximumPrice, element.dataset.termId)
//     })
// });



// function filterProduct(inputMin, inputMax, weightId) {
//     const minPrice = inputMin.value
//     const maxPrice = inputMax.value


//     // console.log(maxPrice);
//     // console.log(maxPrice);


//     jQuery(($) => {
//         $.ajax({
//             method: 'GET',
//             url: restDetails.url + 'cynApi/v1/get_product',
//             data: {
//                 'post_type': 'product',
//                 // 'class': '',
//                 'tax_query': [
//                     {
//                         'taxonomy': 'cyn_weight',
//                         'field': 'term_id',
//                         'terms': weightId,
//                     },
//                 ],
//                 // 'meta_query': [
//                 //     {
//                 //         'key': 'price',
//                 //         'value': [minPrice, maxPrice],
//                 //         'compare': 'BETWEEN',
//                 //     }
//                 // ]
//             },
//             beforeSend: (xhr) => {
//                 xhr.setRequestHeader("X-WP-Nonce", restDetails.nonce);
//             },
//             success: (res) => {
//                 console.log("success:", res)
//                 ajaxFilterRes.innerHTML = res.data.html;
//             },
//             error: (error) => {
//                 console.log("error:", error);
//             }
//         })
//     })
// }





