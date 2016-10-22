
@if ($breadcrumbs)
@foreach ($breadcrumbs as $breadcrumb)
    @if (!$breadcrumb->last)
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <span> / </span>
@else
                <span class="active">{{ $breadcrumb->title }}</span>
@endif
        @endforeach
@endif