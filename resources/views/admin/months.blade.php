@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(Session::has('message'))
                	<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Miesiące</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h5>Dodaj miesiąc</h5>
                    		<form method="POST" action="{{ action('MonthAdminController@store') }}" class="form-inline">                    		
    							@csrf
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="name" class="sr-only">Miesiąc</label>
                                    <input type="text" name="name" class="form-control">
                                    <input type="submit" value="Dodaj miesiąc" class="btn btn-dark">
                                </div>    							
							</form>                 
                    	</div>
                    	<div>
                    		<h5>Lista miesięcy</h5>
                    		<ul class="list-group">
                    			@if(isset($months))
                    				@foreach ($months as $month)
    									<li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $month->name }}
                                            <form method="POST" action="{{ action('MonthAdminController@destroy', $month->id)}}" >
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Usuń" class="btn btn-danger">
                                            </form>
    									</li>
									@endforeach
								@endif
                    		</ul>	
                    	</div>

                    @else
                    <div class=”panel-heading”>Normal User</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection