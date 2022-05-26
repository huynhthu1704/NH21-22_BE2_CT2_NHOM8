
const product_container = document.querySelector('#product_container');
const cartCount = document.querySelector('.cart-count');
const total = document.querySelector('.cart-total-price');

const addCart = async (cart) => {

    const data =
    {
        product_id: cart.dataset.productId,
        color_id: cart.dataset.colorId
    }
    const token = document.querySelector('meta[name=csrf-token]').content

    const response = await fetch('/cart/add',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        })

    const result = await response.json();

    product_container.innerHTML = '';
    console.log(result.cart);
    for (const key in result.cart) {
        if (Object.hasOwnProperty.call(result.cart, key)) {
            const product = result.cart[key];
            product_container.innerHTML +=
                `<div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="product.html">${product.product_name}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">${product.quantity}</span>
                        x ${formatter.format(product.price)} VND
                    </span>
                </div><!-- End .product-cart-details -->
                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="/images/molla/${product.category_name}/${product.src}"
                            alt="product">
                    </a>
                </figure>
                <a href="javascript:void(0)" class="btn-remove" onclick="removeItem('${product.product_id}-${product.color_id}')" title="Remove Product"><i
                        class="icon-close"></i></a>
            </div><!-- End .product -->`;
        }
    }

    total.innerHTML = formatter.format(result.total);
    cartCount.innerHTML = count(result.cart);
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
}

async function removeItem(key) {
    console.log(key);
    const data =
    {
        key: key
    }
    const token = document.querySelector('meta[name=csrf-token]').content

    const response = await fetch('/cart/remove',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        })

    const result = await response.json();

    console.log(result);
    product_container.innerHTML = '';

    for (const key in result.cart) {
        if (Object.hasOwnProperty.call(result.cart, key)) {
            const product = result.cart[key];
            product_container.innerHTML +=
                `<div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="product.html">${product.product_name}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">${product.quantity}</span>
                        x ${formatter.format(product.price)}
                    </span>
                </div><!-- End .product-cart-details -->
                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="/images/molla/${product.category_name}/${product.src}"
                            alt="product">
                    </a>
                </figure>
                <a href="javascript:void(0)" class="btn-remove" onclick="removeItem('${product.product_id}-${product.color_id}')" title="Remove Product"><i
                        class="icon-close"></i></a>
            </div><!-- End .product -->`;
        }
    }

    cartCount.innerHTML = count(result.cart);
    total.innerHTML = result.total;
}

function count(obj) {

    if (obj.__count__ !== undefined) { // Old FF
        return obj.__count__;
    }

    if (Object.keys) { // ES5 
        return Object.keys(obj).length;
    }

    // Everything else:

    var c = 0, p;
    for (p in obj) {
        if (obj.hasOwnProperty(p)) {
            c += 1;
        }
    }

    return c;

}

var formatter = new Intl.NumberFormat('it-IT', {
    style: 'currency',
    currency: 'VND',
});

const addCartDetail = async (cart) => {
    const qty = document.querySelector('input#qty').value;
    const data =
    {
        product_id: cart.dataset.productId,
        color_id: cart.dataset.colorId,
        qty: qty
    }
    const token = document.querySelector('meta[name=csrf-token]').content

    const response = await fetch('/cart/add',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        })

    const result = await response.json();

    product_container.innerHTML = '';
    console.log(result.cart);
    for (const key in result.cart) {
        if (Object.hasOwnProperty.call(result.cart, key)) {
            const product = result.cart[key];
            product_container.innerHTML +=
                `<div class="product">
                <div class="product-cart-details">
                    <h4 class="product-title">
                        <a href="product.html">${product.product_name}</a>
                    </h4>

                    <span class="cart-product-info">
                        <span class="cart-product-qty">${product.quantity}</span>
                        x ${formatter.format(product.price)} VND
                    </span>
                </div><!-- End .product-cart-details -->
                <figure class="product-image-container">
                    <a href="product.html" class="product-image">
                        <img src="/images/molla/${product.category_name}/${product.src}"
                            alt="product">
                    </a>
                </figure>
                <a href="javascript:void(0)" class="btn-remove" onclick="removeItem('${product.product_id}-${product.color_id}')" title="Remove Product"><i
                        class="icon-close"></i></a>
            </div><!-- End .product -->`;
        }
    }

    total.innerHTML = formatter.format(result.total);
    cartCount.innerHTML = count(result.cart);
    
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
}