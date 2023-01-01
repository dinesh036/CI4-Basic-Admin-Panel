function form_validation(){
	const userID   =  $('#userID').val();
	const first_name = $('#first_name').val();
	const last_name  = $('#last_name').val();
	const mobile = $('#mobile_number').val();
	const password = $('#password').val().trim();
	const password2 = $('#password2').val().trim();
	
		if (isNaN(mobile)) { 
			alert('Invalid contact number');
			return false;
		} else if (mobile.length!=10) { 
			alert('Please enter 10 digit mobile number.');
			return false;
		} else if (userID == '' && (password=='' || password2 =='')) {
			alert('Please enter password and confirm password.');
			return false;	
		} else if(password!=password2){
			
			alert('Password & cofirm password not match.');
			return false;
			
		} else {
			return true;
		}
}