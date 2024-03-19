document.addEventListener("DOMContentLoaded", (event) => {
    console.log("DOM fully loaded and parsed");
    const ordersString = localStorage.getItem("ORDERS")
    try {
        const list = JSON.parse(ordersString)
        if (Array.isArray(list)) {
            renderCart(list)
        }
    } catch (error) {
        console.log({error})

    }
    function getAllProducts() {
        $.ajax({
            URL: "http://localhost/api/products/index.php",
            type: "GET",
            success: function (data) {
                var productList = JSON.parse(data);
                renderProductListUI(productList);
            },
            error: function (e) {
                console.log(e.message);
            },
        });
    }
    var itemList = []

    function loadCart() {
        var json = localStorage.getItem('cart')
        if (json != null) {
            itemList = JSON.parse(json)     //sử dụng để chuyển đổi một chuỗi JSON thành một đối tượng JavaScript.
        }
        console.log(itemList)
        render(itemList)
    }

    function saveToLocaStorage() {
        this.localStorage.setItem('cart', JSON.stringify(itemList))
    }
    //Save todoList to localStorage when tab closing
    window.addEventListener('beforeunload', function (e) {
        saveToLocaStorage()
    });

    function addToCart(item) {
        let count = 0
        itemList.forEach(it => {
            if (it.productId == item.productId) {
                it.quantity += item.quantity
                count++;
            }
        })
        if (count == 0) {
            itemList.push(item)
        }

        saveToLocaStorage()
    }

    function removeFromCart(productId) {
        for (let i = 0; i < itemList.length; i++) {
            if (productId == itemList[i].productId) {
                itemList.splice(i, 1)

            }
        }
        renderCart(itemList)
    }
});

 // tang so luong
 function incrementAmount(id) {
    let num = Number($(`#amount-input-${id}`).val()); 
    num += 1
    const ordersString = localStorage.getItem("ORDERS")
    try {
        const list = JSON.parse(ordersString)
        if (Array.isArray(list)) {
            const index = list.findIndex((item) => item.production.id === id)
            if (index > -1) {
                list[index].amount = num
            }
            localStorage.setItem("ORDERS", JSON.stringify(list))
            renderCart(list)
        }
    } catch (error) {
        console.log({error})

    }
    $(`#amount-input-${id}`).val(num)
}

// xoa san pham
function removeProduction(id) {
    const ordersString = localStorage.getItem("ORDERS")
    try {
        let list = JSON.parse(ordersString)
        if (Array.isArray(list)) {
            list = list.filter((item) => item.production.id !== id)
            localStorage.setItem("ORDERS", JSON.stringify(list))
            renderCart(list)
        }
    } catch (error) {
        console.log({error})

    }
}

// giam so luong
function decrementAmount(id) {
    let num = Number($(`#amount-input-${id}`).val()); 
    if (num === 1) return
    num -= 1
    const ordersString = localStorage.getItem("ORDERS")
    try {
        const list = JSON.parse(ordersString)
        if (Array.isArray(list)) {
            const index = list.findIndex((item) => item.production.id === id)
            if (index > -1) {
                list[index].amount = num
            }
            localStorage.setItem("ORDERS", JSON.stringify(list))
            renderCart(list)
        }
    } catch (error) {
        console.log({error})

    }
    $(`#amount-input-${id}`).val(num)
}

function renderCart(cart) {
    $('#products-cart').empty()
    if (cart.length === 0) {
        return $('#products-cart').append(
            `<p>Khong co san pham nao</p>`
        );
    }
    for (let i = 0; i < cart.length; i++) {
        let product = cart[i].production;
        let amount = cart[i].amount;
        let productElement = `
        <div class="row border-top border-bottom">
            <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="${product.image}"></div>
                <div class="col">
                    <div class="row text-muted">Shirt</div>
                    <div class="row">${product.name}</div>
                </div>
                <div class="col">
                <div class="input-group mb-3" style="width: 170px;">
              <button onclick="decrementAmount(${product.id})" class="btn btn-white border border-secondary px-3" type="button" 
                data-mdb-ripple-color="dark">
                <i class="fas fa-minus"></i>
              </button>
              <input value="${amount}" id="amount-input-${product.id}" type="number" class="form-control text-center border border-secondary" placeholder="0"
                aria-label="Example text with button addon" aria-describedby="button-addon1" />
              <button onclick="incrementAmount(${product.id})" class="btn btn-white border border-secondary px-3" type="button"
                data-mdb-ripple-color="dark">
                <i class="fas fa-plus"></i>
              </button>
            </div>
                </div>
                <div class="col">&euro; ${product.price * amount} <span class="close"> 
                <button onclick="removeProduction(${product.id})" class="btn btn-white border border-secondary px-3" type="button"
                data-mdb-ripple-color="dark" style="margin-top:-21px">
                <i class="fas fa-close"></i>
              </button></span></div>
            </div>
        </div>
           `;
        // Thêm sản phẩm vào #cart-list
        $('#products-cart').append(productElement);

    }
    // // Tính tổng số lượng và giá trị đơn hàng
    // let subtotal = 0;
    // for (let i = 0; i < cart.length; i++) {
    //     const product = cart[i];
    //     subtotal += product.productPrice * product.quantity;
    // }

    // // Formatting subtotal as currency


    // // Render summary
    // let summaryElement = `
    //               <div class="col-lg-4 bg-grey">
    //                   <div class="p-5">
    //                       <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
    //                       <hr class="my-4">
  
    //                           <h5 class="text-uppercase mb-3">Give code</h5>
  
    //                           <div class="mb-5">
    //                               <div class="form-outline">
    //                                   <input type="text" id="form3Examplea2"
    //                                       class="form-control form-control-lg" />
    //                                   <label class="form-label" for="form3Examplea2">Enter your code</label>
    //                               </div>
    //                           </div>
  
    //                           <hr class="my-4">
  
    //                               <div class="d-flex justify-content-between mb-5">
    //                                   <h5 class="text-uppercase">Total price</h5>
    //                                   <h5>${subtotal}.000</h5>
    //                               </div>
  
    //                               <button type="button" class="btn btn-dark btn-block btn-lg"
    //                                   data-mdb-ripple-color="dark">Register</button>
  
    //                           </div>
    //                   </div>
  
    //                   `;

    // $('#cart-list').append(summaryElement);
    // addCartEvents();
}

function addCartEvents() {
    let btnDeleteItem = document.getElementById('btnDeleteItem')
    btnDeleteItem.addEventListener('click', doDeleteItem)
}

function doDeleteItem() {
    let productId = Number(document.getElementById('productId').value)
    removeFromCart(productId)
}

