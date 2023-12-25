"use strict";

jQuery(document).ready(function () {
    var table = $('#dangKyTrongSo').DataTable({

        // begin first table
        // fixedHeader: {
        //     header: true,
        // },

        // fixedHeader:true,
        // scrollX: true,
        // scrollY: "200px",
        // scrollCollapse: true,
        //
        // scrollY:        200,
        // deferRender:    true,

        responsive: true,

        language: {
            "lengthMenu": trans('datatable.show') + " _MENU_ " + trans('datatable.entries'),
            "zeroRecords": trans('datatable.zero_records'),
            "info": trans('datatable.info') + " _PAGE_ " + trans('datatable.of') + " _PAGES_",
            "infoEmpty": trans('datatable.info_empty'),
            "infoFiltered": "(" + trans('datatable.filtered_from') + " _MAX_ " + trans('datatable.filtered_records') + ")",
            "paginate": {
                "previous": trans('datatable.previous'),
                "next": trans('datatable.next')
            },
            "search": trans('datatable.search')
        },

        columnDefs: [
            {targets: 0, width: '50px',},
            {targets: 2, width: '100px',},
            {targets: [3, 4], width: '100px', orderable: false},
        ],
    });

    $(".dataTables_filter").hide();

    // Event listener to the two range filtering inputs to redraw on input
    $("#tim_kiem").keyup(function () {
        var tblData = $.map(table.rows('.selected').data(), function (item) {
            return item[0];
        });
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            for (var index = 0; index < tblData.length; index++) {
                if (data[0] === tblData[index]) {
                    return true;
                }
            }

            var data_nguon = data[1].toUpperCase();
            var data_search = $("#tim_kiem").val().toUpperCase();
            if (data_nguon.indexOf(data_search) >= 0) {
                return true;
            }
            return false;
        });
        table.draw();
        $.fn.dataTable.ext.search.pop();
    });

    jQuery('#btn_summit').click(function () {
        var value = '';
        var tongdiem = 0;

        var loai_danh_gia = "1";
        if ($("#loai_danh_gia_thoi_gian").is(':checked')) {
            loai_danh_gia = "0";
        }

        $("input[name^=chk_chon]").each(function () {
            $(this).val("");
            var khong_danh_gia = '0';//mac dinh khong chon

            if ($(this).is(":checked")) {
                var sid = $(this).attr("id");
                var arr = sid.split("_");
                var id = arr[arr.length - 1];
                var diem = $("#diem_trong_so_" + id).val();
                if ($("#khong_danh_gia_" + id).is(':checked')) {
                    khong_danh_gia = $("#khong_danh_gia_" + id).val();
                }

                if (diem !== '' && isNaN(diem)) {
                    Swal.fire(
                        'Thông báo!',
                        'Vui lòng nhập số cho điểm đánh giá: dòng ' + id +'!',
                        'warning'
                    );
                    return false;
                }

                if (value === '') {
                    value = id + '~^~' + diem + '~^~' + khong_danh_gia;
                } else {
                    value += ',' + id + '~^~' + diem + '~^~' + khong_danh_gia;
                }
                tongdiem += parseInt(diem);
            }
        });

        var i = table.rows('.selected').data().length;
        if (i < 1) {
            Swal.fire(
                'Thông báo!',
                'Vui lòng nhập thông tin dòng cần xử lý!',
                'warning'
            );
            return false;
        } else if (tongdiem > 90) {
            Swal.fire(
                'Thông báo!',
                'Tổng số điểm của các loại công việc không được vượt quá 90 điểm!',
                'warning'
            );
            return false;
        } else {
            $("#h_dangkytrongso").val(value);
            $("#h_loai_danh_gia").val(loai_danh_gia);
        }
    });
})
;

$('.chon').change(function () {
    $(this).parent('td').parent('tr').toggleClass('selected');
});

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(':${placeholder}', replace[placeholder]);
    }
    return translation;
};
