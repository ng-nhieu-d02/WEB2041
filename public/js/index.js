  //get sessionStorage
//sessionStorage.clear();

fetch('http://localhost:3000/products')
  .then(function(res) {
    if(!res.ok) throw Error("loi: "+ res.statusText);
      return res.json();
  })
  .then(function(data) {
    str = "";
    for (i in data) {
      str += `
          <div class="box">
                <h4 style="display:none;">${data[i].price}</h4>
                <a href="product/home/${data[i].id}"> <img src="${data[i].image}" alt=""> </a>
                <h3>${data[i].name}</h3>
                <p>${data[i].price}</p>
                <a class="btn btn-add-to-card" name=${data[i].id}>add to your cart</a>
            </div>
      `;
    }
    document.querySelector('.box-product').innerHTML = str;
  })
  .catch(function(err){
    console.log(err); 
  })

if(sessionStorage.getItem('yourcart')==null){
  var getcart = "0*";
} else{
var getcart = sessionStorage.getItem('yourcart');
}

infoprd = getcart.split('*')

//cong total price in cart

$(document).on('click','.cong',function(e){
  e.preventDefault();
  var countitem = $(this).parents('.content')
  var count = parseInt(countitem.find('.quantity').data('count'))+1;
  countitem.find('.quantity').text(count).data('count',count);
  count_total_price();
});

// add product to cart

$(document).on('click', '.btn-add-to-card', function (e){
    $('div').remove('.no-prd-in-cart')
    e.preventDefault();
    var parent = $(this).parents('.box');
    var src = parent.find('img').attr('src');
    var name = parent.find('h3').text();
    var prime = parent.find('h4').text();
    var getnameprd = parent.find('.btn-add-to-card').attr('name');
    if (document.getElementsByName(getnameprd).length > 1){
      let orderfail = document.querySelector('.order-fail');
      setTimeout(function(){
        orderfail.classList.toggle('active');
        setTimeout(function(){
          orderfail.classList.remove('active');
        },1000);
      },500);
    } else{
      $('<div class="box box-prd-in-your-cart"><i class="fas fa-trash remove-prd-in-cart"></i><img class="imgPrdInCart" src="'+src+'" alt=""><div class="content"><h3 class="namePrdInCart">'+name+'</h3><p class="price">'+prime+'</p><span>Số Lượng:</span><span class="tru"><button><i class="bi bi-arrow-down"></i></button></span><span class="quantity" name="'+getnameprd+'"  data-count="1">1</span><span class="cong"><button><i class="bi bi-arrow-up"></i></button></span></div></div>').prependTo('.cart-shopping')
      getcart = getcart.concat(getnameprd+"|"+src+"|"+name+"|"+prime+"|1*");
      sessionStorage.setItem('yourcart',getcart);
      let ordersuccess = document.querySelector('.order-success');
      setTimeout(function(){
        ordersuccess.classList.toggle('active');
        setTimeout(function(){
          ordersuccess.classList.remove('active');
        },1000);
      },500);
    }
    count_total_price();
});


//tru total price in cart

$(document).on('click','.tru',function(e){
  e.preventDefault();
  var countitem = $(this).parents('.content')
  var countqty = parseInt(countitem.find('.quantity').data('count'))-1;
  if (countqty < 1) {

  } 
  else {
    countitem.find('.quantity').text(countqty).data('count',countqty);
  }
  count_total_price();
});

//remove product

$(document).on('click', '.remove-prd-in-cart', function (e){
    e.preventDefault();
    var parentc = $(this).parents('.box');
    var srcremove = parentc.find('img').attr('src');
    var nameremove = parentc.find('h3').text();
    var primeremove = parentc.find('.price').text();
    var getnameremove = parentc.find('.quantity').attr('name');

    let keyremove = getnameremove +"|"+srcremove+"|"+nameremove+"|"+primeremove+"|1*"

    let removecart = sessionStorage.getItem('yourcart').split(keyremove).join('');

    sessionStorage.setItem('yourcart',removecart);
    parentc.remove();
    count_total_price();
    if(document.getElementsByClassName('count-prd-avt')[0].innerHTML==0){
      $('<div class="no-prd-in-cart"><p>Bạn Chưa Chọn Sản Phẩm nào !!!</p></div>').prependTo('.cart-shopping');
    }
    
});

