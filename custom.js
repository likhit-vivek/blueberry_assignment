var deleteUser = function(id) {
	$.ajax({
		url: "deleteUser.php",
		type: "POST",
		data: { 'userId': id }
	}).done(function() {
		$('.alert-success').removeClass("d-none");
		setTimeout(function() {
			$('.alert-success').addClass("d-none");
		}, 3000);
	}).fail(function() {
		$('.alert-danger').removeClass("d-none");
		setTimeout(function() {
			$('.alert-danger').addClass("d-none");
		}, 3000);
	});
}