@extends('layouts.app')

@section('title', 'Kalendarz sezonowy')

@section('nav')
    @parent 
@endsection

@section('pageTitle')
    <h1>Kalendarz sezonowy</h1>
@endsection

@section('content')
<div class="description">Podczas planowania posiłków warto wziąć pod uwagę warzywa i owoce, na które w danym miesiącu jest sezon. Dzięki temu będą one nie tylko tańsze, ale i bardziej wartościowe. Kliknij w wybrany składnik żeby zobaczyć przepisy, które go zawierają.</div>

        @foreach ($monthsIngredients as $month => $ingredients)
        <div class="recipe">
            <h2>{{ $month }}</h2>
            	@foreach ($ingredients as $ingredient)
            		<a class="ingredientsList" href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}  </a>
            	@endforeach            
        </div>    
        @endforeach

<script type="text/javascript">
    $(document).ready(function() {
        markMonth();
    });
</script>

@endsection
                