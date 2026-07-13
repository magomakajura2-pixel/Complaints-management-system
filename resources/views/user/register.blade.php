<!DOCTYPE html>
<html lang="en">

<head>
	<title>CMS | User Regsitrations</title>
	<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "{{ route('user.check-availability') }}",
data:'email='+$("#email").val(),
type: "POST",
headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
success:function(data){
if (data.available) {
	$("#user-availability-status1").html('<span style="color:green;">Email is available</span>');
} else {
	$("#user-availability-status1").html('<span style="color:red;">Email is already taken</span>');
}
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
				<h4>Complaint management system <hr /><span style="color:#fff;"> User Registration</span></h4>
				<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="POST" action="{{ route('user.register.submit') }}">
					@csrf
						
					<div class="card-body">
				
				
						<div class="form-group mb-3">
							
							<input type="text" class="form-control" placeholder="Full Name" name="fullname" required autofocus>
						</div>
						<div class="form-group mb-4">
							
							<input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required>
		             <span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group mb-3">
							
							<input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required autofocus>
						</div>
						<div class="form-group mb-3">
							
							<input type="password" class="form-control" placeholder="Password" required name="password"><br >
						</div>
						<button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Register</button>
						<hr>
						
					</div></form>
					 <i class="fa fa-home" aria-hidden="true"><a class="" href="{{ url('/') }}">
		                    Back Home
		                </a></i>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('admin/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>



</body>

</html>
