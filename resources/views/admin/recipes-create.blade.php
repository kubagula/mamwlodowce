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
                    		<h5>Dodaj przepis</h5>
                    		<form method="POST" action="{{ action('RecipeAdminController@store') }}">                    		
    							@csrf 
                                <div class="form-group">

                                    <!-- <div id="reqs">
                                    <h3 align="center"> Requirements </h3>
                                    </div> -->
                                    <div id="reqs">
                                        <label for="ingredient">Składnik</label>                                    
                                        <select class="form-control" id="ingredient" name="ingredients[]">
                                            @foreach ($ingredients as $ingredient)    
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endforeach
                                        </select>                                    
                                        <label for="value">Ilość</label>
                                        <input class="form-control" type="text" name="value[]" id="value" value=""><br>
                                    </div>
                                    <button type="button" value="Add" onclick="javascript:add();"> Add</button>


                                    <label for="ingredient">Składnik</label>
                                    <select class="form-control" id="ingredient" name="ingredients[]">
                                        @foreach ($ingredients as $ingredient)    
                                            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="value">Ilość</label>
                                    <input class="form-control" type="text" name="value[]" id="value" value=""><br>

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