
function reset(){
	console.log("this resets all the error messages");

	// removes all error messages from the page
	for (i=1; i<=7; i++){
		document.getElementById("err_"+i).innerHTML = "";
	}
}

function validate_data(){
    console.log("inside validate data");
    reset();
    email = document.getElementById("email").value;
    password = document.getElementById("password").value;
    f_name = document.getElementById("f_name").value;
    l_name = document.getElementById("l_name").value;
    phone = document.getElementById("phone").value;
    office = document.getElementById("office").value;
    dept = document.getElementById("dept_list").value;
    var email_reg =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    var valid_info = true;

    // test email
    if (email_reg.test(email)==false){
        document.getElementById("err_1").innerHTML = "Invalid Email";
        valid_info = false;
    }
    if (password.length < 8){
        document.getElementById("err_2").innerHTML = "Password must be more than 8 charactors";
        valid_info = false;
    }
    if (f_name.length == 0){
        document.getElementById("err_3").innerHTML = "Invalid First Name";
        valid_info = false;
    }
    if (l_name.length == 0){
        document.getElementById("err_4").innerHTML = "Invalid Last Name";
        valid_info = false;
    }
    if (phone.length == 0){
        document.getElementById("err_5").innerHTML = "Invalid Phone";
        valid_info = false;
    }
    if (office.length == 0){
        document.getElementById("err_6").innerHTML = "Invalid Office";
        valid_info = false;
    }
    if (dept.length == 0){
        document.getElementById("err_7").innerHTML = "Invalid Department";
        valid_info = false;
    }
    if(valid_info){
        console.log("need to add in the inserting into database!!");
        return true;
    } else {
        return false;
    }
}


function init(){
	console.log('i am in the init');

    var submitForm = document.getElementById("register_form");
    submitForm.onsubmit = validate_data;

}

window.onload = init;