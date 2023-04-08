@extends('layouts.public')

@section('contents')

	<div class="not-found">
		
		<h2>URL could not be Found</h2>
		
	    <nav>
	    	<ul>
		        <li>Check URL</li>
		        <li>Report broken link</li>
		    </ul>
	    </nav>

		<div>

			<p><b class="error">{{ Request::fullUrl() }}</b> <b>request could not be served</b></p>

		</div>
	</div>

@endsection