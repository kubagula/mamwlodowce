@if(auth()->user()->is_admin == 1)
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/ingredients*')) ? 'active' : '' }}" href="{{url('admin/ingredients')}}">Składniki</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/recipes*')) ? 'active' : '' }}" href="{{url('admin/recipes')}}">Przepisy</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}" href="{{url('admin/categories')}}">Kategorie przepisów</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/types*')) ? 'active' : '' }}" href="{{url('admin/types')}}">Typy składników</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/units*')) ? 'active' : '' }}" href="{{url('admin/units')}}">Jednostki miar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/months*')) ? 'active' : '' }}" href="{{url('admin/months')}}">Miesiące</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/preservatives*')) ? 'active' : '' }}" href="{{url('admin/preservatives')}}">Sztuczne dodatki</a>
    </li>
</ul>
@else
<div class=”panel-heading”>Normal User</div>
@endif