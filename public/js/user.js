// ---------- SLIDESHOW FOR NAVBAR
var slideIndex = 1;
showDivs(slideIndex);

$('.prev1').on('click', function() {
  var slides = $('.navbar-slide');
  if (slides.eq(slideIndex-1).css('opacity') == 1) {
    // console.log("prev1");
    slides.eq(slideIndex-1).fadeOut(100, function() {
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
    slides.eq(slideIndex-1).fadeOut(100, function() {
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
    slides.eq(slideProduct-1).fadeOut(300, function() {
      slideProduct -= 1;
      showProd(slideProduct);
    });
  }
  var form = $('#order-form-'+(slideProduct-1));
  if (form.css('opacity') == 1) {
    form.fadeOut(300);
  }
});

$('.next2').on('click', function() {
  var slides = $('.product-slide');
  if (slides.eq(slideProduct-1).css('opacity') == 1) {
    slides.eq(slideProduct-1).fadeOut(300, function() {
      slideProduct += 1;
      showProd(slideProduct);
    });
  }
  var form = $('#order-form-'+(slideProduct-1));
  if (form.css('opacity') == 1) {
    form.fadeOut(300);
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
  if ($('.product-slide').eq(slideProduct-1).css('opacity') == 1) {
    $('#order-form-'+(slideProduct-1)).fadeIn("slow");
    var x = document.getElementById("order-form-"+(slideProduct-1));
    x.scrollIntoView();
  } 
}

function nullOrEmpty(str) {
  return (str == null || str == "");
}

function checkOrderForm(idx) {
  var name = document.getElementById('id-name-'+idx).value;
  var email = document.getElementById('id-email-'+idx).value;
  var phone = document.getElementById('id-phone-'+idx).value;
  var address = document.getElementById('id-address-'+idx).value;
  var city = document.getElementById('id-city-'+idx).value;
  var state = document.getElementById('id-state-'+idx).value;
  var zipcode = document.getElementById('id-zipcode-'+idx).value;

  var empty = false;
  if (nullOrEmpty(name) || nullOrEmpty(email) || nullOrEmpty(phone) || nullOrEmpty(address) || nullOrEmpty(city) || nullOrEmpty(state) || nullOrEmpty(zipcode)) {
    empty = true;
  }

  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var validEmail = re.test(String(email).toLowerCase());
     
  var validPhone = /^\d+$/.test(phone);
  var validZipcode = (/^\d+$/.test(zipcode) && zipcode.length == 6);
  var warning = document.getElementById('order-warning-message-'+idx);
  if (empty) {
    warning.style.visibility = "visible";
    warning.innerHTML = "Please fill all field";
  } else if (!validEmail) {
    warning.style.visibility = "visible";
    warning.innerHTML = "Invalid email";
  } else if (!validPhone) {
    warning.style.visibility = "visible";
    warning.innerHTML = "Invalid phone number";
  } else if (!validZipcode) {
    warning.style.visibility = "visible";
    warning.innerHTML = "Invalid zipcode";
  }
  return (validPhone && validZipcode && validEmail && !empty);
}

// ---------- HOME