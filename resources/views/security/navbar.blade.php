<!-- General navbar -->
@section('security-content')
<header>
	<!-- Navigation bar -->
	<nav class="navbar  navbar-expand-lg navbar-dark fs-5 border-bottom border-secondary glass ">
		<div class="container-fluid d-flex ">
			<a class="navbar-brand" href="{{ '/' }}">
				<img src="{{ URL::asset('img/icon.svg') }}" alt="logo" width="40" height="40" class="d-inline-block align-top" />
				SAMS
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-evenly" id="navbarNavDropdown">
				<ul class="navbar-nav mb-2 ps-4">
					{{-- <!-- Main page navigator section -->
					<!-- it is needed, for highlighting current page --> --}}
					<li class="nav-item ">
						<a class="nav-link" aria-current="page" href="{{ '/' }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Services</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>

					<!-- Account navigator section -->

					<li class="nav-item dropdown right-edge ">
						@if (Route::has('login'))
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false" aria-current="page">
							<p>Account</p>
						</a>

						<ul class="dropdown-menu text-center" style="background-color:rgba(0, 0, 0, 0.200)!important">
							@auth
								<li><a class="dropdown-item" href="{{ url('/dashboard') }}" >Dashboard</a></li>
								<li>
									<hr class="dropdown-divider" />
								</li>
							@else
								<li><a class="dropdown-item" href="{{ route('login') }}" >Login</a></li>
								<li>
									<hr class="dropdown-divider" />
								</li>
								@if (Route::has('register'))
									<li>
										<a class="dropdown-item" href="{{ route('register') }}">Register</a>
									</li>
								@endif
							@endauth
						</ul>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</header>
@stop
