@extends('layouts.app')

@section('title', 'Sztuczne dodatki')

@section('nav')
    @parent 
@endsection

@section('pageTitle')
    <h1>Sztuczne dodatki</h1>
@endsection

@section('content')
<div class="description">Kupując gotowe produkty warto zwrócić uwagę na skład. Bardzo często okazuje się, że produkt, który chcemy kupić stanowi niewielki procent gotowego wyrobu a reszta do sztuczne dodatki. Często dodatki te są szkodliwe dla naszego zdrowia. Nie działa również zasada, że w droższych produktach będzie mniej chemii. Poniżej lista "E" z oznaczeniem, które są szkodliwe <span style="color: red">(czerwona ramka)</span>, a które nie <span style="color: green">(zielona ramka)</span>.</div>

        @foreach ($preservatives as $preservative)            
            <div class="recipe {{ $preservative->bad === 0 ? 'preservativeOk' : 'preservativeNoOk' }}">
                <h4><span class="preservativeCode">{{ $preservative->code }} </span> {{ $preservative->name }}</h4><span>Kategoria: {{ $preservative->category }}</span>
                <p>{{ $preservative->description }}</p>	            
            </div>    
        @endforeach
@endsection
                