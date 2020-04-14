@extends('layouts.app')

@section('title', 'Strona główna')

@section('nav')
    @parent 
@endsection

@section('content')
    <div class="intro">
    	<h2>Wyobraź sobie,</h2>
	    <h3>że jest niehandlowa niedziela a Ciebie naszła ochota na coś...</h3>
	    <p>Szukasz przepisów ale okazuje się, że w każdym brakuje Ci jakiegoś składnika. Tutaj znajdziesz przepisy składające się dokładnie z tego, czym dysponujesz w domu.</p>	    	
    </div>
    
    <div class="search">
        <h3>Wybierz pierwszy składnik który masz w domu:</h3>
        <div class="ingredients">               
            @foreach ($ingredients as $ingredient)
               <div class="ingredientsStart"><a class="button" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}</a></div>
            @endforeach             
        </div>
    </div>    

    <div class="categories">
    	@foreach ($categories as $category)
            		<div><img src="{{ asset('images/categories/'.$category['photo'].'') }}" alt="zdjęcie kategorii {{ $category['name'] }}"><a href="{{route('recipes.categories', $category['id'])}}">{{ $category['name'] }}</a></div>
        @endforeach        		
    </div>
    
    {{-- <!--<div class="last">
    	Ostatnio dodane przepisy
    	<div class="ingredients">    			
			    @foreach ($lastAddedRecipes as $recipe)
            		<div><a href="">{{ $recipe['title'] }}</a>
            		@foreach ($recipe['categories'] as $categoryId => $category)
            			<p><a href="{{route('recipes.categories', $categoryId)}}">{{ $category }}</a><p>            		
            		@endforeach	
            		</div>
            	@endforeach        		
    	</div>
    </div> --> --}}
@endsection
                