$(function login() {

	$.validator.setDefaults({
		errorClass: 'help-block',
		highlight: function(element) { // If a field is valid it will return a error 
			$(element)
				.addClass('has-error');
		},
		unhighlight: function login(element) { // This will unhighlight the errors
			$(element)
				.removeClass('has-error');
		}
	})

	$("#form-login").validate({
		rules: {
			email: {
				required: true, // Field is required
				email: true // Needs to be an email type
			},
		    lpassword: {
		        required: true, // Field is required
		    }
		},
		messages: {
			email: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				email: '<i class="fa fa-times" aria-hidden="true"></i>'
			},
			lpassword: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>'
			}
		}
	});
});

$(function register() {

	$.validator.setDefaults({
		errorClass: 'help-block',
		highlight: function(element) { // If a field is valid it will return a error 
			$(element)
				.closest('.form-group')
		},
		unhighlight: function(element) { // This will unhighlight the errors
			$(element)
				.closest('.form-group')
		}
	})

	// Password validation
	$.validator.addMethod('strongPassword', function(value, element) {
    return this.optional(element) 
      || value.length >= 6 // Passwords needs to be longer than 6 characters
      && /\d/.test(value)
      && /[a-z]/i.test(value);
  	}, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

	$("#form-register").validate({
		rules: {
			email: {
				required: true, // Field is required
				email: true // Needs to be an email type
			},
		    password: {
		        required: true, // Field is required
		        strongPassword: true // Adds the method strong password
		    },
		    cpassword: {
		        required: true, // Field is required
		        equalTo: '#password' // Confirm password needs to be equal with first password
		    },
		    firstname: {
		        required: true, // Field is required
		        nowhitespace: true, // Cant use white space in field
		        lettersonly: true // Only letters can be used
		    },
		    lastname: {
		        required: true, // Field is required
		        lettersonly: true // Only letters can be used
		    }
		},
		messages: {
			email: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				email: '<i class="fa fa-times" aria-hidden="true"></i>'
			},
			password: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				strongPassword: '<i class="fa fa-times" aria-hidden="true"></i>'
			},
			cpassword: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				equalTo: '<i class="fa fa-times" aria-hidden="true"></i>'
			},
			firstname: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				nowhitespace: '<i class="fa fa-times" aria-hidden="true"></i>',
				lettersonly: '<i class="fa fa-times" aria-hidden="true"></i>'
			},
			lastname: {
				required: '<i class="fa fa-times" aria-hidden="true"></i>',
				lettersonly: '<i class="fa fa-times" aria-hidden="true"></i>'
			}
		}
	});

});
