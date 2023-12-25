<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', 'PagesController@index')->name("trang-chu");
// Route::get('/', 'TaiKhoanController@indexLogin')->name("login");
// Route::post('/login/process', 'TaiKhoanController@processLogin')->name("loginprocess");
// Route::post('/logout', 'TaiKhoanController@processLogout')->name("logout");

Route::get('/', 'Auth\LoginController@showFormLogin')->name('login');
Route::post('/auto-login', 'Auth\LoginController@autoLogin')->name('auto-login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['checkPermission']], function () {
    Route::name('thoigiandanhgiaManage.')->group(function () {
        Route::get('/thoigiandanhgia', 'ThoiGianDanhGiaTuKiemDiemController@index')->name('index');
        Route::get('/thoigiandanhgia/edit', 'ThoiGianDanhGiaTuKiemDiemController@edit')->name('edit');
        Route::put('/thoigiandanhgia/update', 'ThoiGianDanhGiaTuKiemDiemController@update')->name('update');
    });

    Route::name('userManage.')->group(function () {
        Route::get('/user', 'UsersController@index')->name('indexUser');
        Route::get('/user/create', 'UsersController@createUser')->name('createUser');
        Route::post('/user/store', 'UsersController@storeUser')->name('storeUser');
        Route::get('/user/edit/{user_id}', 'UsersController@editUser')->name('editUser');
        Route::put('/user/update/{user_id}', 'UsersController@updateUser')->name('updateUser');
    });

    Route::name('nhomquyenManage.')->group(function () {
        Route::get('/nhomquyen', 'NhomQuyenController@index')->name('indexNhomQuyen');
        Route::get('/nhomquyen/create', 'NhomQuyenController@createNhomQuyen')->name('createNhomQuyen');
        Route::post('/nhomquyen/store', 'NhomQuyenController@storeNhomQuyen')->name('storeNhomQuyen');
        Route::get('/nhomquyen/edit/{nhom_quyen_id}', 'NhomQuyenController@editNhomQuyen')->name('editNhomQuyen');
        Route::put('/nhomquyen/update/{nhom_quyen_id}', 'NhomQuyenController@updateNhomQuyen')->name('updateNhomQuyen');
        // Route::delete('/nhomquyen/destroyNhomQuyen/{nhom_quyen_id}', 'NhomQuyenController@destroyNhomQuyen')->name('destroyNhomQuyen');
    });

    Route::name('nhomtaptheManage.')->group(function () {
        Route::get('/nhomtapthe', 'NhomTapTheController@index')->name('indexNhomTapThe');
        Route::get('/nhomtapthe/create', 'NhomTapTheController@createNhomTapThe')->name('createNhomTapThe');
        Route::post('/nhomtapthe/store', 'NhomTapTheController@storeNhomTapThe')->name('storeNhomTapThe');
        Route::get('/nhomtapthe/edit/{nhom_tap_the_id}', 'NhomTapTheController@editNhomTapThe')->name('editNhomTapThe');
        Route::put('/nhomtapthe/update/{nhom_tap_the_id}', 'NhomTapTheController@updateNhomTapThe')->name('updateNhomTapThe');
        // Route::delete('/nhomtapthe/destroyNhomTapThe/{nhom_tap_the_id}', 'NhomTapTheController@destroyNhomTapThe')->name('destroyNhomTapThe');
    });
    Route::name('phanquyendanhgiataptheManage.')->group(function () {
        Route::get('/phanquyendanhgiatapthe', 'PhanQuyenDanhGiaTapTheController@index')->name('indexPhanQuyenDanhGiaTapThe');
        Route::get('/phanquyendanhgiatapthe/create', 'PhanQuyenDanhGiaTapTheController@createPhanQuyenDanhGiaTapThe')->name('createPhanQuyenDanhGiaTapThe');
        Route::post('/phanquyendanhgiatapthe/store', 'PhanQuyenDanhGiaTapTheController@storePhanQuyenDanhGiaTapThe')->name('storePhanQuyenDanhGiaTapThe');
        Route::get('/phanquyendanhgiatapthe/edit/{phan_quyen_danh_gia_tap_the_id}', 'PhanQuyenDanhGiaTapTheController@editPhanQuyenDanhGiaTapThe')->name('editPhanQuyenDanhGiaTapThe');
        Route::put('/phanquyendanhgiatapthe/update/{phan_quyen_danh_gia_tap_the_id}', 'PhanQuyenDanhGiaTapTheController@updatePhanQuyenDanhGiaTapThe')->name('updatePhanQuyenDanhGiaTapThe');
        // Route::delete('/phanquyendanhgiatapthe/destroyPhanQuyenDanhGiaTapThe/{phan_quyen_danh_gia_tap_the_id}', 'PhanQuyenDanhGiaTapTheController@destroyPhanQuyenDanhGiaTapThe')->name('destroyPhanQuyenDanhGiaTapThe');
    });

    Route::name('capdodanhgiaManage.')->group(function () {
        Route::get('/capdodanhgia', 'CapDoDanhGiaController@index')->name('indexCapDoDanhGia');
        Route::get('/capdodanhgia/create', 'CapDoDanhGiaController@createCapDoDanhGia')->name('createCapDoDanhGia');
        Route::post('/capdodanhgia/store', 'CapDoDanhGiaController@storeCapDoDanhGia')->name('storeCapDoDanhGia');
        Route::get('/capdodanhgia/edit/{cap_do_danh_gia_id}', 'CapDoDanhGiaController@editCapDoDanhGia')->name('editCapDoDanhGia');
        Route::put('/capdodanhgia/update/{cap_do_danh_gia_id}', 'CapDoDanhGiaController@updateCapDoDanhGia')->name('updateCapDoDanhGia');
    });

    Route::name('tieuchidanhgiataptheManage.')->group(function () {
        Route::get('/tieuchidanhgiatapthe', 'TieuChiDanhGiaTapTheController@index')->name('indexTieuChiDanhGiaTapThe');
        Route::get('/tieuchidanhgiatapthe/create', 'TieuChiDanhGiaTapTheController@createTieuChiDanhGiaTapThe')->name('createTieuChiDanhGiaTapThe');
        Route::post('/tieuchidanhgiatapthe/store', 'TieuChiDanhGiaTapTheController@storeTieuChiDanhGiaTapThe')->name('storeTieuChiDanhGiaTapThe');
        Route::get('/tieuchidanhgiatapthe/edit/{tieu_chi_danh_gia_tap_the_id}', 'TieuChiDanhGiaTapTheController@editTieuChiDanhGiaTapThe')->name('editTieuChiDanhGiaTapThe');
        Route::put('/tieuchidanhgiatapthe/update/{tieu_chi_danh_gia_tap_the_id}', 'TieuChiDanhGiaTapTheController@updateTieuChiDanhGiaTapThe')->name('updateTieuChiDanhGiaTapThe');
        Route::get('/tieuchidanhgiatapthe/updateActive/{tieu_chi_danh_gia_tap_the_id}', 'TieuChiDanhGiaTapTheController@updateTieuChiDanhGiaTapTheActive')->name('changeActive');
    });

    Route::name('tieuchidanhgiatukiemManage.')->group(function () {
        Route::get('/tieuchidanhgiatukiem', 'TieuChiDanhGiaTuKiemController@index')->name('indexTieuChiDanhGiaTuKiem');
        Route::get('/tieuchidanhgiatukiem/create', 'TieuChiDanhGiaTuKiemController@createTieuChiDanhGiaTuKiem')->name('createTieuChiDanhGiaTuKiem');
        Route::post('/tieuchidanhgiatukiem/store', 'TieuChiDanhGiaTuKiemController@storeTieuChiDanhGiaTuKiem')->name('storeTieuChiDanhGiaTuKiem');
        Route::get('/tieuchidanhgiatukiem/edit/{tieu_chi_danh_gia_tu_kiem_id}', 'TieuChiDanhGiaTuKiemController@editTieuChiDanhGiaTuKiem')->name('editTieuChiDanhGiaTuKiem');
        Route::put('/tieuchidanhgiatukiem/update/{tieu_chi_danh_gia_tu_kiem_id}', 'TieuChiDanhGiaTuKiemController@updateTieuChiDanhGiaTuKiem')->name('updateTieuChiDanhGiaTuKiem');
        Route::get('/tieuchidanhgiatukiem/updateActive/{tieu_chi_danh_gia_tu_kiem_id}', 'TieuChiDanhGiaTuKiemController@updateTieuChiDanhGiaTuKiemActive')->name('changeActive');
    });
    Route::name('tieuchidanhgiatukiemmucManage.')->group(function () {
        Route::get('/tieuchidanhgiatukiem_muc', 'TieuChiDanhGiaTuKiemDiemMucController@index')->name('index');
        Route::get('/tieuchidanhgiatukiem_muc/create', 'TieuChiDanhGiaTuKiemDiemMucController@createMuc')->name('create');
        Route::post('/tieuchidanhgiatukiem_muc/store', 'TieuChiDanhGiaTuKiemDiemMucController@storeMuc')->name('store');
        Route::get('/tieuchidanhgiatukiem_muc/edit/{id}', 'TieuChiDanhGiaTuKiemDiemMucController@editMuc')->name('edit');
        Route::put('/tieuchidanhgiatukiem_muc/update/{id}', 'TieuChiDanhGiaTuKiemDiemMucController@updateMuc')->name('update');
        Route::get('/tieuchidanhgiatukiem_muc/updateActive/{id}', 'TieuChiDanhGiaTuKiemDiemMucController@updateMucActive')->name('changeActive');
    });

    Route::name('danhgiatukiemManage.')->group(function () {
        Route::get('/danhgiatukiem/{user_id}', 'DanhGiaTuKiemController@index')->name('indexDanhGiaTuKiem');
        Route::post('/danhgiatukiem/store/{user_id}', 'DanhGiaTuKiemController@storeDanhGiaTuKiem')->name('storeDanhGiaTuKiem');
        Route::put('/danhgiatukiem/update/{user_id}', 'DanhGiaTuKiemController@updateDanhGiaTuKiem')->name('updateDanhGiaTuKiem');
    });

    // form 02
    Route::name('tukiemdiemManage.')->group(function () {
        Route::get('/tukiemdiem', 'TuKiemDiemController@index')->name('indexTuKiemDiem');
        Route::get('/tukiemdiem/tudanhgia', 'TuKiemDiemController@formTuKiem')->name('formTuKiemDiem');
        Route::get('/tukiemdiem/dgdv/{user_id}', 'TuKiemDiemController@dgTuKiemDiem')->name('dgTuKiemDiem');
        Route::post('/tukiemdiem/store/{user_id}', 'TuKiemDiemController@storeTuKiemDiem')->name('storeTuKiemDiem');
        Route::put('/tukiemdiem/update/{user_id}', 'TuKiemDiemController@updateTuKiemDiem')->name('updateTuKiemDiem');
        Route::get('/tukiemdiem/history/{user_id}', 'TuKiemDiemController@history')->name('historyTuKiemDiem');
    });
    Route::name('doanthanhnienManage.')->group(function () {
        Route::get('/doanthanhnien_danhgia', 'TuKiemDiemController@doanThanhNienIndex')->name('doanthanhnien_danhgia');
        Route::post('/doanthanhnien_danhgia/update', 'TuKiemDiemController@updateDanhGiaCuaDoanThanhNien')->name('updatedoanthanhnien_danhgia');
    });
    Route::name('congdoanManage.')->group(function () {
        Route::get('/congdoan_danhgia', 'TuKiemDiemController@congDoanIndex')->name('congdoan_danhgia');
        Route::post('/congdoan_danhgia/update', 'TuKiemDiemController@updateDanhGiaCuaCongDoan')->name('updatecongdoan_danhgia');
    });

    Route::name('danhgiataptheManage.')->group(function () {
        Route::get('/danhgiatapthe/{user_id}', 'DanhGiaTapTheController@index')->name('indexDanhGiaTapThe');
        Route::get('/danhgiatapthe/create/{user_id}', 'DanhGiaTapTheController@createDanhGiaTapThe')->name('createDanhGiaTapThe');
        Route::post('/danhgiatapthe/store/{user_id}', 'DanhGiaTapTheController@storeDanhGiaTapThe')->name('storeDanhGiaTapThe');
        Route::get('/danhgiatapthe/edit/{user_id}', 'DanhGiaTapTheController@editDanhGiaTapThe')->name('editDanhGiaTapThe');
        Route::put('/danhgiatapthe/update/{user_id}', 'DanhGiaTapTheController@updateDanhGiaTapThe')->name('updateDanhGiaTapThe');
    });

    //form 01
    Route::name('tapthetudanhgiaManage.')->group(function () {
        Route::get('/tapthe', 'TapTheTuDanhGiaController@index1')->name('index1DanhSachTapThe');
        Route::get('/tapthetudanhgia/index/{user_id}', 'TapTheTuDanhGiaController@index')->name('indexTapTheTuDanhGia');
        Route::post('/tapthetudanhgia/store/{user_id}', 'TapTheTuDanhGiaController@storeTapTheTuDanhGia')->name('storeTapTheTuDanhGia');
        Route::put('/tapthetudanhgia/update/{user_id}', 'TapTheTuDanhGiaController@updateTapTheTuDanhGia')->name('updateTapTheTuDanhGia');
    });
    Route::name('camketManage.')->group(function () {
        Route::get('/camket', 'CamKetController@index1')->name('dsCamKet');
        Route::get('/camket/{user_id}', 'CamKetController@index')->name('indexCamKet');
        Route::post('/camket/store/{user_id}', 'CamKetController@storeCamKet')->name('storeCamKet');
        Route::put('/camket/update/{user_id}', 'CamKetController@updateCamKet')->name('updateCamKet');
    });

    //PDF
    Route::name('formPDF.')->group(function () {
        Route::get('/form06', 'PDFController@form06')->name('form6');
        Route::get('/form01/{user_id}', 'PDFController@form01')->name('form1');
        Route::get('/form02/{user_id}', 'PDFController@form02')->name('form2');
        Route::get('/formcamket/{user_id}', 'PDFController@formcamket')->name('formcamket');
        Route::post('/form02/xuat_nhieu_file', 'PDFController@downloadForm02')->name('downloadform2');
    });
    
    //Word
    Route::name('formWORD.')->group(function () {
        // Route::get('/form06', 'DocumentController@form06')->name('form6');
        // Route::get('/form01/{user_id}', 'DocumentController@form01')->name('form1');
        // Route::get('/form02/{user_id}', 'DocumentController@form02')->name('form2');
        Route::get('/formcamketword/{user_id}', 'DocumentController@formcamketword')->name('formcamketword');
        // Route::post('/form02/xuat_nhieu_file', 'DocumentController@downloadForm02')->name('downloadform2');
    });
});

