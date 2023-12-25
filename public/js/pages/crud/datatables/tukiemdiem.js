"use strict";
var KTDatatablesDataSourceHtml = function() {

    var initTable1 = function() {
        var table = $('#dstukiemdiem').DataTable({

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
                {targets: 0, width: '30px', orderable: false},
                {targets: 1, width: '30px',},
                {targets: 2, width: '50px',},
                {targets: 3, width: '150px',},
                {width: '70px', targets: 11, orderable: false},
                {width: '120px', targets: 12, orderable: false},
                // {
                //     width: '70px',
                //     targets: 11,

                //     render: function(data, type, full, meta) {
                //         var status = {
                //             0: {'title': 'Không', 'class': ' label-light-danger'},
                //             1: {'title': 'Sử dụng', 'class': ' label-light-success'},
                //         };

                //         if (typeof status[data] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
                //     },
                // },
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
