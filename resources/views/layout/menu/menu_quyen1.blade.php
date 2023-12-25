@include('layout.menu.menu_quyen0')
@if(session()->get('quyen')==3)
<ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
    <a href="{{ route('tapthetudanhgiaManage.index1DanhSachTapThe') }}"
        class="{{ request()->is('tapthetudanhgia/*') ? 'active' : '' }}">
        <span>Danh sách - Form 01 - Tập Thể Tự Đánh Giá</span>
    </a>
</ul>
@endif