// Route::get('/', 'Auth\LoginController@showFormLogin')->name('login');
// Route::post('/auto-login', 'Auth\LoginController@autoLogin')->name('auto-login');
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

//Route::group(['middleware' => ['checkUser']], function (){

// Route::get('/trang-chu', 'PagesController@index')->name('trang-chu');

// Route::group(['middleware' => ['checkPermission']], function (){

//danh muc muc do cong viec
// Route::name('mucDoCongViec.')->group(function () {
//     Route::get('/danhmuc/mucdocongviec', 'DanhMucController@indexMucDoCongViec')->name('indexMucDoCongViec');
//     Route::get('/danhmuc/mucdocongviec/createMucDoCongViec', 'DanhMucController@createMucDoCongViec')->name('createMucDoCongViec');
//     Route::post('/danhmuc/mucdocongviec/storeMucDoCongViec', 'DanhMucController@storeMucDoCongViec')->name('storeMucDoCongViec');
//     Route::get('/danhmuc/mucdocongviec/editMucDoCongViec/{dm_muc_do_cong_viec_id}', 'DanhMucController@editMucDoCongViec')->name('editMucDoCongViec');
//     Route::put('/danhmuc/mucdocongviec/updateMucDoCongViec/{dm_muc_do_cong_viec_id}', 'DanhMucController@updateMucDoCongViec')->name('updateMucDoCongViec');
//     Route::delete('/danhmuc/mucdocongviec/destroyMucDoCongViec/{dm_muc_do_cong_viec_id}', 'DanhMucController@destroyMucDoCongViec')->name('destroyMucDoCongViec');
// });

