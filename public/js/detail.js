function getParam(param) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    return urlParams.get(param)
}

$(document).ready(function () {
    var productId = getParam('productId')
    $.ajax({
        url: 'http://localhost/api/products/show.php?productId=' + productId,
        type: 'GET',
        success: function (data) {
            var product = JSON.parse(data)
            renderProductUI(product)
        },
        error: function (e) {
            console.log(e.message);
        }
    });
})


// tang so luong
function incrementAmount() {
  let num = Number($("#amount-input").val()); 
  num += 1
  $("#amount-input").val(num)
}

// giam so luong
function decrementAmount() {
  let num = Number($("#amount-input").val()); 
  if (num === 1) return
  num -= 1
  $("#amount-input").val(num)
}

// show All Detail Products
function renderProductUI(product) {
    $('#product-detail').append(
        `
        <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a href="${product.image}">
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
            src="${product.image}" />
            </a>
          </div>
          <div class="d-flex justify-content-center mb-3">
            <a class="border mx-1 rounded-2" href="#">
              <img width="120" height="120" class="rounded-2" src="./public/images/7.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
              <img width="120" height="120" class="rounded-2" src="./public/images/3.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
              <img width="120" height="120" class="rounded-2" src="./public/images/4.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
              <img width="120" height="120" class="rounded-2" src="./public/images/8.jpg" />
            </a>
            <a class="border mx-1 rounded-2" href="#">
              <img width="120" height="120" class="rounded-2" src="./public/images/2.jpg" />
            </a>
          </div>
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
            ${product.name}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  4.5
                </span>
              </div>
            </div>

            <div class="mb-3">
              <span class="h5">${product.price}$</span>
              
            </div>

            <p>
             Cá sản phẩm đến từ các thương hiệu, luôn đem lại những sản phẩm tốt cho khách hàng.
             Đảm bảo về mặt tinh dùng cho khách hàng, đem lại sự hài lòng cho mọi người tinh dùng.  
            </p>

            <div class="row">
              <dt class="col-3">Vận Chuyển</dt>
              <dd class="col-9">Nhanh</dd>

              <dt class="col-3">Màu Sắc</dt>
              <dd class="col-9">Đỏ</dd>

              <dt class="col-3">Thương Hiệu</dt>
              <dd class="col-9">Gucci</dd>             
            </div>
            <hr />
            <div class="row mb-4">
              <div class="col-md-4 col-6">
                <label class="mb-2">Size</label>
                <select class="form-select border border-secondary" style="height: 35px;">
                  <option>Size M</option>
                  <option>Size L</option>
                  <option>Size XL/option>
                </select>
              </div>
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group mb-3" style="width: 170px;">
                  <button onclick="decrementAmount()" class="btn btn-white border border-secondary px-3" type="button" 
                    data-mdb-ripple-color="dark">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input value="1" id="amount-input" type="number" class="form-control text-center border border-secondary" placeholder="0"
                    aria-label="Example text with button addon" aria-describedby="button-addon1" />
                  <button onclick="incrementAmount()" class="btn btn-white border border-secondary px-3" type="button"
                    data-mdb-ripple-color="dark">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-warning shadow-0"> Mua Ngay </a>
            <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Thêm Vào Giỏ Hàng </a>
          </div>
        </main>
      </div>
        `
    )
}