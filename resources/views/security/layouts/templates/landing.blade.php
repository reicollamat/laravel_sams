<!-- 1st home page showcase section -->
	<section class="text-light p-3 text-sm-start d-flex align-items-center justify-content-center sec-1" >
		<div class="container-lg" style="z-index:9999;">
			<div class="row justify-content-center align-items-center align-self-center">
				<!-- gif display -->
				<div class="col-md-5 text-center d-none d-md-block ">
					<video muted autoplay width="100%" height="100%" loop >
						<source autoplay src="{% static 'img/protectionicon.webm' %} ">
					</video>
					<!-- <img class="img-fluid" src="{% static 'img/protectionicon.gif' %}" alt=""> -->
				</div>
				<!-- text display -->
				<div class="col-md-7 text-center text-md-start">
					<h1 class="user-select-none">
						<div class="display-3">Security<span class="text-primary"> Agency</span><span class="text-primary"> Mangement</span> System</div>
						<div class="display-6">Your <span class="text-primary">Security</span> Partner</div>
					</h1>
					<p class="lead my-4 user-select-none">It is designed to effectively organize the security guard industry that would be highly beneficial for any private patrol company or security agency.</p>
					<a href="#" class="btn btn-primary btn-lg shadow-lg">Get Started</a>
				</div>
			</div>
		</div>
	</section>


	{{-- <!-- 2nd home page showcase section --> --}}
	<section class="bg-dark text-light text-sm-start d-flex align-items-center justify-content-center p-3" id="sec_2">
		<div class="container-lg">
			<div class="row justify-content-center align-items-center">
				{{-- <!-- text display --> --}}
				<div class="col-md-7 text-center text-md-end">
					<h1>
						<div class="display-4">Contract Security <span class="text-primary">Guards</span></div>
						<div class="display-6">Your Security Is Our <span class="text-primary">Priority</span></div>
					</h1>
					<p class="lead my-4">Delivering an efficient and seamless security guard management solution leading to
						improved operational efficiency, such as managing schedules and reports, guards, and clients.</p>
				</div>
				{{-- <!-- gif display --> --}}
				<div class="col-md-5 text-center d-none d-md-block">
					<video muted autoplay width="100%" height="100%" loop>
						<source autoplay src="{% static 'img/contract.webm' %} ">
					</video>

				</div>
	</section>
	{{-- {% include 'footer.html' %} --}}
