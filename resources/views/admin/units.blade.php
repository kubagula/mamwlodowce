@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(Session::has('message'))
                	<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Jednostki miar</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h5>Dodaj jednostkę miary</h5>
                    		<form method="POST" action="{{ action('UnitAdminController@store') }}" class="form-inline">                    		
    							@csrf
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="name" class="sr-only">Jednostka miary</label>
                                    <input type="text" name="name" class="form-control">
                                    <input type="submit" value="Dodaj jednostkę" class="btn btn-dark">
                                </div>    							
							</form>                 
                    	</div>
                    	<div>
                    		<h5>Lista jednostek miar</h5>
                    		<ul class="list-group">
                    			@if(isset($units))
                    				@foreach ($units as $unit)
    									<li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $unit->name }}
                                            <form method="POST" action="{{ action('UnitAdminController@destroy', $unit->id)}}" >
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