//get cart add Oder

function selectPrd(){
  var select = "";
  let selectPrdImg = document.getElementsByClassName('imgPrdInCart');
  var selectPrdPrice = document.getElementsByClassName('price');
  var selectPrdQty = document.getElementsByClassName('quantity');
  var selectPrdName = document.getElementsByClassName('namePrdInCart');
  var selectTotal = document.getElementsByClassName('total-price-in-the-cart');
  for(var index = 0; index<selectPrdImg.length; index++){
      select = select.concat(selectPrdQty[index].getAttribute('name')+"|"+selectPrdName[index].innerHTML+"|"+selectPrdImg[index].src+"|"+selectPrdPrice[index].innerHTML+"|"+selectPrdQty[index].innerHTML+"*")
  }

  

  sessionStorage.setItem('Oder',select);
  sessionStorage.setItem('Oder-gia',selectTotal[0].innerHTML);
  var OderDetail = sessionStorage.getItem('Oder');
  var OderTotal = sessionStorage.getItem('Oder-gia');

  if(OderDetail.split("*").length > 1 & OderTotal != null){
    window.location="users/Oder";
  }else{
    alert('bạn chưa chọn con mẹ gì cả :)))');
  }
}

if(sessionStorage.getItem('Oder')!=null){
  var OderDetail = sessionStorage.getItem('Oder').split("*");
  var OderTotal = sessionStorage.getItem('Oder-gia');
  if(OderDetail.length > 1 & OderTotal != null){
    var json = '';
    var str = '[{ "name": "Amazon","ceo" : "Jeff Bezos","employees" : "oke"},{"name": "Amazon","ceo" : "Jeff Bezos","employees" : "oke"}]';
      for(let x = 0; x < OderDetail.length-1; x++){
        var chiaOder = OderDetail[x].split("|");
        $('<div class="contentOder"><input name="idPrd[]" class="idPrd" value="'+chiaOder[0]+'" readonly><input name="NamePrd[]" value="'+chiaOder[1]+'" disabled><input type="image" class="imgPrdOder" src="'+chiaOder[2]+'" alt="" disabled><input name="PricePrd[]" value="'+chiaOder[3]+'" readonly><input name="qtyOder[]" value="Số Lượng: '+chiaOder[4]+'" readonly></div>').appendTo('.contentPrd');
    //     if(x+1==OderDetail.length-1){
    //       json = json.concat('{"idSp":'+chiaOder[0]+',"GiaSp":'+chiaOder[3].split(",").join("")+',"Qty":'+chiaOder[4]+'}]');
    //     } else if (x==0) {
    //       json = json.concat('[{"idSp":'+chiaOder[0]+',"GiaSp":'+chiaOder[3].split(",").join("")+',"Qty":'+chiaOder[4]+'},');
    //     } else{
    //       json = json.concat('{"idSp":'+chiaOder[0]+',"GiaSp":'+chiaOder[3].split(",").join("")+',"Qty":'+chiaOder[4]+'},');
    //     };
      }
    // var obj = JSON.parse(json);
    $('<div><span>Tổng Tiền: </span><input type="text" name="Total" id="Total" readonly value="'+OderTotal+'"></div>').appendTo('.infoOder123');
  } else  {
      $('<div class="noPrd"><p>Bạn chưa có sản phẩm nào trong giỏ hàng</p></div>').prependTo('.contentPrd');
  }
}


//get history product

