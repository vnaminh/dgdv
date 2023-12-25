@include('layout.menu.menu_quyen2')
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('doanthanhnienManage.doanthanhnien_danhgia') }}"
        class="{{ request()->is('doanthanhnien_danhgia/*') ? 'active' : '' }}">
        <span>Đoàn Thanh niên - Đánh giá</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('congdoanManage.congdoan_danhgia') }}"
        class="{{ request()->is('congdoan_danhgia/*') ? 'active' : '' }}">
        <span>Công Đoàn - Đánh giá</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('nhomquyenManage.indexNhomQuyen') }}" class="{{ request()->is('nhomquyen/*') ? 'active' : '' }}">
        <span>Nhóm Quyền</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('nhomtaptheManage.indexNhomTapThe') }}"
        class="{{ request()->is('nhomtapthe/*') ? 'active' : '' }}">
        <span>Nhóm Tập Thể</span>
    </a>
</ul>
{{-- <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('phanquyendanhgiataptheManage.indexPhanQuyenDanhGiaTapThe') }}"
        class="{{ request()->is('phanquyendanhgiatapthe/*') ? 'active' : '' }}">
        <span>Phân Quyền Nhóm Tập Thể</span>
    </a>
</ul> --}}
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('thoigiandanhgiaManage.index') }}"
        class="{{ request()->is('thoigiandanhgia/*') ? 'active' : '' }}">
        <span>QL thời gian đánh giá tự kiểm</span>
    </a>
</ul>
{{-- <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('capdodanhgiaManage.indexCapDoDanhGia') }}"
        class="{{ request()->is('capdodanhgia/*') ? 'active' : '' }}">
        <span>Cấp độ đánh giá</span>
    </a>
</ul> --}}
{{-- <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('danhgiatukiemManage.indexDanhGiaTuKiem', ['user_id' => session('user_id')]) }}"
        class="{{ request()->is('danhgiatukiem/*') ? 'active' : '' }}">
        <span>Đánh giá tự kiểm -(dữ liệu động)</span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('danhgiataptheManage.indexDanhGiaTapThe', ['user_id' => 1]) }}"
        class="{{ request()->is('danhgiatapthe/*') ? 'active' : '' }}">
        <span>Đánh giá tập thể -(dữ liệu động) </span>
    </a>
</ul>
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('tieuchidanhgiataptheManage.indexTieuChiDanhGiaTapThe') }}"
        class="{{ request()->is('tieuchidanhgiatapthe/*') ? 'active' : '' }}">
        <span>Tiêu chí đánh giá - Form tập thể</span>
    </a>
</ul> --}}
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    Tiêu chí đánh giá - Form 02
    <li>
        <a href="{{ route('tieuchidanhgiatukiemManage.indexTieuChiDanhGiaTuKiem') }}"
            class="{{ request()->is('tieuchidanhgiatukiem/*') ? 'active' : '' }}">
            <span>Quản lý tiêu chí đánh giá</span>
        </a>
    </li>
    <li>
        <a href="{{ route('tieuchidanhgiatukiemmucManage.index') }}"
            class="{{ request()->is('tieuchidanhgiatukiem_muc/*') ? 'active' : '' }}">
            <span>Quản lý mục</span>
        </a>
    </li>
</ul>
