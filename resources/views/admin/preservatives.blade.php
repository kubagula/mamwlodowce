@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	@if(Session::has('message'))
                	<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Sztuczne dodatki</div>
 
                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    	<div class="">
                    		<h5>Dodaj sztuczny dodatek</h5>
                    		<form method="GET" action="{{ action('PreservativeAdminController@create') }}">                    		
    							@csrf    							
    							<input class="btn btn-dark" type="submit" value="Dodaj sztuczny dodatek">
							</form>                 
                    	</div>
                    	<div>
                    		<h5>Lista sztucznych dodatków</h5>
                    		<ul class="list-group">
                                @if(isset($preservatives))
                        			@foreach ($preservatives as $preservative)
        								<li class="list-group-item d-flex justify-content-between align-items-center"><a href="{{route('preservatives.edit', $preservative->id)}}">{{ $preservative->name }}</a> 
        									<form method="POST" action="{{ action('PreservativeAdminController@destroy', $preservative->id)}}" >
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