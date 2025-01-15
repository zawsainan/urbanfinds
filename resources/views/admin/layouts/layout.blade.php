<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Admin | Dashboard</title>

	<link href="{{asset("admin_asset/css/app.css")}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" style="text-decoration: none" href="{{url("admin")}}">
          			<span class="align-middle">UrbanFinds</span>
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{url("admin")}}">
							<span class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{url("admin/profile")}}">
							<span class="align-middle">Profile</span>
						</a>
					</li>

					<li class="sidebar-header">
						Management
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link d-flex" href="{{url("admin/category")}}">
              <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Category</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link d-flex" href="{{url("admin/product")}}">
              <i class="align-middle" data-feather="package"></i> <span class="align-middle">Product</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link d-flex" href="{{url("admin/order")}}">
              <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Order</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link d-flex" href="{{url("admin/user")}}">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">User</span>
            </a>
					</li>
					<li class="sidebar-header">
						Action
					</li>
					<li class="sidebar-item">
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="sidebar-link d-flex" type="submit"><i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Log Out</span></button>
						</form>
					</li>
				</ul>

				
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
					</ul>
				</div>
				<a href="{{url("/products")}}" class="ms-auto me-5 btn btn-primary">View UI</a>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">
					
					@yield('admin_layout')

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					
				</div>
			</footer>
		</div>
	</div>

	<script src="{{url("admin_asset/js/app.js")}}"></script>

</body>

</html>