// //danh muc tien do thuc hien
// Route::name('tienDoThucHien.')->group(function () {
//     Route::get('/danhmuc/tiendothuchien', 'DanhMucController@indexTienDoThucHien')->name('indexTienDoThucHien');
//     Route::get('/danhmuc/tiendothuchien/createTienDoThucHien', 'DanhMucController@createTienDoThucHien')->name('createTienDoThucHien');
//     Route::post('/danhmuc/tiendothuchien/storeTienDoThucHien', 'DanhMucController@storeTienDoThucHien')->name('storeTienDoThucHien');
//     Route::get('/danhmuc/tiendothuchien/editTienDoThucHien/{dm_tien_do_thuc_hien_id}', 'DanhMucController@editTienDoThucHien')->name('editTienDoThucHien');
//     Route::put('/danhmuc/tiendothuchien/updateTienDoThucHien/{dm_tien_do_thuc_hien_id}', 'DanhMucController@updateTienDoThucHien')->name('updateTienDoThucHien');
//     Route::delete('/danhmuc/tiendothuchien/destroyTienDoThucHien/{dm_tien_do_thuc_hien_id}', 'DanhMucController@destroyTienDoThucHien')->name('destroyTienDoThucHien');
// });

// //danh muc chat luong hoan thanh
// Route::name('chatLuongHoanThanh.')->group(function () {
//     Route::get('/danhmuc/chatluonghoanthanh', 'DanhMucController@indexChatLuongHoanThanh')->name('indexChatLuongHoanThanh');
//     Route::get('/danhmuc/chatluonghoanthanh/createChatLuongHoanThanh', 'DanhMucController@createChatLuongHoanThanh')->name('createChatLuongHoanThanh');
//     Route::post('/danhmuc/chatluonghoanthanh/storeChatLuongHoanThanh', 'DanhMucController@storeChatLuongHoanThanh')->name('storeChatLuongHoanThanh');
//     Route::get('/danhmuc/chatluonghoanthanh/editChatLuongHoanThanh/{dm_chat_luong_hoan_thanh_id}', 'DanhMucController@editChatLuongHoanThanh')->name('editChatLuongHoanThanh');
//     Route::put('/danhmuc/chatluonghoanthanh/updateChatLuongHoanThanh/{dm_chat_luong_hoan_thanh_id}', 'DanhMucController@updateChatLuongHoanThanh')->name('updateChatLuongHoanThanh');
//     Route::delete('/danhmuc/chatluonghoanthanh/destroyChatLuongHoanThanh/{dm_chat_luong_hoan_thanh_id}', 'DanhMucController@destroyChatLuongHoanThanh')->name('destroyChatLuongHoanThanh');
// });

