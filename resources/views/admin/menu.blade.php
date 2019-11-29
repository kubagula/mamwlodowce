@if(auth()->user()->is_admin == 1)   
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="{{url('admin/ingredients')}}">Składniki</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/recipes')}}">Przepisy</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/categories')}}">Kategorie przepisów</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/months')}}">Miesiące</a>
        </li>                          
    </ul>                                     
@else
    <div class=”panel-heading”>Normal User</div>
@endif
      