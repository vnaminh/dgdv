"use strict";
var KTDatatablesDataSourceHtml = function () {

    var initTable1 = function () {
        var table = $('#vaiTro').DataTable({

            // begin first table
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
                {width: '200px', targets: 2, orderable: false},
            ],
        });

        var row = 1;
        $('#addRow').on('click', function () {
            table.row.add([
                '',
                '<input id="ten_'+row+'" name="ten_'+row+'" class="form-control" type="text" />',
                '&emsp;<a href="#"\n' +
                ' class="btn btn-sm btn-clean btn-icon icon-delete-row" title="'+trans('form.xoa')+'">\n' +
                ' <i class="la la-minus-circle"></i></a>'
            ]).draw(false);

            row++;
        });

        $('#vaiTro tbody').on( 'click', 'a.icon-delete-row', function () {
            table
                .row( $(this).parents('tr') )
                .remove()
                .draw();
        } );
    };

    return {
        //main function to initiate the module
        init: function () {
            initTable1();
        },

    };

}();

jQuery(document).ready(function () {
    KTDatatablesDataSourceHtml.init();
});

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(':${placeholder}', replace[placeholder]);
    }

    return translation;
}
