'use strict'
window.addEventListener('load', function(){
    var firstName = document.getElementById('firstName');
    firstName.addEventListener('blur', function(){
        checkUser(firstName.value,'firstName','firstTxt');
    });
    var lastName = document.getElementById('lastName');
    lastName.addEventListener('blur', function(){
        checkUser(lastName.value, 'lastName','lastTxt');
    });
	var username = document.getElementById('username');
	username.addEventListener('keyup', function(){
        if(username.value != '')
		    checkUser(username.value, 'username','userTxt');
    });
    username.addEventListener('blur', function(){
        if(username.value == '')
		    checkUser(username.value, 'username','userTxt');
	});
    var email = document.getElementById('email');
    email.addEventListener('keyup', function(){
        if(email.value != '')
            checkUser(email.value, 'email','emailTxt');
    });
    email.addEventListener('blur', function(){
        checkUser(email.value, 'email','emailTxt');
    });
    var password = document.getElementById('password');
    password.addEventListener('blur', function(){
        checkUser(password.value, 'password','passTxt');
    });
    var password2 = document.getElementById('password2');
    password2.addEventListener('keyup', function(){
        var password = document.getElementById('password').value;
        checkUser(password2.value, 'password2','pass2Txt', password);
    }); 
    password2.addEventListener('blur', function(){
        var password = document.getElementById('password').value;
        checkUser(password2.value, 'password2','pass2Txt', password);
    }); 

});

function validate(){
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var username = document.getElementById('username');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var password2 = document.getElementById('password2');

    if(password2.style.borderColor == 'red' || email.style.borderColor == 'red' || 
        username.style.borderColor == 'red' || firstName.style.borderColor == 'red' ||
        lastName.style.borderColor == 'red' || password.style.borderColor == 'red' ||
        firstName.value == '' ){
        return false;
    }
    return true;
}

function checkUser(str, inputName, label,password) {
	var txt =  document.getElementById(label);
	var input = document.getElementById(inputName);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (true) {
            if(this.responseText.length > 0){
            	input.style.border = "2px solid red";
            	txt.innerHTML = this.responseText;
            }
            else{
            	txt.innerHTML = "";
		        input.style.border = "1px solid #ccc";
		        return;
            }
        }
    };
    if(password != null){
        xmlhttp.open("GET", "checkUser.php?"+inputName+"=" + str + "&password=" + password, true);
    }else{
        xmlhttp.open("GET", "checkUser.php?"+inputName+"=" + str, true);
    }
    xmlhttp.send();
}