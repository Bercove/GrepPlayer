@if(isset($errors) && count($errors)>0)
	
	<div id="errors_successes">
		<div class="alert alert-dismissable alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times</span>
			</button>
            
			@foreach($errors as $error)

				<li>{!! $error !!}</li>

			@endforeach
			
		</div>
	</div>

@endif