const categoryCheckboxes = document.querySelectorAll('input[name=category]');
const brandCheckboxes = document.querySelectorAll('input[name=brand]');
const priceRange = document.querySelectorAll('input[name=price_value]');
const sortby = document.querySelector('select[name=sortby]');
const colorLinks = document.querySelectorAll('.colorCheckbox');
const productsCtn = document.querySelector('#products-wraper');
const pagination = document.querySelector('#pagination');


let categories = [...document.querySelectorAll('input[name=category]:checked')].map(el => el.value)
    , colors = []
    , price = { min: priceRange[0].value, max: priceRange[1].value }
    , brands = [...document.querySelectorAll('input[name=brand]:checked')].map(el => el.value)
    , keyword = document.querySelector('input[name=keyword2]').value
    , sort = { sortby: sortby.value, type: sortby.options[sortby.selectedIndex].getAttribute('data-sort') };

const getProductsByFilter = async (page = 1, perpage = 12) => {

    productsCtn.innerHTML = ''

    const data = {
        categories: categories,
        colors: colors,
        brands: brands,
        price: price,
        sortby: sort,
        keyword: keyword
    }

    const token = document.querySelector('meta[name=csrf-token]').content

    const response = await fetch(`/api/products/filter?page=${page}&perpage=${perpage}`, {
        method: 'POST',
        headers: {
            "Content-type": "application/json;charset=UTF-8",
            'X-CSRF-TOKEN': token,
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    const column = document.querySelector('input[name=column]');

    result.data.forEach(el => {
        productsCtn.innerHTML +=
            `<div class="col-6 ${column.value == '2' ? '' : 'col-md-4 col-lg-4'}">
            <div class="product product-4 text-center">
                <figure class="product-media">
                ${el.discount != 0 ? `<span class="product-label label-circle label-sale">Sale</span>` : ''}
                    ${renderImages(el.colors, el.category_name, el.product_id)}
                    
                    <div class="product-action-vertical">
                    
                        <a href="javascript:void(0)" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="javascript:void(0)" class="btn-product btn-cart" id="product-${el.product_id}-cart" data-product-id="${el.product_id}" data-color-id="${el.colors[0].color_id}">
                            <span>add to cart</span>
                        </a>
                    </div><!-- End .product-action -->

                </figure><!-- End .product-media -->

                <div class="product-body">
                    <h3 class="product-title"><a href="product.html">${el.product_name}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        ${el.discount == 0 ? `<span class="new-price">${el.price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</span>` :
                `<span class="new-price">${el.sales_price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</span>
                        <span class="old-price"><del>${el.price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</del></span>`}
                        
                        <!-- End .product-media -->
                    </div><!-- <span class="old-price">$84.00</span> -->

                    ${renderColorLink(el.colors, el.product_id)}

                </div><!-- End .product-body -->
            </div>
        </div><!--End.col - sm - 6 col - lg - 4 -- >`
    })

    document.querySelector('.products-and-page').innerHTML = `${result.quantity} of ${result.total}`;

    renderPagination(result.numPage, result.currentPage);

    addEventDotColor();
    addEventAddCart();
}

getProductsByFilter();

const renderImages = (imgs, category_name, product_id) => {
    let images = ''

    imgs.forEach((img, i) => {
        images +=
            `<a href="detail/product-${product_id}"
            
            class="product-${product_id}-img product-${product_id}-${img.color_id}-img ${i > 0 ? 'd-none' : ''}">
            <img src="/images/molla/${category_name}/${img.src.split('#')[0]}" alt="Product image" class="product-image">
        </a>`
    })

    return images;
}

const renderColorLink = (colors, product_id) => {

    let html = '';
    let dots = '';

    if (colors.length == 1) {
        return '';
    }

    colors.forEach((link, i) => {
        i == 0 ? dots += `<a href="javascript:void(0)" data-list="product-${product_id}-img" data-product-id="${product_id}"
                        data-color-id="${link.color_id}" data-image="product-${product_id}-${link.color_id}-img"
                            class="active" style="background: ${link.color_code};">
                        <span class="sr-only">${link.color_name}</span></a>` :
            dots += `<a href="javascript:void(0)" style="background: ${link.color_code};" data-product-id="${product_id}"
                            data-color-id="${link.color_id}" data-list="product-${product_id}-img" data-image="product-${product_id}-${link.color_id}-img">
                        <span class="sr-only">${link.color_name}</span>
                    </a>`
    })
    html = `<div class="product-nav product-nav-dots">${dots}</div><!-- End .product-nav -->`

    return html;
}

const addEventAddCart = () => {
    const btnCart = document.querySelectorAll('.btn-cart')
    btnCart.forEach(cart => {
        cart.addEventListener('click', function () {
            addCart(cart);
        });
    });
}

const addEventDotColor = () => {
    const colorDots = document.querySelectorAll('.product-nav-dots a')
    colorDots.forEach(dot => {
        dot.addEventListener('click', function () {

            const list = document.querySelectorAll(`.${this.dataset.list}`);
            list.forEach(el => {
                el.classList.add('d-none');
            })

            const img = document.querySelector(`.${this.dataset.image}`);
            img.classList.remove('d-none')

            const cart = document.querySelector(`#product-${this.dataset.productId}-cart`);
            cart.dataset.colorId = this.dataset.colorId;

        });
    })
}

const renderPagination = (numPage, currentPage) => {
    pagination.innerHTML = '';
    // Prev button
    pagination.innerHTML += `<li class="page-item ${currentPage == 1 ? 'disabled' : ''}">
                                <a class="page-link page-link-prev" href="javascript:void(0)" onclick="prevClick(${currentPage})" aria-label="Previous" tabindex="-1"
                                    aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>`;

    for (let i = 1; i <= numPage; i++) {
        pagination.innerHTML += `<li class="page-item ${currentPage == i ? 'active' : ''}" onclick="getProductsByFilter(${i})"  ${currentPage == i ? 'aria-current="page"' : ''}><a class="page-link" href="javascript:void(0)">${i}</a></li>`
    }

    pagination.innerHTML += `<li class="page-item ${currentPage == numPage ? 'disabled' : ''}">
                                <a class="page-link page-link-next" href="javascript:void(0)" onclick="nextClick(${currentPage})" aria-label="Next" tabindex="-1"
                                    aria-disabled="true">
                                    Next<span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>`;
}

const clearFilter = () => {
    const allCheckboxes = document.querySelectorAll('input[type=checkbox]:checked');

    allCheckboxes.forEach((el) => {
        el.checked = false;
    })
    const colorLinks = document.querySelectorAll('.colorCheckbox.selected');

    colorLinks.forEach(el => {
        el.classList.remove('selected');
    })
    priceRange[0].value = priceRange[0].min
    priceRange[1].value = priceRange[1].max

    categories = []; colors = []
    price = { min: priceRange[0].min, max: priceRange[1].max }
    brands = [];
    keyword = ''
    sort = { sortby: sortby.value, type: sortby.options[sortby.selectedIndex].getAttribute('data-sort') }

    getProductsByFilter();
}

const prevClick = (currentPage) => {
    --currentPage;
    getProductsByFilter(currentPage)
}

const nextClick = (currentPage) => {
    ++currentPage;
    getProductsByFilter(currentPage)
}

sortby.addEventListener('change', () => {
    sort = { sortby: sortby.value, type: sortby.options[sortby.selectedIndex].getAttribute('data-sort') }
    getProductsByFilter()
})

categoryCheckboxes.forEach(el => {
    el.addEventListener('change', function () {
        categories = [...document.querySelectorAll('input[name=category]:checked')].map((el) => el.value);
        getProductsByFilter()
    });
})

brandCheckboxes.forEach(el => {
    el.addEventListener('change', function () {
        brands = [...document.querySelectorAll('input[name=brand]:checked')].map((el) => el.value);
        getProductsByFilter()
    });
})

priceRange.forEach(el => {
    el.addEventListener('change', function () {
        price.min = priceRange[0].value
        price.max = priceRange[1].value
        getProductsByFilter()
    });
})

colorLinks.forEach(el => {
    el.addEventListener('click', () => {
        el.classList.toggle('selected')

        colors = [...document.querySelectorAll('.colorCheckbox')]
            .filter(el => el.classList.contains('selected'))
            .map(el => el.dataset.color)

        getProductsByFilter()
    })
})

