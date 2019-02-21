$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
    }
  
    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    }); 

});

/*---------- PRODUCT MANAGEMENT -----------*/

/* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
function showCollection(year) {
    var list = document.getElementById('show'+year);
    var arrow = document.getElementById('arrow'+year);

    if (arrow.classList.contains('open')) {
        arrow.className = 'fa fa-angle-right';
        list.style.display = "none";
    } else {
        arrow.className = 'fa fa-angle-right open';
        list.style.display = "block";
    }
}

function showFormAddYear() {
    var cn = document.getElementById('addY');
    var show = document.getElementById('addYear');

    if (cn.className === 'glyphicon glyphicon-plus') {
        show.style.display = "block";
        cn.className = "glyphicon glyphicon-minus";
    } else {
        show.style.display = "none";
        cn.className = "glyphicon glyphicon-plus";   
    }
}

// Close the dropdown if the user clicks outside of it
// window.onclick = function(e) {
//   if (!e.target.matches('.dropbtn')) {
//     var myDropdown = document.getElementById("myDropdown");
//     if (myDropdown.classList.contains('show')) {
//       myDropdown.classList.remove('show');
//     }
//   } 
// }

/*---------- Register Admin -----------*/
function checkEmail() {
    var email = document.getElementById("email-id").value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if( re.test(String(email).toLowerCase()) ) {
        document.getElementById("email-warning").style.display = 'none';
        document.getElementById("email-id").style.border = 'none';
    } else {
        document.getElementById("email-warning").style.display = 'block';
        document.getElementById("email-warning").innerHTML = "You have entered an invalid email address";
        document.getElementById("email-id").style.border = '1px solid #d50027';
        return false;
    }
}
function checkPassword() {
    var psw = document.getElementById("psw-id").value;
    if (psw.length < 8) {
        document.getElementById("pass-warning").style.display = 'block';
        document.getElementById("pass-warning").innerHTML = "Password must contain at least 8 characters";
        document.getElementById("psw-id").style.border = '1px solid #d50027';
        return false;
    } else {
        document.getElementById("psw-id").style.border = 'none';
        document.getElementById("pass-warning").style.display = 'none';
        return true;
    }
}

function checkConfPassword() {
    var psw = document.getElementById("psw-id").value;
    var psw_repeat = document.getElementById("psw-repeat-id").value;
     if (psw != psw_repeat) {
        document.getElementById("confpass-warning").style.display = 'block';
        document.getElementById("confpass-warning").innerHTML = "Password and Confirm password doesn't match";
        document.getElementById("psw-repeat-id").style.border = '1px solid #d50027';
        return false;
    } else {
        document.getElementById("psw-repeat-id").style.border = 'none';
        document.getElementById("confpass-warning").style.display = 'none';
        return true;
    }
}

/*---------- Admin Role -----------*/
function deleteAdminOnPress(adminCount) {
    var button = document.getElementById("delete-admin-btn");
    var email = "{{Session::get('auth-email')}}";
    if (button.innerHTML == "Delete Admin") {
        button.innerHTML = "Cancel Delete";
        let tbl = document.getElementById("admin-table").getElementsByTagName('tbody')[0];
        for (var i = 0; i < adminCount; ++i) {
            if (tbl.rows[i].cells[0].innerHTML == email) {
                document.getElementById("delete-btn-no-" + i).style.visibility = 'hidden';
            } else {
                document.getElementById("delete-btn-no-" + i).style.visibility = 'visible';
            }
        }
    } else if (button.innerHTML == "Cancel Delete") {
        button.innerHTML = "Delete Admin";
        for (var i = 0; i < adminCount; ++i) {
            document.getElementById("delete-btn-no-" + i).style.visibility = 'hidden';
        }
    }
}

/*---------- Change Password -----------*/
function checkChangePassword() {
    var curpass = document.getElementById("cur-psw-id").value;
    var newpass = document.getElementById("psw-id").value;
    if (curpass == newpass) {
        document.getElementById("pass-warning").style.display = 'block';
        document.getElementById("pass-warning").innerHTML = "New password must different from current password";
        document.getElementById("psw-id").style.border = '1px solid #d50027';
        return false;
    } else {
        document.getElementById("psw-id").style.border = 'none';
        document.getElementById("pass-warning").style.display = 'none';
        return checkConfPassword();
    }
}

/*---------- Statistics -----------*/
function getDaysInMonth(month, year) {
    var date = new Date(year, month, 1);
    var days = [];
    while (date.getMonth() === month) {
       days.push(date.getDate());
       date.setDate(date.getDate() + 1);
    }
    return days;
}

function getMonthName(month) {
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];
    return monthNames[month];
}
