@if(count($errors->all()) > 0)
 <div class="alert alert-default text-danger">
 	<ul>
 		@foreach($errors->all() as $error)
 		 <li>{{ $error }}</li>
 		@endforeach
 	</ul>
 </div>
@endif

@if(session()->has('success'))
 <div class="alert alert-default text-success">
 	<h2>{{ session('success') }}</h2>
 </div>
@endif

@if(session()->has('error'))
 <div class="alert alert-default text-danger">
 	<h2>{{ session('error') }}</h2>
 </div>
@endif