// console.log(infoprd);
if(infoprd.length >2){
  for (let index = 1; index < infoprd.length-1; index++) {
    var chiaprd = infoprd[index].split("|")
    $('<div class="box box-prd-in-your-cart"><i class="fas fa-trash remove-prd-in-cart"></i><img class="imgPrdInCart" src="'+infoprd[index].split("|")[1]+'" alt=""><div class="content"><h3 class="namePrdInCart">'+infoprd[index].split("|")[2]+'</h3><p class="price">'+infoprd[index].split("|")[3]+'</p><span>Số Lượng:</span><span class="tru"><button><i class="bi bi-arrow-down"></i></button></span><span class="quantity"  name="'+infoprd[index].split("|")[0]+'" data-count="'+infoprd[index].split("|")[4]+'">1</span><span class="cong"><button><i class="bi bi-arrow-up"></i></button></span></div></div>').prependTo('.cart-shopping')
    count_total_price();
  }
} else {
  $('<div class="no-prd-in-cart"><p>Bạn Chưa Chọn Sản Phẩm Nào !!!</p></div>').prependTo('.cart-shopping')
}

if(sessionStorage.getItem('Oder') == null){
  $('<div class="noPrd"><p>Bạn chưa có sản phẩm nào trong giỏ hàng</p></div>').prependTo('.contentPrd');
}

//tính tiền giỏ hàng

function count_total_price(){
  var count = 0;
    var prdinyourcart = document.getElementsByClassName('price');
    var qtyinyoucart = document.getElementsByClassName('quantity');
    for(var index = 0; index<prdinyourcart.length; index++){
      
      count += prdinyourcart[index].innerHTML.split(',').join("")*qtyinyoucart[index].innerHTML;
    }
    document.getElementsByClassName('total-price-in-the-cart')[0].innerHTML = count.toLocaleString('vi-VN', {
          style: 'currency',  
          currency: 'VND'
      });
    document.getElementsByClassName('count-prd-avt')[0].innerHTML = prdinyourcart.length;
}

//click search form

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    signForm.classList.remove('active');
}

//click shopping cart

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () => {
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    signForm.classList.remove('active');
}

// click sign up

let signForm = document.querySelector('.signin-form');

document.querySelector('.createform').onclick =()=>{
    signForm.classList.toggle('active');
    loginForm.classList.remove('active');
}

// click menu

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
}

//click login

let loginForm = document.querySelector(".login-form");

if (document.getElementById('login-btn')!= null) {
  document.querySelector("#login-btn").onclick = () => {
    loginForm.classList.toggle("active");
    searchForm.classList.remove("active");
    shoppingCart.classList.remove("active");
    navbar.classList.remove("active");
    signForm.classList.remove("active");
  }
}

//scroll screen

window.onscroll = () => {
    loginForm.classList.remove('active')
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

//slide review

var swiper = new Swiper(".review-slider",{
    loop: true,
    spaceBetween: 20,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
});

// set color status Don Hang

var getStatus = document.getElementsByClassName('Status');
var getHuy = document.getElementsByClassName('InputHuy');
for(var i=0; i<getStatus.length;i++){
  if(getStatus[i].innerText == "Chờ Xử Lý"){
    getStatus[i].style.background = "rgb(33, 178, 245)";
    getHuy[i].disabled=false;
  } else if(getStatus[i].innerText == "Đang Xử Lý"){
    getStatus[i].style.background = "yellow";
    getHuy[i].disabled=true;
  } else if(getStatus[i].innerText == "Thất Bại"){
    getStatus[i].style.background = "rgb(240, 25, 54)";
    getHuy[i].disabled=true;
  } else if(getStatus[i].innerText == "Đã Huỷ"){
    getStatus[i].style.background = "rgb(250, 93, 20)";
    getHuy[i].disabled=true;
  } else {
    getStatus[i].style.background = "chartreuse";
    getHuy[i].disabled=true;
  }
}





