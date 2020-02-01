@extends('layouts.app')

@section('title', 'Strona główna')

@section('nav')
    @parent 
@endsection

@section('content')
    <div class="search">
    	<div class="searchContent">	    	
	    	<h2>Wyobraź sobie,<h2>
	    	<h3>że jest niehandlowa niedziela a Ciebie naszła ochota na coś...</h3>
	    	<p>Szukasz przepisów ale okazuje się, że w każdym brakuje Ci jakiegoś składnika. Tutaj znajdziesz przepisy składające się dokładnie z tego, czym dysponujesz w domu.</p>

	    	<h3>Wybierz pierwszy składnik który masz w domu:</h3>
	    	<div class="ingredients">    			
			    @foreach ($ingredients as $ingredient)
            		<div><a href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}</a></div>
            	@endforeach        		
    		</div>
    	</div>    	
    </div>

    <div class="photos">
        <div><img src="{{ asset('images/pizza428x300.jpg') }}" class="foodPhoto"></div>
        <div><img src="{{ asset('images/burrito428x300.jpg') }}" class="foodPhoto"></div>
        <div><img src="{{ asset('images/smazony-ryz428x300.jpg') }}" class="foodPhoto"></div>
        <div><img src="{{ asset('images/japonska-miska428x300.jpg') }}" class="foodPhoto"></div>
        <div><img src="{{ asset('images/nalesnik428x300.jpg') }}" class="foodPhoto"></div>        
    </div>

    <div class="categories">
    	@foreach ($categories as $category)
            		<div><img src="{{ asset('images/categories/'.$category['photo'].'') }}"><a href="{{route('recipes.categories', $category['id'])}}">{{ $category['name'] }}</a></div>
        @endforeach        		
    </div>

    <div class="bigMenu">
        <div class="menuItem">
            <img src="{{ asset('images/ksiazka350x197.jpg') }}" class="menuItemImg">
            <p class="menuItemText"><a href="{{ route('recipes') }}">Przepisy</a></p>    
        </div>
        <div class="menuItem">
            <img src="{{ asset('images/kalendarz350x197.jpg') }}" class="menuItemImg">
            <p class="menuItemText"><a href="{{ route('calendar') }}">Kalendarz sezonowy</a></p>    
        </div>
        <div class="menuItem">
            <img src="{{ asset('images/sztuczne-dodatki350x197.jpg') }}" class="menuItemImg">
            <p class="menuItemText"><a href="{{ route('home') }}">Sztuczne dodatki</a></p>    
        </div>
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
                