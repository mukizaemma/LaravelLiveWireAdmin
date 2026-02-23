@props(['title' => 'Page', 'header' => null])
@php
    $displayTitle = $header && $header->title ? $header->title : $title;
    $caption = $header && $header->caption ? $header->caption : null;
@endphp
<div class="locator-outer">
    <div class="locator">
        @if($header && $header->image_path)
            <img src="{{ asset($header->image_path) }}" alt="">
        @else
            <div class="locator-placeholder"></div>
        @endif
        <div class="locator-overlay"></div>
        <div class="locator-text">
            <h1 class="locator-title">{{ $displayTitle }}</h1>
            @if($caption)
                <p class="locator-caption">{{ $caption }}</p>
            @endif
        </div>
    </div>
</div>
