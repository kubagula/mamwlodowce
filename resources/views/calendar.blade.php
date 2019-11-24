@extends('layouts.app')

@section('title', 'Kalendarz sezonowy')

@section('nav')
    @parent 
@endsection

@section('pageTitle')
<h1>Kalendarz sezonowy</h1>
@endsection

@section('content')
    <div class="months">
        <ul>
        @foreach ($monthsIngredients as $month => $ingredients)
            <li>{{ $month }}</li>
            	@foreach ($ingredients as $ingredient)
            		<a href="{{route('recipes.ingredients', $ingredient['id'])}}">{{ $ingredient['name'] }}</a>
            	@endforeach
            <hr>
        @endforeach
        </ul>
    </div>
@endsection
                