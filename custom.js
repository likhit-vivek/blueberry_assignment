$(document).ready(function() {
	$("#user-form").submit(function(event) {
		event.preventDefault();
		
		var isValid = true;
		
		$('#user-form .form-control').each(function() {
			if($(this).val() == null || $(this).val() == '') {
				$('.alert-danger').html('Please enter all values');
				$('.alert-danger').removeClass('d-none');
				setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
				isValid = false;
			}
		});
		
		if(isValid) {
			var formData = $(this).serialize();
			
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: formData,
				dataType: 'json'
			}).done(function(data) {
				if(data.success) {
					$('.alert-success').removeClass('d-none');
					setTimeout(function() { $('.alert-success').addClass('d-none'); }, 3000)
				} else {
					$('.alert-danger').html(data.msg);
					$('.alert-danger').removeClass('d-none');
					setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
				}
			}).fail(function() {
				$('.alert-danger').html('Unable to create user. Try again.');
				$('.alert-danger').removeClass('d-none');
				setTimeout(function() { $('.alert-danger').addClass('d-none'); }, 3000)
			});
		}
	});
});

var deleteUser = function(id) {
	$.ajax({
		url: "deleteUser.php",
		type: "POST",
		data: { 'userId': id },
		dataType: 'json'
	}).done(function(data) {
		if(data.success) {
			$('.alert-success').removeClass("d-none");
			setTimeout(function() {
				$('.alert-success').addClass("d-none");
			}, 3000);
			$('#'+id).remove();
		} else {
			$('.alert-danger').removeClass("d-none");
			setTimeout(function() {
				$('.alert-danger').addClass("d-none");
			}, 3000);
		}
	}).fail(function() {
		$('.alert-danger').removeClass("d-none");
		setTimeout(function() {
			$('.alert-danger').addClass("d-none");
		}, 3000);
	});
}

var deleteProduct = function(id) {
	$.ajax({
		url: "deleteProduct.php",
		type: "POST",
		data: { 'id': id },
		dataType: 'json'
	}).done(function(data) {
		if(data.success) {
			$('.alert-success').removeClass("d-none");
			setTimeout(function() {
				$('.alert-success').addClass("d-none");
			}, 3000);
			$('#'+id).remove();
		} else {
			$('.alert-danger').removeClass("d-none");
			setTimeout(function() {
				$('.alert-danger').addClass("d-none");
			}, 3000);
		}
	}).fail(function() {
		$('.alert-danger').removeClass("d-none");
		setTimeout(function() {
			$('.alert-danger').addClass("d-none");
		}, 3000);
	});
}