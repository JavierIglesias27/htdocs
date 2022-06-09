"use strict";
const boton = document.getElementById("buttonRegistro");
boton.addEventListener("click", registrarUsuario);

const inputName = document.getElementById("nameSignUp");
const inputEmail = document.getElementById("emailSignUp");
const inputPassword = document.getElementById("passwordSignUp");
const inputPhone = document.getElementById("phoneSignUp");

/*importante darle tiempo de carga */
// setTimeout(checkRecaptcha, 2000);
grecaptcha.ready(function () {
	// do request for recaptcha token
	// response is promise with passed token
	grecaptcha
		.execute("6LepHlMgAAAAAPTY7N2X6M7AkmJL7v3Dv5S86Ywx", {
			action: "validate_captcha",
		})
		.then(function (token) {
			// add token value to form
			document.getElementById("g-recaptcha-response").value = token;
			checkRecaptcha();
		});
});

function checkRecaptcha() {
	let inputCaptchat_valor = document.getElementById(
		"g-recaptcha-response"
	).value;
	console.log(inputCaptchat_valor);
	if (inputCaptchat_valor != "") {
		boton.disabled = false;
		return true;
	}
	return false;
}

function registrarUsuario() {
	let inputName_valor = inputName.value;
	let inputEmail_valor = inputEmail.value;
	let inputPassword_valor = inputPassword.value;
	let inputPhone_valor = inputPhone.value;

	let nameBoolean = true;
	let emailBoolean = true;
	let passwordBoolean = true;
	let phoneBoolean = true;

	if (inputName_valor == "" && !isNaN(inputName_valor)) {
		nameBoolean = false;
	}
	if (inputName_valor.length < 2) {
		nameBoolean = false;
	}
	if (inputEmail_valor == "" && !isNaN(inputEmail_valor)) {
		emailBoolean = false;
	}
	if (inputPassword_valor == "" && !isNaN(inputPassword_valor)) {
		passwordBoolean = false;
	}
	if (inputPhone_valor == "" && isNaN(inputPhone_valor)) {
		phoneBoolean = false;
	}
	$.ajax({
		url: "./registrarse.php",
		type: "POST",
		data: {
			api: "checkEmail",
			email: inputEmail_valor,
		},
		//dataType: "json", //esta quitado xq hola NO ES UN JSON es texto plano
		success: function (response) {
			if (response == 0) {
				console.error(response);
			} else {
				console.log(response);
				if (response == "null") {
					console.error("ERROR");
				} else {
					console.error("TODO OK");
				}
			}
		},
		error: function (error) {
			console.log("ERROR" + error);
		},
	});

	if (nameBoolean) {
		inputName.classList.remove("inputError");
		inputName.classList.add("inputSucces");
	} else {
		inputName.classList.remove("inputSucces");
		inputName.classList.add("inputError");
	}
	if (emailBoolean) {
		inputEmail.classList.remove("inputError");
		inputEmail.classList.add("inputSucces");
	} else {
		inputEmail.classList.remove("inputSucces");
		inputEmail.classList.add("inputError");
	}

	if (passwordBoolean) {
		inputPassword.classList.remove("inputError");
		inputPassword.classList.add("inputSucces");
	} else {
		inputPassword.classList.remove("inputSucces");
		inputPassword.classList.add("inputError");
	}

	if (phoneBoolean) {
		inputPhone.classList.remove("inputError");
		inputPhone.classList.add("inputSucces");
	} else {
		inputPhone.classList.remove("inputSucces");
		inputPhone.classList.add("inputError");
	}
	//to do
	if (
		nameBoolean &&
		emailBoolean &&
		passwordBoolean &&
		phoneBoolean &&
		checkRecaptcha()
	) {
		/*guardar en DB */
	}
}
