@php
    function renderCategoryMenu($category) {
        $children = $category->children;
        $hasChildren = $children->isNotEmpty();
@endphp
    <a class="dropdown-item @if($hasChildren) dropdown-toggle @endif" href="#" @if($hasChildren) data-toggle="dropdown" @endif>
        {{ $category->name }}
    </a>
    @if($hasChildren)
        <div class="dropdown-menu">
            @foreach($children as $child)
                @include('categories.category_item', ['category' => $child])
            @endforeach
        </div>
    @endif
@php
    }
@endphp

@php renderCategoryMenu($category) @endphp
