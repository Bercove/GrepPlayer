@if(session()->has('success'))

	<div id="errors_successes">
		<div class="alert alert-dismissable alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="close">
				<span aria-hidden="true">&times</span>
			</button>
			
			{!! session()->get('success') !!}
			
		</div>
	</div>

@endif