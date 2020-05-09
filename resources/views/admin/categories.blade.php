@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card-header">Kategorie</div>

                <div class="card-body">
                    @if(auth()->user()->is_admin == 1)
                    <div class="">
                        <h5>Dodaj kategorię</h5>
                        <form method="POST" action="{{ route('image.upload.category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <div class="form-group">
                                    <label for="name" class="">Kategoria</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input class="form-control" type="text" name="slug" id="slug" value=""><br>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Zdjęcie kategorii</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                </div>

                                <input type="submit" value="Dodaj kategorię" class="btn btn-dark">
                            </div>
                        </form>
                    </div>
                    <div>
                        <h5>Lista kategorii przepisów</h5>
                        <ul class="list-group">
                            @if(isset($categories))
                            @foreach ($categories as $category)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $category->name }}
                                <form method="POST" action="{{ action('CategoryAdminController@destroy', $category->id)}}">
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