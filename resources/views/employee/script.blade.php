<script>
$(document).ready(function () {
    $(".phNumOnly").on("input", function () {
        let phoneInput = $(this).val();
        phoneInput = phoneInput.replace(/[^0-9]/g, "");
        if (phoneInput.length > 0 && /^[0-5]/.test(phoneInput.charAt(0))) {
            phoneInput = '';
        }
        if (phoneInput.length > 10) {
            phoneInput = phoneInput.substring(0, 10);
        }
        $(this).val(phoneInput);
    });

    $(".txtOnly").on("input", function () {
        let usernameInput = $(this).val();
        usernameInput = usernameInput.replace(/[^a-zA-Z\s]/g, "");
        $(this).val(usernameInput);
        if (/[^a-zA-Z\s]/g.test(usernameInput)) {
            $("#error-message").show();
        } else {
            $("#error-message").hide();
        }
    });

    $(".emailValidation").on("input", function () {
        let emailInput = $(this).val();
        emailInput = emailInput.replace(/[^a-zA-Z0-9@.]/g, "");
        const emailRegex = /^[a-zA-Z0-9]+([._%+-]*[a-zA-Z0-9])*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        $(this).val(emailInput);
    });
});

$('body').on('click','.clsCreateAcc',function(){
    $('.loginDiv').hide();
    $('.registerDiv').show();
});

$('body').on('click','#register-back-btn',function(){
    $('.loginDiv').show();
    $('.registerDiv').hide();
});
</script>
