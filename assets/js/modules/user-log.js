
/* Login Page */
jQuery(document).ready(($) => {
    function objectifyFormArray(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    const getPhoneForm = $("#login-get-phone");
    const getOTPForm = $("#login-get-otp");
    const formLoader = $("#login-form-loader");
    const getOTPPass = $("#login-get-pass");

    const formsData = {
        nickname: undefined,
        phone: undefined,
        password: undefined
    }

    if (getPhoneForm)
        $(getPhoneForm).on("submit", (e) => {
            e.preventDefault();
            $(formLoader).show();

            const formDataArray = $(getPhoneForm).serializeArray();
            const formData = objectifyFormArray(formDataArray);
            formsData.phone = formData.phone;
            formsData.nickname = formData.nickname;

            $.ajax({
                url: cyn_head_script.url,
                type: 'post',
                data: {
                    action: 'login_get_phone',
                    _nonce: cyn_head_script.nonce,
                    data: formData,
                },
                success: (res) => {
                    $(getPhoneForm).hide();
                    $(getOTPForm).show();
                },
                error: (err) => {
                    if (Array.isArray(err.responseJSON.msgs))
                        return window.alert(err.responseJSON.msgs[0]);

                    window.alert("خطایی به وجود آمده. لطفا بعدا دوباره امتحان کنید");
                },
                complete: () => {
                    $(formLoader).hide();
                }
            });
        });

    if (getOTPForm)
        $(getOTPForm).on("submit", (e) => {
            e.preventDefault();
            $(formLoader).show();

            const formData = {
                otp_pass: $("#otp_pass").val(),
                phone: formsData.phone,
                nickname: formsData.nickname
            }

            $.ajax({
                url: cyn_head_script.url,
                type: 'post',
                data: {
                    action: 'cyn_login_get_otp',
                    _nonce: cyn_head_script.nonce,
                    data: formData,
                },
                success: (res) => {
                    if (res.url)
                        window.location.replace(res.url);
                    else
                        window.location.reload();
                },
                error: (err) => {
                    if (Array.isArray(err.responseJSON.msgs))
                        return window.alert(err.responseJSON.msgs[0]);

                    window.alert("خطایی به وجود آمده. لطفا بعدا دوباره امتحان کنید");
                },
                complete: () => {
                    $(formLoader).hide();
                }
            });
        });
    if (getOTPPass)
        $(getOTPPass).on("submit", (e) => {
            e.preventDefault();
            $(formLoader).show();

            const formData = {
                otp_pass: $("#otp_pass").val(),
                name: formsData.phone,
                email: formsData.email,
                password: formsData.password

            }

            $.ajax({
                url: cyn_head_script.url,
                type: 'post',
                data: {
                    action: 'cyn_login_get_otp',
                    _nonce: cyn_head_script.nonce,
                    data: formData,
                },
                success: (res) => {
                    if (res.url)
                        window.location.replace(res.url);
                    else
                        window.location.reload();
                },
                error: (err) => {
                    if (Array.isArray(err.responseJSON.msgs))
                        return window.alert(err.responseJSON.msgs[0]);

                    window.alert("خطایی به وجود آمده. لطفا بعدا دوباره امتحان کنید");
                },
                complete: () => {
                    $(formLoader).hide();
                }
            });
        });
});