
var pass = document.getElementById("password");
var conf_pass = document.getElementById("conf-password");
function validatePassword(){

	if(pass.value != conf_pass.value){
		conf_pass.setCustomValidity("Wachtwoord komt niet overeen.");
	} else {
		conf_pass.setCustomValidity("");
	}
}

pass.onchange = validatePassword;
conf_pass.onkeyup = validatePassword;

function confDelete(id){
	var conf = confirm('Weet je zeker dat je de gebruiker wilt verweideren?');
	if(conf){
		window.location.href= 'gebruiker.php?delete=true&id='+id;
	}else{
		
		window.location.href= 'gebruiker.php?delete=false&id='+id;
	}

}

function confRestore(id){
	var conf = confirm('Weet je zeker dat je de gebruiker wilt herstellen?');
	if(conf){
		window.location.href= 'gebruiker.php?restore=true&id='+id;
	}else{
		
		window.location.href= 'gebruiker.php?restore=false&id='+id;
	}

}