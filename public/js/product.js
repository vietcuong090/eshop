/**
 * Home Page
 */
// ready
$(document).ready(function () {
    getAllProducts();
   
})

var productions = []


// get all products
function getAllProducts() {
    $.ajax({
        url: 'http://localhost/api/products/index.php',
        type: 'GET',
        success: function (data) {
            var productList = JSON.parse(data)
            productions = productList
            renderProductListUI(productList)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
}
//
function addtocart(id) {
    try {
        const production = productions.find((item) => item.id === id)
        if (!production) return
        const ordersString = localStorage.getItem("ORDERS")
        if (ordersString) {
            const list = JSON.parse(ordersString)
            if (Array.isArray(list)) {
                const orderIndex = list.findIndex((item) => item.production.id === production.id)
                if (orderIndex > -1) {
                    list[orderIndex].amount =  list[orderIndex].amount + 1
                } else {
                    list.push({
                        production,
                        amount: 1
                    })
                }
                localStorage.setItem("ORDERS", JSON.stringify(list))
            }
        } else {
            localStorage.setItem("ORDERS", JSON.stringify([{
                production,
                amount: 1
            }]))
        }
        location.href="cart.html"
    } catch (error) {
        console.log({error})
    }
}
// showAllProducts
function renderProductListUI(productList) {
    productList.forEach(product => {
        $('#product-list').append(
            `           
            <div class="row">
                <a class="item" style="text-decoration:none" href=detail.html?productId>
                <img src="${product.image}" alt="">
                </a>
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
                    <i><button onclick="addtocart(${product.id})"><img src="./public/images/giohang.png"></buttom></i>
                </div>
            </div>
        
       
            `
        )
    });
}

// get hot Products
// function getHotProducts() {
//     $.ajax({
//         url: 'http://localhost/api/products/hot.php',
//         type: 'GET',
//         success: function (data) {
//             var productList = JSON.parse(data)
//             renderHotProducts(productList)
//         },
//         error: function (e) {
//             console.log(e.message);
//         }
//     });
// } addEventListener
// show hot products
// function renderHotProducts(productList) {
//     productList.forEach(product => {
//         $('#product-hot').append(
//             `
//                 <div class="col-md-3 py-3">
                
//                 <a class="card" style="text-decoration: none" href="detail.html?productId=${product.id}">
//                  <img src= "${product.image}" alt="">
//                     <div class="card-body">
//                         <h3 class="text-center">${product.name}</h3>
//                         <p class="text-center">Sản phẩm bán chạy nhất.</p>
//                         <div class="star text-center">
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         <i class="fa-solid fa-star checked"></i>
//                         </div>
//                         <h2>$${product.price} <span>
//                             <li class="fa-solid fa-cart-shopping"></li>
//                         </span></h2>
//                     </div>
//                 </a>
//             </div> 
//             `
//         )
//     });
// }
