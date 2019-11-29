@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(Session::has('message'))
                	<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Składniki</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h4>Dodaj składnik</h4>
                    		<form method="POST" action="{{ action('IngredientAdminController@store') }}" class="form-horizontal">                    		
    							@csrf
                                <div class="form-group mx-sm-3 mb-2">                                    
                                    <label for="name" class="sr-only">Składnik</label>
                                    <input type="text" name="name" class="form-control">                                    
                                    <h5>Typ składnika</h5>                                      
                                    <label for="ingredient">Typ</label>
                                            <select class="form-control" id="type_id" name="type_id">
                                                @foreach ($types as $type)    
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>

                                    <h5>Miesiące w których składnik jest tani</h5>  
                                    @foreach ($months as $month)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $month->id }}" name="months[]" id="defaultCheck">
                                            <label class="form-check-label" for="defaultCheck">
                                                {{ $month->name }}
                                            </label>
                                        </div>  
                                    @endforeach 
                                    <br><input type="submit" value="Dodaj składnik" class="btn btn-dark">
                                </div>    							
							</form>                 
                    	</div>

                    	<div>
                    		<h5>Lista składników</h5>
                    		<ul class="list-group">
                    			@if(isset($ingredients))
                    				@foreach ($ingredients as $ingredient)
    									<li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $ingredient->name }}
                                            <form method="POST" action="{{ action('IngredientAdminController@destroy', $ingredient->id)}}" >
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