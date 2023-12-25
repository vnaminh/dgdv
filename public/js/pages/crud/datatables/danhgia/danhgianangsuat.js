"use strict";
var KTDatatablesDataSourceHtml = function() {

    var initTable1 = function() {
        var table = $('#listDanhGiaNangSuat').DataTable({

            // begin first table
            responsive: true,

            language: {
                "lengthMenu": trans('datatable.show') + " _MENU_ " + trans('datatable.entries'),
                "zeroRecords": trans('datatable.zero_records'),
                "info": trans('datatable.info') + " _PAGE_ "+ trans('datatable.of') +" _PAGES_",
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
                {targets: 2, orderable: false,},
                {targets: [4,5,6,7,8,9], width: '70px',},
                {targets: 10, width: '50px', orderable: false,},
            ],
        });
    };

    return {
        //main function to initiate the module
        init: function() {
            initTable1();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesDataSourceHtml.init();
});

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(':${placeholder}', replace[placeholder]);
    }

    return translation;
}