// //danh muc muc do uu tien
// Route::name('mucDoUuTien.')->group(function () {
//     Route::get('/danhmuc/mucdouutien', 'DanhMucController@indexMucDoUuTien')->name('indexMucDoUuTien');
//     Route::get('/danhmuc/mucdouutien/createMucDoUuTien', 'DanhMucController@createMucDoUuTien')->name('createMucDoUuTien');
//     Route::post('/danhmuc/mucdouutien/storeMucDoUuTien', 'DanhMucController@storeMucDoUuTien')->name('storeMucDoUuTien');
//     Route::get('/danhmuc/mucdouutien/editMucDoUuTien/{dm_muc_do_uu_tien_id}', 'DanhMucController@editMucDoUuTien')->name('editMucDoUuTien');
//     Route::put('/danhmuc/mucdouutien/updateMucDoUuTien/{dm_muc_do_uu_tien_id}', 'DanhMucController@updateMucDoUuTien')->name('updateMucDoUuTien');
//     Route::delete('/danhmuc/mucdouutien/destroyMucDoUuTien/{dm_muc_do_uu_tien_id}', 'DanhMucController@destroyMucDoUuTien')->name('destroyMucDoUuTien');
// });

// //danh muc tieu chi danh gia khac
// Route::name('tieuChiDanhGiaKhac.')->group(function () {
//     Route::get('/danhmuc/tieuchidanhgiakhac', 'DanhMucController@indexTieuChiDanhGiaKhac')->name('indexTieuChiDanhGiaKhac');
//     Route::get('/danhmuc/tieuchidanhgiakhac/createTieuChiDanhGiaKhac', 'DanhMucController@createTieuChiDanhGiaKhac')->name('createTieuChiDanhGiaKhac');
//     Route::post('/danhmuc/tieuchidanhgiakhac/storeTieuChiDanhGiaKhac', 'DanhMucController@storeTieuChiDanhGiaKhac')->name('storeTieuChiDanhGiaKhac');
//     Route::get('/danhmuc/tieuchidanhgiakhac/editTieuChiDanhGiaKhac/{dm_tieu_chi_danh_gia_khac_id}', 'DanhMucController@editTieuChiDanhGiaKhac')->name('editTieuChiDanhGiaKhac');
//     Route::put('/danhmuc/tieuchidanhgiakhac/updateTieuChiDanhGiaKhac/{dm_tieu_chi_danh_gia_khac_id}', 'DanhMucController@updateTieuChiDanhGiaKhac')->name('updateTieuChiDanhGiaKhac');
//     Route::delete('/danhmuc/tieuchidanhgiakhac/destroyTieuChiDanhGiaKhac/{dm_tieu_chi_danh_gia_khac_id}', 'DanhMucController@destroyTieuChiDanhGiaKhac')->name('destroyTieuChiDanhGiaKhac');
// });

