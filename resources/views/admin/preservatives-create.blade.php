@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(isset($message))
                	<div class="message">{{ $message }}</div>
                @endif
                <div class="card-header">Dodaj sztuczny dodatek</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h4>Dodaj sztuczny dodatek</h4>
                    		<form method="POST" action="{{ action('PreservativeAdminController@store') }}">                    		
    							@csrf 
                                <div class="form-group">
                                    <label for="code">Kod</label>
                                    <input class="form-control" type="text" name="code" id="code" value=""><br>
                                </div>                                               

                                <div class="form-group">
                                    <label for="name">Nazwa</label>
                                    <input class="form-control" type="text" name="name" id="name" value=""><br>
                                </div>

                                <div class="form-group">
                                    <label for="description">Opis</label>
                                    <textarea class="form-control" rows="10" name="description" id="description" value=""></textarea><br>
                                </div>
  
                                <div class="form-group">
                                    <label for="category">Kategoria</label>
                                    <select class="form-control" name="category">
                                        <option value="Barwniki">Barwniki</option>
                                        <option value="Konserwanty">Konserwanty</option>
                                        <option value="Przeciwutleniacze">Przeciwutleniacze</option>
                                        <option value="Emulgatory, stabilizatory, środki zagęszczające">Emulgatory, stabilizatory, środki zagęszczające</option>
                                        <option value="Dodatki o zróżnicowanym przeznaczeniu">Dodatki o zróżnicowanym przeznaczeniu</option>
                                        <option value="Wzmacniacze smaku">Wzmacniacze smaku</option>
                                        <option value="Antybiotyki">Antybiotyki</option>
                                        <option value="Dodatki do żywności o różnym zastosowaniu">Dodatki do żywności o różnym zastosowaniu</option>
                                        <option value="Modyfikowane skrobie">Modyfikowane skrobie</option>
                                    </select>
                                </div>

                                <div  class="form-group">
                                    <label for="bad">Czy dodatek do żywności jest szkodliwy?</label>                                
                                    <input type="checkbox" name="bad" value="1">Tak/Nie<br>
                                </div>

    							<input class="btn btn-dark" type="submit" value="Dodaj sztuczny dodatek">
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