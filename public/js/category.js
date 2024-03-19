function getParam(param){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function () {
    var categoryId = getParam('categoryId')
    $.ajax({
        url: 'http://localhost/api/categories/show.php?categoryId=' + categoryId,
        type: 'GET',
        success: function (data) {
            var productList = JSON.parse(data)
            renderProductListUI(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})


// showAllProducts
function renderProductListUI(productList) {
    productList.forEach(product => {
        $('#category-list').append(
            `
        <a class="item" style="text-decoration:none" href=detail.html?productId=${product.id}">
            <div class="row ">
            <img src="${product.image} " alt=" ">
            <div class=" product-text ">
              <h5>Sale</h5>
           </div>
           <div class="heart-icon ">           
           </div>
             <div class="ratting ">
              <i class='bx bx-star'></i>
              <i class='bx bx-star'></i>
              <i class='bx bx-star'></i>
              <i class='bx bx-star'></i>  
              <i class='bx bxs-star-half'></i>
             </div>
              <div class="price ">
                <h4>${product.name}</h4>
                <p> ${product.price}</p>
                <h2>Mua Ngay</h2>
                <i><img src="./public/images/giohang.png"></i>
              </div>
            </div>
            `
        )
    });
}