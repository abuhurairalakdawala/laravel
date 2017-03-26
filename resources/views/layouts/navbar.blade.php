<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
		        <img height="22" alt="Brand" src="/images/oft_logo.png">
		    </a>
	  	</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
	        	<li class="dropdown">
	        		<a data-toggle="dropdown" href="/login"><i class="fa fa-user-circle"></i> {{ $username }} <span class="caret"></span></a>
	        		<ul class="dropdown-menu">
	        			<li><a href="/logout">Logout</a></li>
	        		</ul>
	        	</li>
	        	@else
	        	<li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
	        	<li><a href="/register"><i class="fa fa-user"></i> Register</a></li>
	        	@endif;
	        </ul>
	    </div>
	</div>
</nav>