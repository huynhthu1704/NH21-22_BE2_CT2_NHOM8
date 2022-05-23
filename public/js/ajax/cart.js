
const addCart = async (cart) =>{

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
    console.log(result);
    
}