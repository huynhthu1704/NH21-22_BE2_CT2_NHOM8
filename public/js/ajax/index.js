const btn_LoadMore = document.querySelectorAll('.btn-more');

let perpage = 4;

let all = -1,
    sofas = -1,
    chairs = -1,
    lamps = -1;

btn_LoadMore.forEach(el => {
    el.addEventListener('click', () => {
        loadMore(el.dataset.categoryId, el.dataset.container, el);
    })
    loadMore(el.dataset.categoryId, el.dataset.container, el);
});


async function loadMore(category_id, container, btnLoad) {

    let p = 0;
    switch (category_id) {
        case '-1':
            all++
            p = all

            break;
        case '1':
            sofas++
            p = sofas
            break;
        case '3':
            chairs++
            p = chairs
            break;
        case '7':
            lamps++
            p = lamps
            break;
    }


    const url = "./api/getNew/" + category_id + "/" + p + "/" + perpage;
    const respone = await fetch(url);
    const result = await respone.json();

   
    let html = '';
    let n = result.length - 1;

    if (result.length < 5) {
        btnLoad.style.display = 'none';
        n = result.length;
    }


    for (let i = 0; i < n; i++) {
        const product = result[i];

        const product_key = `product-${product.product_id}-${product.category_name}` ;
        html += `<div class="col-6 col-md-4 col-lg-3">

                        <div class="product product-11 mt-v3 text-center" id="${product_key}-new">
                            <figure class="product-media">
                            ${product.discount != 0 ? `<span class="product-label label-sale">${product.discount}% OFF</span>` : ''}`;
        
        product.colors.forEach((color, i) => {
            const images = color.src.split("#");
            html +=
                `<a href="#" class="${color.color_name} ${ i !== 0 ? 'd-none' : ''}">
                                        <img src="./images/molla/${product.category_name}/${images[0]}"
                                            alt="Product image" class="product-image">
                                        <img src="./images/molla/${product.category_name}/${images[1]}"
                                            alt="Product image" class="product-image-hover">
                                    </a>`;
        });
        html +=
            `<div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                wishlist</span></a>
                                    </div>
                                </figure>

                                <div class="product-body">
                                    <h3 class="product-title"><a href="#">${product.product_name}</a></h3>
                                    <div class="product-price">
                                    <div class="product-price">
                						
                						${product.discount != 0 ?
                                            `<span class="new-price">${formatter.format(product.sales_price)}</span>
                                            <span class="old-price"><del>${formatter.format(product.price)}</del></span>`
                                            : `<span class="new-price">${formatter.format(product.price)}</span>`}
                					</div>
                                        
                                    </div>

                                    <div class="product-nav product-nav-dots">`;
                            const color_id = product.colors[0].color_id;
                            if (product.colors.length > 1) {
                                
                                product.colors.forEach((color, i) => {
                                    html +=
                                        `
                                            <a href="javascript:void(0)" class="${ i===0 ? 'active' : ''}" 
                                            data-product-id=${product.product_id}
                                            data-color-id=${color.color_id}
                                            data-color-name=${color.color_name} 
                                            onclick="setObj(this)"
                                            data-obj="${product_key}-new"
                                            style="background: ${color.color_code};"><span
                                                class="sr-only">Color name</span></a>
                                            `
                                });
                            }
                            html +=
                                `</div>
                                </div>
                                <div class="product-action">
                                    <a href="javascript:void(0)" onclick="addCart(this)" class="btn-product btn-cart btn-addCart" 
                                    data-product-id="${product.product_id}" data-color-id=${color_id}><span>add to cart</span></a>
                                </div>
                            </div>
                        </div>`;

    }
    const divResult = document.querySelector(`#${container}`);
    divResult.insertAdjacentHTML('beforeend', html);

}
function setObj(obj) {
    const listImg = document.querySelector(`#${obj.dataset.obj}`)
    const imgs = listImg.querySelectorAll(`figure a`);

    imgs.forEach(img =>{
        img.classList.add('d-none');
    });

    const img = listImg.querySelector(`.${obj.dataset.colorName}`);
    img.classList.remove('d-none');

    const cart = listImg.querySelector(`.btn-cart`);
    cart.dataset.productId = obj.dataset.productId
    cart.dataset.colorId = obj.dataset.colorId
}
var formatter = new Intl.NumberFormat('it-IT', {
    style: 'currency',
    currency: 'VND',
});