// //danh muc vai tro
// Route::name('vaiTro.')->group(function () {
//     Route::get('/danhmuc/vaitro', 'DanhMucController@indexVaiTro')->name('indexVaiTro');
//     Route::get('/danhmuc/vaitro/createVaiTro', 'DanhMucController@createVaiTro')->name('createVaiTro');
//     Route::post('/danhmuc/vaitro/storeVaiTro', 'DanhMucController@storeVaiTro')->name('storeVaiTro');
//     Route::get('/danhmuc/vaitro/editVaiTro/{dm_vai_tro_id}', 'DanhMucController@editVaiTro')->name('editVaiTro');
//     Route::put('/danhmuc/vaitro/updateVaiTro/{dm_vai_tro_id}', 'DanhMucController@updateVaiTro')->name('updateVaiTro');
//     Route::delete('/danhmuc/vaitro/destroyVaiTro/{dm_vai_tro_id}', 'DanhMucController@destroyVaiTro')->name('destroyVaiTro');
// });

// //danh muc diem danh gia
// Route::name('thongTinDiemDanhGia.')->group(function () {
//     Route::get('/danhmuc/thongtindiemdanhgia', 'DanhMucController@indexThongTinDiemDanhGia')->name('indexThongTinDiemDanhGia');
//     Route::get('/danhmuc/thongtindiemdanhgia/createThongTinDiemDanhGia', 'DanhMucController@createThongTinDiemDanhGia')->name('createThongTinDiemDanhGia');
//     Route::post('/danhmuc/thongtindiemdanhgia/storeThongTinDiemDanhGia', 'DanhMucController@storeThongTinDiemDanhGia')->name('storeThongTinDiemDanhGia');
//     Route::get('/danhmuc/thongtindiemdanhgia/editThongTinDiemDanhGia/{dm_thong_tin_diem_danh_gia_id}', 'DanhMucController@editThongTinDiemDanhGia')->name('editThongTinDiemDanhGia');
//     Route::put('/danhmuc/thongtindiemdanhgia/updateThongTinDiemDanhGia/{dm_thong_tin_diem_danh_gia_id}', 'DanhMucController@updateThongTinDiemDanhGia')->name('updateThongTinDiemDanhGia');
//     Route::delete('/danhmuc/thongtindiemdanhgia/destroyThongTinDiemDanhGia/{dm_thong_tin_diem_danh_gia_id}', 'DanhMucController@destroyThongTinDiemDanhGia')->name('destroyThongTinDiemDanhGia');
// });

