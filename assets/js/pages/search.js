const separator = document.querySelector('.separator')
if (separator) {
    separator.innerHTML = `<svg class="icon" style="width:40px;height:36px"><use href="#icon-Arrow-6" /></svg>`
}
const SearchPage = () => {

    const searchPostType = document.querySelector('#searchPostType');
    const searchPostTypeInputs = document.querySelectorAll('input[type="radio"]');
    const ajaxSearchResult = document.getElementById('searchPostsWrapper');
    const result_count = document.querySelector('.result_count');

    const blog_input = document.querySelector(".blog_input");
    const product_input = document.querySelector(".product_input");


    const noResultSearch = document.getElementById('no_result_search');
    const no_result = document.getElementById("empty");
     const urlParams = new URLSearchParams(window.location.search);
    const searchParameter = urlParams.get('s');

    if (!searchPostType || !searchPostTypeInputs || !searchParameter) return;

    searchPostTypeInputs.forEach((input) => {
        input.addEventListener('click', (event) => {
            const searchPostType = event.target.value;

            if (blog_input.checked) {
                document.querySelector('.search_category').innerHTML = "مقالات"
            }

            if (product_input.checked) {
                document.querySelector('.search_category').innerHTML = "محصولات"
            }

            jQuery(($) => {
                $.ajax({
                    method: 'POST',
                    url: restDetails.url + 'cynApi/v1/get_posts',
                    data: {
                        's': searchParameter,
                        'post_type': searchPostType,
                        'class': 'col-span-3 col-span-md-1 p-8'
                    },
                    beforeSend: (xhr) => {
                        xhr.setRequestHeader("X-WP-Nonce", restDetails.nonce);
                    },
                    success: (res) => {
                        // console.log(res.data.posts_count);

                        ajaxSearchResult.innerHTML = res.data.html;
                        result_count.innerHTML = res.data.posts_count;

                        if (res.data.posts_count == 0) {
                            console.log('no post')
                            ajaxSearchResult.classList.add("container");
                            ajaxSearchResult.classList.remove("box-col-md-2");
                            ajaxSearchResult.classList.remove("box-col-12");
                        } else {
                            ajaxSearchResult.classList.remove("container");
                            ajaxSearchResult.classList.add("box-col-md-2");
                            ajaxSearchResult.classList.add("box-col-12");
                        }
                    },

                    error: (error) => {
                        console.log(error);
                    }

                })
            })
        })
    })

}


SearchPage();

