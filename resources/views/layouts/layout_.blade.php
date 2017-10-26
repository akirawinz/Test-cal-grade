
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>ADMIN</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


  <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
<meta name="robots" content="noindex">

<!-- Material Design Icons  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Roboto Web Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

<!-- MDK -->
<link type="text/css" href="{{ asset('assets/vendor/material-design-kit.css') }}" rel="stylesheet">

<!-- Sidebar Collapse -->
<link type="text/css" href="{{ asset('assets/vendor/sidebar-collapse.min.css') }}" rel="stylesheet">

<!-- App CSS -->
<link type="text/css" href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

<link type="text/css" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

<style>
	.modal-backdrop.in {
		opacity: 0;
	}
	.modal-backdrop {
		position: initial;
	}
</style>
</head>

<body class="top-navbar">
	<!-- Navbar -->
	<nav class="navbar navbar-dark bg-primary navbar-full navbar-fixed-top">

		<!-- Toggle sidebar -->
		<button class="navbar-toggler" type="button" data-toggle="sidebar"></button>



		<div class="navbar-spacer"></div>

		<!-- Menu --> 
		<ul class="nav navbar-nav hidden-sm-down">
			<li class="nav-item active">
				<a class="nav-link" href="#"> นายวิฒิชัย</a>
			</li>
		</ul>

		<!-- Menu -->
		<ul class="nav navbar-nav">
			<!-- User dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"><img src="{{ asset('assets/images/people/50/guy-6.jpg') }}" alt="Avatar" class="rounded-circle" width="40"></a>
			</li>
			<!-- // END User dropdown -->
		</ul>
	</nav>
	<!-- // END Navbar -->

	<div class="mdk-drawer-layout mdk-js-drawer-layout" push has-scrolling-region>
		<div class="mdk-drawer-layout__content">
			<div class="container">
				@yield('content')
			</div>
			
		</div>
		<!-- Sidebar -->
		<div class="mdk-drawer mdk-js-drawer" id="default-drawer">
			<div class="mdk-drawer__content ">
				<div class="sidebar sidebar-left sidebar-light sidebar-transparent-sm-up sidebar-p-y">
					<div class="sidebar-heading">APPLICATIONS</div>
					<ul class="sidebar-menu">
						<li class="sidebar-menu-item">
							<a class="sidebar-menu-button" href="{{route('subject.index')}}">
								<i class="sidebar-menu-icon material-icons">account_box</i> Subject
							</a>
						</li>
						<li class="sidebar-menu-item">
							<a class="sidebar-menu-button" href="{{route('student.index')}}">
								<i class="sidebar-menu-icon material-icons">school</i> Student
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- // END Sidebar -->
	</div>

</body>


<!--  -->
<script src="{{ asset('assets/js/colors.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>

  <!-- jQuery -->
<script src="{{ asset('assets/vendor/jquery.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/vendor/tether.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- MDK -->
<script src="{{ asset('assets/vendor/dom-factory.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendor/material-design-kit.js') }}" type="text/javascript"></script>

<!-- Sidebar Collapse -->
<script src="{{ asset('assets/vendor/sidebar-collapse.js') }}" type="text/javascript"></script>


<!-- App JS -->
<script src="{{ asset('assets/js/main.min.js') }}" type="text/javascript"></script>




@yield('script')





</html>

