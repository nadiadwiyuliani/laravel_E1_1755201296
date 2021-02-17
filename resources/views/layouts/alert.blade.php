@if ($message = Session::get('success'))
<p>
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
</p>
@endif