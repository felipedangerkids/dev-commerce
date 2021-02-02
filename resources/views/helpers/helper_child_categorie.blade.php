<li>
      <a class="nav-link {{ request()->is('categoria/'.$child_categorie->slug) ? 'active-menu' : '' }}"
            href="{{url('categoria/'.$child_categorie->slug)}}">{{$child_categorie->name}}</a>

      @if ($child_categorie->subcategories->count() >= 1)
      <ul>
            @foreach ($child_categorie->subcategories as $childCategorie)
            @include('helpers.helper_child_categorie', ['child_categorie' => $childCategorie])
            @endforeach
      </ul>
      @endif
</li>