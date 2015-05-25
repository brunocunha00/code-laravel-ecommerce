<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }} - {{ $category->description }}</li>
    @endforeach
</ul>
