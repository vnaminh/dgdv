{{-- Aside --}}
@php
    $kt_logo_image = 'cusc.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'cusc-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'cusc-light.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto"
    id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ route('trang-chu') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/' . $kt_logo_image) }}" />
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0 ki ki-double-arrow-back icon-md" id="kt_aside_toggle">
                {{--                {{ Metronic::getSVG( 'media/svg/icons/Navigation/Angle-double-left.svg', "svg-icon-xl") }} --}}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ route('trang-chu') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/' . $kt_logo_image) }}" />
                </a>
            </div>
        @endif

        <div id="kt_aside_menu" class="aside-menu my-4 mx-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1" {{ Metronic::printAttrs('aside_menu') }}>
            @include('layout.menu.menu_quyen' . session()->get('quyen'))
        </div>
    </div>
</div>
