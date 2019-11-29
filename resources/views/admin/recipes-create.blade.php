@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(isset($message))
                	<div class="message">{{ $message }}</div>
                @endif
                <div class="card-header">Dodaj przepis</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h4>Dodaj przepis</h4>
                    		<form method="POST" action="{{ action('RecipeAdminController@store') }}">                    		
    							@csrf 
                                <div class="form-group">                                   

                                    <div id="innerIngredient">
                                            <label for="ingredient">Składnik</label>
                                            <select class="form-control" id="ingredient" name="ingredients[]">
                                                @foreach ($ingredients as $ingredient)    
                                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                            <label for="value">Ilość</label>
                                            <input class="form-control" type="text" name="value[]" id="value" value=""><br>

                                            <label for="value">Miara</label>
                                            <select class="form-control" id="unit" name="unit[]">
                                                @foreach ($units as $unit)    
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                    <button type="button" value="Dodaj" onclick="javascript:add();"> Dodaj składnik</button>
                                        
                                    <div id="formIngredient"></div>

                                </div>    

                                <div>
                                    <h5>Kategorie do których należy przepis</h5>  
                                    @foreach ($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}" name="categories[]" id="defaultCheck">
                                                <label class="form-check-label" for="defaultCheck">
                                                    {{ $category->name }}
                                                </label>
                                            </div>  
                                    @endforeach 
                                </div>

                                <div class="form-group">
                                    <label for="title">Tytuł</label>
                                    <input class="form-control" type="text" name="title" id="title" value=""><br>
                                </div>                                               

                                <div class="form-group">
                                    <label for="description">Opis</label>
                                    <textarea class="form-control" rows="10" name="description" id="description" value=""></textarea><br>
                                </div>
  
                                <div class="form-group">
                                    <label for="url">URL</label>
                                    <input class="form-control" type="text" name="url" id="url" value=""><br>
                                </div>

    							<input class="btn btn-dark" type="submit" value="Dodaj przepis">
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