const updateCart = async (product_id, color_id, quantity) => {

    const data =
    {
        product_id: product_id,
        color_id: color_id,
        qty: quantity
    }

    const token = document.querySelector('meta[name=csrf-token]').content

    const response = await fetch('/cart/update',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        })

    const result = await response.json();
    await renderCartHeader(result);
    await reRenderCart(product_id, color_id);
}

const reRenderCart = async (product_id, color_id) => {

    const tr = document.querySelector(`#cart-item-${product_id}-${color_id}`);
    const totalPriceItem = tr.querySelector('.total-col');
    const subtotal = document.querySelector('.sub-total');
    const token = document.querySelector('meta[name=csrf-token]').content
    const data = {
        product_id: product_id,
        color_id: color_id
    }

    const response = await fetch('/cart/call',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        });

    const result = await response.json();

    if (result.totalItemPrice) {
        totalPriceItem.innerHTML = formatter.format(result.totalItemPrice);
    }

    subtotal.innerHTML = formatter.format(result.totalSalesPrice);
}

const renderCartHeader = async (result) => {

    const product_container = document.querySelector('#product_container');
    const cartCount = document.querySelector('.cart-count');
    const total = document.querySelector('.cart-total-price');
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
}

const removeViewCartItem = async (product_id, color_id) => {
    removeItem(`${product_id}-${color_id}`);
    const tr = document.querySelector(`#cart-item-${product_id}-${color_id}`);
    tr.remove();
    const token = document.querySelector('meta[name=csrf-token]').content

    const data = {
        product_id: product_id,
        color_id: color_id
    }

    const response = await fetch('/cart/call',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': token,
            },
            body: JSON.stringify(data)
        });
        
    const result = await response.json();

    reRenderCart(product_id, color_id);
    renderCartHeader(result)
}