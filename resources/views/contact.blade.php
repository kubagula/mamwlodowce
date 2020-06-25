@extends('layouts.app')

@section('title', 'Kontakt')

@section('nav')
@parent
@endsection

@section('pageTitle')
<h1>Kontakt</h1>
@endsection

@section('content')
<div class="description">Chcesz zaproponować nowy przepis? Brakuje Ci jakiejś funkcjonalności na stronie? A może masz po prostu ochotę się przywitać? </div>
@if ($errors->any())
<div class="error">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success">
   {{ session()->get('message') }}
</div>
@endif

<div class="contact-form">
   <form action="{{ url('contact-us') }}" method="POST">
      @csrf
      <div class="form-group">
         <label>Imię</label>
         <input type="text" name="name" class="single-input" value="{{ old('name') }}">
      </div>

      <div class="form-group">
         <label>E-mail</label>
         <input type="email " name="email" class="single-input" value="{{ old('email') }}">
      </div>

      <div class="form-group">
         <label>Wiadomość</label>
         <textarea name="message_body" class="single-textarea">{{ old('message_body') }}</textarea>
      </div>

      <button type="submit" class="button contact-button">Wyślij</button>
   </form>
</div>
@endsection