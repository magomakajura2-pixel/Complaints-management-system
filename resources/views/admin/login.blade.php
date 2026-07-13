<!DOCTYPE html>
<html lang="en">

<head>
	<title>CMS | Admin login</title>
	<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
		<h4>Complaint management system <hr /><span style="color:#fff;"> Admin Login</span></h4>
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
					<form method="POST" action="{{ route('admin.login.submit') }}">
					@csrf
					<div class="card-body">
					
						<div class="form-group mb-3">
							<input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
						</div>
						<div class="form-group mb-4">
							<input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
						</div>
						
						<button class="btn btn-block btn-primary mb-4" type="submit" name="submit">Signin</button>
						<hr>
						<p class="mb-2 text-muted">Forgot password? <a href="#" class="f-w-400">Reset</a></p>
					
					</div></form>
					  <i class="fa fa-home" aria-hidden="true"><a class="" href="{{ route('home') }}">
		                    Back Home
		                </a></i>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('admin/assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>



</body>

</html>
