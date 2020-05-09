@extends('layouts.app')

@section('title', 'Kalendarz sezonowy')

@section('nav')
@parent
@endsection

@section('pageTitle')
<h1>Kalendarz sezonowy</h1>
@endsection

@section('content')
<div class="description">
    <p>Podczas planowania posiłków warto wziąć pod uwagę warzywa i owoce, na które w danym miesiącu jest sezon. Dzięki temu będą one nie tylko tańsze, ale i bardziej wartościowe. Kliknij w wybrany składnik żeby zobaczyć przepisy, które go zawierają.</p>
</div>

<div class="months">
    @foreach ($monthsIngredients as $month => $ingredients)
    <div class="month">
        <h2>{{ $month }}</h2>
        @foreach ($ingredients as $ingredient)
        <a class="button" href="{{route('recipes.ingredients', $ingredient['slug'])}}">{{ $ingredient['name'] }} </a>
        @endforeach
    </div>
    @endforeach
</div>

<script type="text/javascript">
    $(document).ready(function() {
        markMonth();
    });
</script>

@endsection