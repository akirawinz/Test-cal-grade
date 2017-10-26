@if (Session::has('flash_message'))
<div class="alert alert-danger"><li>{{ Session::get('flash_message') }}</li></div>
@endif


@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<strong>Error : </strong>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</div>
@endif


@if(Session::has('success'))
<dlv class="alert alert-success1" role="alert">
	{{ Session::get('success') }}
</dlv>
@endif

@if(Session::has('delete'))
<dlv class="alert alert-success1" role="alert">
	{{ Session::get('delete') }}
</dlv>
@endif

@if(Session::has('add'))
<dlv class="alert alert-success" role="alert">
	{{ Session::get('add') }}
</dlv>
@endif

@if(Session::has('update'))
<dlv class="alert alert-success1" role="alert">
	{{ Session::get('update') }}
</dlv>
@endif

<style type="text/css" media="screen">
.alert-success1{
	color:#777;
	background-color: #8EF3C5;
}

</style>