// //quan ly dang ky trong so
// Route::name('dangKyTrongSo.')->group(function () {
//     Route::get('/danhgia/dangkytrongso', 'DanhGiaController@indexDangKyTrongSo')->name('indexDangKyTrongSo');
//     Route::get('/danhgia/dangkytrongso/searchDangKyTrongSo', 'DanhGiaController@public_searchDangKyTrongSo')->name('searchDangKyTrongSo');
//     Route::get('/danhgia/dangkytrongso/createDangKyTrongSo', 'DanhGiaController@createDangKyTrongSo')->name('createDangKyTrongSo');
//     Route::post('/danhgia/dangkytrongso/storeDangKyTrongSo', 'DanhGiaController@storeDangKyTrongSo')->name('storeDangKyTrongSo');
//     Route::get('/danhgia/dangkytrongso/editDangKyTrongSo/{dm_vai_tro_id}/{thangnam}', 'DanhGiaController@editDangKyTrongSo')->name('editDangKyTrongSo');
//     Route::put('/danhgia/dangkytrongso/updateDangKyTrongSo/{ql_dang_ky_trong_so_id}', 'DanhGiaController@updateDangKyTrongSo')->name('updateDangKyTrongSo');
//     Route::post('/danhgia/dangkytrongso/copyDangKyTrongSo', 'DanhGiaController@copyDangKyTrongSo')->name('copyDangKyTrongSo');
//     Route::delete('/danhgia/dangkytrongso/destroyDangKyTrongSo/{dm_vai_tro_id}', 'DanhGiaController@destroyDangKyTrongSo')->name('destroyDangKyTrongSo');
// });

