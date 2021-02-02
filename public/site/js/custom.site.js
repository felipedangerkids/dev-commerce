$('.banner_slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    arrows:false,
  });

  $('.produtos').slick({
    dots: false,
    infinite: true,
    autoplayspeed: 1000,
    speed: 300,
    adptiveHeight:true,
    arrows:true,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: '<i class="fas fa-chevron-left left-arrow"></i>',
    nextArrow: '<i class="fas fa-chevron-right right-arrow"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });




document.querySelector("#open_menu").onclick = function() {
    document.querySelector("#menu_slider").classList.add("menu-body");
    document
        .querySelector("#menu_slider > .menu-box")
        .classList.add("menu-box-size");

    document.querySelector("body").classList.add("modal-open");
};

document.querySelector(".close-menu").onclick = function(e) {
    let close_box =
        e.target == document.querySelector("#menu_slider") ? true : false;
    let close_button =
        e.target == document.querySelector("button.close-menu") ? true : false;

    if (close_box || close_button) {
        document
            .querySelector("#menu_slider > .menu-box")
            .classList.remove("menu-box-size");
        setTimeout(function() {
            document
                .querySelector("#menu_slider")
                .classList.remove("menu-body");

            document.querySelector("body").classList.remove("modal-open");
        }, 1000);
    }
};

// Cart
document.querySelector("#open_cart").onclick = function() {
    document.querySelector("#cart_shop").classList.add("cart-body");
    document
        .querySelector("#cart_shop > .cart-box")
        .classList.add("cart-box-size");

    document.querySelector("body").classList.add("modal-open");
};

document.querySelector(".close-cart").onclick = function(e) {
    let close_box =
        e.target == document.querySelector("#cart_shop") ? true : false;
    let close_button =
        e.target == document.querySelector("button.close-cart") ? true : false;

    if (close_box || close_button) {
        document
            .querySelector("#cart_shop > .cart-box")
            .classList.remove("cart-box-size");
        setTimeout(function() {
            document.querySelector("#cart_shop").classList.remove("cart-body");

            document.querySelector("body").classList.remove("modal-open");
        }, 1000);
    }
};

// Pesquisar cep


$(".imagem-produto-1").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".imagem-produto-2"
});

$(".imagem-produto-2").slick({
    slidesToShow: 3,
    asNavFor: ".imagem-produto-1",
    dots: true,
    centerMode: true,
    focusOnSelect: true
});

$(function() {
    $("#main-menu").smartmenus({
        subMenusSubOffsetX: 6,
        subMenusSubOffsetY: -8
    });
});

$(function() {
    $("#sub-main-menu").smartmenus({
        mainMenuSubOffsetX: 1,
        mainMenuSubOffsetY: -8,
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});

$(function() {
    $("#lateral-main-menu").smartmenus({
        mainMenuSubOffsetX: 1,
        mainMenuSubOffsetY: -8,
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});

$(".cpf").mask("000.000.000-00");
$(".fone").mask("(00) 0000-0000");
$(".cel").mask("(00) 00000-0000");

$(".birth_date").mask("99/99/9999");
$(".cep").mask("00000-000");
$(".mes").mask("00");
$(".ano").mask("0000");
$(".cvv").mask("0000");

// $(".cart-remove").click(function () {

   
//     $.ajax({
//         url: "/cart/remove/",
//         success: function (result) {
            
//         },
//     });
// });



// responsive js

document.querySelector("#open_menu2").onclick = function () {
    document.querySelector("#menu_slider2").classList.add("menu-body");
    document
        .querySelector("#menu_slider2 > .menu-box")
        .classList.add("menu-box-size");

    document.querySelector("body").classList.add("modal-open");
};

document.querySelector(".close-menu2").onclick = function (e) {
    let close_box =
        e.target == document.querySelector("#menu_slider2") ? true : false;
    let close_button =
        e.target == document.querySelector("button.close-menu2") ? true : false;

    if (close_box || close_button) {
        document
            .querySelector("#menu_slider2 > .menu-box")
            .classList.remove("menu-box-size");
        setTimeout(function () {
            document
                .querySelector("#menu_slider2")
                .classList.remove("menu-body");

            document.querySelector("body").classList.remove("modal-open");
        }, 1000);
    }
};

// Cart
document.querySelector("#open_cart2").onclick = function () {
    document.querySelector("#cart_shop").classList.add("cart-body");
    document
        .querySelector("#cart_shop > .cart-box")
        .classList.add("cart-box-size");

    document.querySelector("body").classList.add("modal-open");
};

document.querySelector(".close-cart2").onclick = function (e) {
    let close_box =
        e.target == document.querySelector("#cart_shop") ? true : false;
    let close_button =
        e.target == document.querySelector("button.close-cart") ? true : false;

    if (close_box || close_button) {
        document
            .querySelector("#cart_shop > .cart-box")
            .classList.remove("cart-box-size");
        setTimeout(function () {
            document.querySelector("#cart_shop").classList.remove("cart-body");

            document.querySelector("body").classList.remove("modal-open");
        }, 1000);
    }
};
