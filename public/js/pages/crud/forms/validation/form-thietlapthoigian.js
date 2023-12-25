// Class definition
var KTFormControls = function () {
	// Private functions
	var _formValidate = function () {
		FormValidation.formValidation(
			document.getElementById('formThietLapThoiGian'),
			{
				fields: {
                    tuNgayDenNgay: {
                        validators: {
                            notEmpty: {
                                message: trans('validation.required')
                            },
                        }
                    },
                    ngayHetHanCaNhan: {
                        validators: {
                            notEmpty: {
                                message: trans('validation.required')
                            },
                        }
                    },
                    ngayHetHanQuanLy: {
                        validators: {
                            notEmpty: {
                                message: trans('validation.required')
                            },
                        }
                    },
                    ngayHetHanBoPhan: {
                        validators: {
                            notEmpty: {
                                message: trans('validation.required')
                            },
                        }
                    },
                    tong_so_gio: {
						validators: {
							notEmpty: {
								message: trans('validation.required')
							},
                            numeric: {
                                message: trans('validation.numeric')
                            }
						}
					},
				},

				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Validate fields when clicking the Submit button
					submitButton: new FormValidation.plugins.SubmitButton(),
            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		);
	}

	return {
		// public functions
		init: function() {
			_formValidate();
		}
	};
}();

jQuery(document).ready(function() {
	KTFormControls.init();

    $('#ngayHetHanCaNhan, #ngayHetHanQuanLy, #ngayHetHanBoPhan').datepicker({
        rtl: KTUtil.isRTL(),
        todayBtn: "linked",
        // clearBtn: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy'
    });
});

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(':${placeholder}', replace[placeholder]);
    }

    return translation;
}
