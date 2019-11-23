@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(isset($message))
                	<div class="message">{{ $message }}</div>
                @endif
                <div class="card-header">Edytuj przepis</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h5>Edytuj przepis</h5>
                    		<form method="PUT" action="{{ action('RecipeAdminController@update', [$recipe->id]) }}">                    		
    							@csrf 
                                <label for="ingredients">Składniki</label>


                                <label for="title">Tytuł</label>
                                <input type="text" name="title" id="title" value="{{ $recipe->title }}"><br>

                                <label for="description">Opis</label>
                                <textarea name="description" id="description">{{ $recipe->description }}</textarea><br>
  
                                <label for="url">URL</label>
                                <input type="text" name="url" id="url" value="{{ $recipe->url }}"><br>

    							<input type="submit" value="Edytuj przepis">
							</form>                 
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