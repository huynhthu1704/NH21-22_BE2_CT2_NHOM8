const colorDot = document.querySelectorAll('.detail-colors a');

colorDot.forEach(dot => {
    dot.addEventListener('click', function () {

        colorDot.forEach(el=>{
            el.classList.remove('active');
        })
        
        dot.classList.add('active');
        const list = document.querySelectorAll('.product-image-gallery');

        list.forEach(el =>{
            el.classList.add('d-none');
        })
        
        const active = document.querySelector(`.${this.dataset.list}`);
        active.classList.remove('d-none');
        const firstImg = active.querySelector('.product-gallery-item');
        firstImg.click();

        const cart = document.querySelector('.detail-cart');
        cart.dataset.productId = this.dataset.productId
        cart.dataset.colorId = this.dataset.colorId
    });
})