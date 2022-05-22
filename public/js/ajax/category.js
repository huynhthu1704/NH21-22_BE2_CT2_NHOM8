const categoryCheckboxes = document.querySelectorAll('input[name=category]');
const brandCheckboxes = document.querySelectorAll('input[name=brand]');
const priceRange = document.querySelectorAll('input[name=price_value]');
const sortby = document.querySelector('select[name=sortby]');
const colorLinks = document.querySelectorAll('.colorCheckbox');
const productsCtn = document.querySelector('#products-wraper');
const pagination = document.querySelector('#pagination');


let categories = [], colors = []
    , price = { min: priceRange[0].value, max: priceRange[1].value }
    , brands = [], keywords = ''
    , sort = { sortby: sortby.value, type: sortby.options[sortby.selectedIndex].getAttribute('data-sort') };

const getProductsByFilter = async (page = 1, perpage = 12) => {

    productsCtn.innerHTML = ''

    const data = {
        categories: categories,
        colors: colors,
        brands: brands,
        price: price,
        sortby: sort
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

    result.data.forEach(el => {
        productsCtn.innerHTML +=
            `<div class="col-6 col-md-4 col-lg-4">
            <div class="product product-4 text-center">
                <figure class="product-media">

                    <span class="product-label label-circle label-sale">Sale</span>

                    <a href="product.html">
                        <img src="./images/molla/${el.category_name}/${el.colors[0].src}" alt="Product image" class="product-image">
                    </a>
                    
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                    </div><!-- End .product-action -->

                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                    </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                    <h3 class="product-title"><a href="product.html">${el.product_name}</a></h3><!-- End .product-title -->
                    <div class="product-price">
                        <span class="new-price">${el.price.toLocaleString('it-IT', { style: 'currency', currency: 'VND' })}</span>
                        
                        <!-- End .product-media -->
                    </div><!-- <span class="old-price">$84.00</span> -->

                    ${renderColorLink(el.colors)}

                </div><!-- End .product-body -->
            </div>
        </div><!--End.col - sm - 6 col - lg - 4 -- >`
    })

    renderPagination(result.numPage, result.currentPage);
}

const renderColorLink = (colors) => {

    let html = '';
    let dots = '';

    if (colors.length == 1) {
        return '';
    }

    colors.forEach((link, i) => {
        i == 0 ? dots += `<a href="#" class="active" style="background: ${link.color_code};"><span class="sr-only">${link.color_name}</span></a>` :
            dots += `<a href="#" style="background: ${link.color_code};"><span class="sr-only">${link.color_name}</span></a>`
    })
    html = `<div class="product-nav product-nav-dots">${dots}</div><!-- End .product-nav -->`

    return html;
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
        pagination.innerHTML += `<li class="page-item ${ currentPage == i ? 'active' : ''}" onclick="getProductsByFilter(${i})"  ${ currentPage == i ? 'aria-current="page"' : ''}><a class="page-link" href="javascript:void(0)">${i}</a></li>`
    }

    pagination.innerHTML += `<li class="page-item ${currentPage == numPage ? 'disabled' : ''}">
                                <a class="page-link page-link-next" href="javascript:void(0)" onclick="nextClick(${currentPage})" aria-label="Next" tabindex="-1"
                                    aria-disabled="true">
                                    Next<span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>`;
}

const prevClick = (currentPage) =>{
    --currentPage;
    getProductsByFilter(currentPage)
}

const nextClick = (currentPage) =>{
    ++currentPage;
    getProductsByFilter(currentPage)
}

getProductsByFilter();

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

