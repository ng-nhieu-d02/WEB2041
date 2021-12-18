var getStatus = document.getElementsByClassName('TraThai');
var getselectTT = document.getElementsByClassName('selectTT');
for (var i = 0; i < getStatus.length; i++) {
    if (getStatus[i].innerHTML == "Chờ Xử Lý") {
        getselectTT[i].style.background = "rgb(33, 178, 245)";
    } else if (getStatus[i].innerHTML == "Đang Xử Lý") {
        getselectTT[i].style.background = "yellow";
    } else if (getStatus[i].innerHTML == "Thất Bại") {
        getselectTT[i].style.background = "rgb(240, 25, 54)";
    } else if (getStatus[i].innerHTML == "Đã Huỷ") {
        getselectTT[i].style.background = "rgb(250, 93, 20)";
    } else {
        getselectTT[i].style.background = "chartreuse";
    }
}
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