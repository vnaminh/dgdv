<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('trang-chu') }}" class="{{ request()->is('/') ? 'active' : '' }}"
        aria-current="true">
        <span>Dashboard</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('tukiemdiemManage.indexTuKiemDiem') }}"
        class="{{ request()->is('tukiemdiem/*') ? 'active' : '' }}">
        <span>Form 02 - Tự kiểm điểm </span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('camketManage.dsCamKet') }}"
        class="{{ request()->is('camket/*') ? 'active' : '' }}">
        <span>Form Cam Kết </span>
    </a>
</ul>


{{-- <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('tukiemdiemManage.formTuKiemDiem') }}"
        class="{{ request()->is('tukiemdiem/form') ? 'active' : '' }}">
        <span>Form 02 - Tự kiểm điểm</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('camketManage.indexCamKet', ['user_id' => session()->get('user_id')]) }}"
        class="{{ request()->is('camket/*') ? 'active' : '' }}">
        <span>Cam Kết</span>
    </a>
</ul> --}}
