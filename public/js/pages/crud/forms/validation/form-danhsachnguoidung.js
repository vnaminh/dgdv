// Class definition
var KTFormControls = function () {
    // Private functions
    var _formValidate = function () {
        FormValidation.formValidation(
            document.getElementById('formDanhSachNguoiDung'),
            {
                fields: {
                    user_code: {
                        validators: {
                            notEmpty: {
                                message: trans('validation.required')
                            },
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
        init: function () {
            _formValidate();
        }
    };
}();

jQuery(document).ready(function () {
    KTFormControls.init();

    $('#cmb_phu_trach').multiselect({
        buttonWidth: '390px',
        enableCollapsibleOptGroups: true,
        collapseOptGroupsByDefault: true,
        enableClickableOptGroups: true,
        maxHeight: 400,
        nonSelectedText: 'Vui lòng chọn',
        includeResetOption: true,
        resetText: "Bỏ chọn"

    });

    if ($('#user_phu_trach').is(':checked') === false) {
        $('#phu_trach_danh_gia').attr('hidden', true);
    }
});

function userPhuTrachChange() {
    if ($('#user_phu_trach').is(':checked') === false) {
        $('#phu_trach_danh_gia').attr('hidden', true);
        $('#cmb_phu_trach').attr('disabled', true);
    } else {
        $('#phu_trach_danh_gia').removeAttr('hidden');
    }
}

function trans(key, replace = {}) {
    let translation = key.split('.').reduce((t, i) => t[i] || null, window.translations);

    for (var placeholder in replace) {
        translation = translation.replace(':${placeholder}', replace[placeholder]);
    }

    return translation;
}
