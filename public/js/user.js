// ---------- SLIDESHOW FOR NAVBAR
var slideIndex = 1;
showDivs(slideIndex);

$('.prev1').on('click', function() {
  var slides = $('.navbar-slide');
  if (slides.eq(slideIndex-1).css('opacity') == 1) {
    // console.log("prev1");
    slides.eq(slideIndex-1).fadeOut(500, function() {
      slideIndex -= 1;
      showDivs(slideIndex);
    });
      // $('.navbar-slide').eq(slideIndex-1).css({
      //     opacity          : 0,
      //     WebkitTransition : 'all 1s ease-in-out',
      //     MozTransition    : 'all 1s ease-in-out',
      //     MsTransition     : 'all 1s ease-in-out',
      //     OTransition      : 'all 1s ease-in-out',
      //     transition       : 'all 1s ease-in-out'
      // });
    }
});

$('.next1').on('click', function() {
  var slides = $('.navbar-slide');
  if (slides.eq(slideIndex-1).css('opacity') == 1) {
    // console.log("next1");
    slides.eq(slideIndex-1).fadeOut(500, function() {
      slideIndex += 1;
      showDivs(slideIndex);
    });
  }
});

// function plusDivs(n) {
//   var x = document.getElementsByClassName("navbar-slide");
//   if (x[slideIndex-1].style.opacity == 1) {
//     var cssString = "opacity: 0; -webkit-transition: opacity 1s; transition: opacity 1s;"
//     x[slideIndex-1].style.cssText = cssString;
//   }

//   showDivs(slideIndex += n);
// }

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("navbar-slide");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

// ---------- SLIDESHOW FOR PRODUCTS
var slideProduct = 1;
showProd(slideProduct);

$('.prev2').on('click', function() {
  var slides = $('.product-slide');
  if (slides.eq(slideProduct-1).css('opacity') == 1) {
    slides.eq(slideProduct-1).fadeOut(500, function() {
      slideProduct -= 1;
      showProd(slideProduct);
    });
  }
});

$('.next2').on('click', function() {
  var slides = $('.product-slide');
  if (slides.eq(slideProduct-1).css('opacity') == 1) {
    slides.eq(slideProduct-1).fadeOut(500, function() {
      slideProduct += 1;
      showProd(slideProduct);
    });
  }
});

function showProd(n) {
  var i;
  var x = document.getElementsByClassName("product-slide");
  if (n > x.length) {slideProduct = 1}
  if (n < 1) {slideProduct = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideProduct-1].style.display = "flex";  
}

// ---------- Buy Now Product
function buyNowClick() {
  $('.form-style').fadeIn("slow");
  var x = document.getElementsByClassName("form-style");
  x[0].scrollIntoView();
}