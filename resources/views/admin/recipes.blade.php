@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(Session::has('message'))
                	<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Przepisy</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h5>Dodaj przepis</h5>
                    		<form method="GET" action="{{ action('RecipeAdminController@create') }}">                    		
    							@csrf    							
    							<input class="btn btn-dark" type="submit" value="Dodaj przepis">
							</form>                 
                    	</div>
                    	<div>
                    		<h5>Lista przepisów</h5>
                    		<ul class="list-group">
                                @if(isset($recipes))
                        			@foreach ($recipes as $recipe)
        								<li class="list-group-item d-flex justify-content-between align-items-center"><a href="{{route('recipes.edit', $recipe->id)}}">{{ $recipe->title }}</a> 
        									<form method="POST" action="{{ action('RecipeAdminController@destroy', $recipe->id)}}" >
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