// //quan ly danh sach nguoi dung
// Route::name('danhSachNguoiDung.')->group(function () {
//     Route::get('/nguoidung/danhsachnguoidung', 'NguoiDungController@indexDanhSachNguoiDung')->name('indexDanhSachNguoiDung');
//     Route::get('/nguoidung/danhsachnguoidung/editNhieuDanhSachNguoiDung', 'NguoiDungController@editNhieuDanhSachNguoiDung')->name('editNhieuDanhSachNguoiDung');
//     Route::put('/nguoidung/danhsachnguoidung/updateNhieuDanhSachNguoiDung', 'NguoiDungController@updateNhieuDanhSachNguoiDung')->name('updateNhieuDanhSachNguoiDung');
//     Route::get('/nguoidung/danhsachnguoidung/editDanhSachNguoiDung/{user_id}', 'NguoiDungController@editDanhSachNguoiDung')->name('editDanhSachNguoiDung');
//     Route::put('/nguoidung/danhsachnguoidung/updateDanhSachNguoiDung/{user_id}', 'NguoiDungController@updateDanhSachNguoiDung')->name('updateDanhSachNguoiDung');
// });

// //danh gia nang suat lao dong
// Route::name('danhGiaNangSuat.')->group(function () {
//     Route::get('/danhgia/danhgianangsuat', 'DanhGiaController@indexDanhGiaNangSuat')->name('indexDanhGiaNangSuat');
//     Route::get('/danhgia/danhgianangsuat/searchDanhGiaNangSuat', 'DanhGiaController@public_searchDanhGiaNangSuat')->name('searchDanhGiaNangSuat');
//     Route::get('/danhgia/danhgianangsuat/getNgayThangDanhGia', 'DanhGiaController@public_getNgayThangDanhGia')->name('getNgayThangDanhGia');
//     Route::get('/danhgia/danhgianangsuat/xuLyThemDongMoi', 'DanhGiaController@public_xuLyThemDongMoi')->name('xuLyThemDongMoi');
//     Route::get('/danhgia/danhgianangsuat/xuLyThemDongMoiEdit', 'DanhGiaController@public_xuLyThemDongMoiEdit')->name('xuLyThemDongMoiEdit');
//     Route::get('/danhgia/danhgianangsuat/createDanhGiaNangSuat', 'DanhGiaController@createDanhGiaNangSuat')->name('createDanhGiaNangSuat');
//     Route::post('/danhgia/danhgianangsuat/storeDanhGiaNangSuat/{user_id}/{thang_nam}', 'DanhGiaController@storeDanhGiaNangSuat')->name('storeDanhGiaNangSuat');
//     Route::get('/danhgia/danhgianangsuat/editDanhGiaNangSuat/{user_id}/{thang_nam}', 'DanhGiaController@editDanhGiaNangSuat')->name('editDanhGiaNangSuat');
//     Route::get('/danhgia/danhgianangsuat/viewDanhGiaNangSuat/{user_id}/{thang_nam}', 'DanhGiaController@public_viewDanhGiaNangSuat')->name('viewDanhGiaNangSuat');
//     Route::put('/danhgia/danhgianangsuat/updateDanhGiaNangSuat/{user_id}/{thang_nam}', 'DanhGiaController@updateDanhGiaNangSuat')->name('updateDanhGiaNangSuat');
// });

// //thiet lap thoi gian danh gia nang suat
// Route::name('thietLapThoiGian.')->group(function () {
//     Route::get('/danhgia/thietlapthoigian', 'DanhGiaController@indexThietLapThoiGian')->name('indexThietLapThoiGian');
//     Route::get('/danhgia/thietlapthoigian/createThietLapThoiGian', 'DanhGiaController@createThietLapThoiGian')->name('createThietLapThoiGian');
//     Route::post('/danhgia/thietlapthoigian/storeThietLapThoiGian', 'DanhGiaController@storeThietLapThoiGian')->name('storeThietLapThoiGian');
//     Route::get('/danhgia/thietlapthoigian/editThietLapThoiGian/{ql_thoi_gian_id}', 'DanhGiaController@editThietLapThoiGian')->name('editThietLapThoiGian');
//     Route::put('/danhgia/thietlapthoigian/updateThietLapThoiGian/{ql_thoi_gian_id}', 'DanhGiaController@updateThietLapThoiGian')->name('updateThietLapThoiGian');
// });
// });

//});
