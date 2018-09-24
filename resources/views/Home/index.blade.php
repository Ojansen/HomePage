@extends('layouts.app')

@section('content')
<div class="container-fluid col-md-10">
    <div class="row" style="margin-bottom: 50px;">
    	<div class="col-md-4">
    		<div id="weather">
    		</div>
    	</div>
    	<div class="col-md-4">
    		<div class="clock">
    			<span id="clock"></span>
    		</div>
    		<div class="date">
    			<span id="date"></span>
    		</div>
    		<div class="year">
    			<div id="year"></div>
    		</div>
    	</div>
    	<div class="col-md-4">
    		<blockquote id="quote"></blockquote>
    		<span id="writer"></span>
    	</div>
    </div>
    <div class="row">
        <div class="row col-md-12">
        	@if (!$group->isEmpty())
        		@foreach ($group as $item)
        	<div class="block col-md-2"> 
    			<h1 class="category" style="color: {{$colors}}">{{$item[0]->category}}</h1>
        		<ul>
		            @foreach ($item as $bookmark)
	            		<a href="{{$bookmark->href}}" id="{{$bookmark->label}}" target="_blank"><li>{{$bookmark->label}}</li></a>
		            	
		            @endforeach
		        </ul>
	        </div>
		        @endforeach
	        @else 
	        	Hello there, it looks pretty empty here.
	        @endif
        </div>
    </div>
</div>

<div class="modal fade" id="addBookmark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card">
		<div class="card-body">
			<form method="post" action="{{ route('addBookmark')  }}" style="color: black;">
			{{ csrf_field() }}
		    {{ method_field('post') }}
			    <div class="form-group">
				    <label for="label">Name</label>
				    <input name="label" type="text" class="form-control" id="label" placeholder="Google">
			    </div>
				<div class="form-group">
				  	<label for="href">Location</label>
				  	<input name="href" type="text" class="form-control" id="href" placeholder="https://www.google.com">
				  	<small>Please include the https/http shown in the example</small>
				</div>
				<div class="form-group">
				  	<label for="New Category">New category</label>
				  	<input name="newCategory" type="text" class="form-control" id="New Category" placeholder="Misc">
				</div>
				<div class="form-group">
				    <label for="Category">Category</label>
				    <select name="category" class="form-control" id="Category">
				    	<option selected=""></option>
				    	@foreach ($group as $bookmark)
				      	<option>{{$bookmark[0]->category}}</option>
				      	@endforeach
				    </select>
				</div>
			    <div class="form-group">
				  	<input class="btn btn-success" type="submit" name="submit" value="Save">
				  	<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
			          Cancel
			        </button>
			    </div>
			</form>
		</div>
	</div>
    </div>
  </div>
</div>

<div class="modal fade" id="Remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="card">
		<div class="card-body">
			<h2 class="card-title">Overview</h2>
			@foreach ($group as $item)
				@foreach ($item as $bookmark)
					<p><a style="color: black;" href="{{ url('/Home/Remove/'.$bookmark->id) }}">Remove {{$bookmark->label}}</a></p>
				@endforeach
			@endforeach
		</div>
	</div>
    </div>
  </div>
</div>

@endsection
