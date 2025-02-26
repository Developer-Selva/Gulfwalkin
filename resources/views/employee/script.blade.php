<script>
    $(document).ready(function() {
        csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': csrfToken
            }
        });
    });

    $(document).ready(function() {

        $(".phNumOnly").on("input", function() {
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

        $(".txtOnly").on("input", function() {
            let usernameInput = $(this).val();
            usernameInput = usernameInput.replace(/[^a-zA-Z\s]/g, "");
            $(this).val(usernameInput);
            if (/[^a-zA-Z\s]/g.test(usernameInput)) {
                $("#error-message").show();
            } else {
                $("#error-message").hide();
            }
        });

        $(".emailValidation").on("input", function() {
            let emailInput = $(this).val();
            emailInput = emailInput.replace(/[^a-zA-Z0-9@.]/g, "");
            const emailRegex = /^[a-zA-Z0-9]+([._%+-]*[a-zA-Z0-9])*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            $(this).val(emailInput);
        });
    });

    $('body').on('click', '.clsCreateAcc', function() {
        $('.clsRegComDiv').hide();
        $('.registerDiv').show();
    });

    $('body').on('click', '.clsComBkBtn', function() {
        $('.clsRegComDiv').hide();
        $('.loginDiv').show();
    });

    $('body').on('click', '.clsComBkBtn', function() {
        $('.clsRegComDiv').hide();
        $('.loginDiv').show();
    });
    $('body').on('click', '.forget-password', function() {
        $('.clsRegComDiv').hide();
        $('.frgtPwdDiv,.forget-form').show();
    });

    $('body').on('click', '.btnFgtFrm', function(e) {
        e.preventDefault();

        let email = $('.fgtEmailVal').val();
        // let email ='test@gamil.com';
        let type = 2;
        sendOtp(email,type);

    })



    const $otpInputs = $(".otp-input");
    const $resendBtn = $("#resend-btn");
    const $timerElement = $("#timer");
    let timer = 30;

    // Auto-focus to the next input
    $otpInputs.each(function (index) {
        $(this).on("input", function () {
            if ($(this).val().length === 1 && index < $otpInputs.length - 1) {
                $otpInputs.eq(index + 1).focus();
            }
        });

        $(this).on("keydown", function (e) {
            if (e.key === "Backspace" && index > 0 && $(this).val() === "") {
                $otpInputs.eq(index - 1).focus();
            }
        });
    });

    // Resend OTP timer
    function startTimer() {
        timer = 10;
        $('.clsResendOtpBtn').hide();
        $('#resend-timer').show();
        $timerElement.text(timer);
        const countdown = setInterval(function () {
            timer--;
            $timerElement.text(timer);

            if (timer === 0) {
                clearInterval(countdown);
                $('.clsResendOtpBtn').show();
                $('#resend-timer').hide();
            }
        }, 1000);
    }

    // Initial timer start
    startTimer();

    // Resend OTP click handler
    $resendBtn.on("click", function () {
        alert("OTP resent!");
        startTimer();
    });



    function sendOtp(email,type){
        // OTP ajax
        // 1 -
        // 2 - forgetpassword


        $.ajax({
        url: '{{route('sendOtp')}}',
        type: 'post',
        data: {
            email,type
        },
        success: function(response) {

            if(response.status != 200){
                alert(response.message);
                return false;
            }
            alert(response.message);
            if(type == 2){
                $('.clsRegComDiv').hide();
                $('.frgtOtpDiv').show();
                $('.clsParFrgtEm').val(email);
                $('.otp_first').focus();
            }
        },
        error: function(response) {
            console.log(response);
        }
    });


    function verifyOtp(otp,type,email){
        $.ajax({
        url: "{{route('verifyOtp')}}",
        type: 'post',
        data: {
            email,type,otp
        },
        success: function(response) {

            if(response.status != 200){
                alert(response.message);
                return false;
            }
            alert(response.message);
            if(type == 2){
                $('.clsRegComDiv').hide();
                $('.resetPwdDiv').show();
                $('.resetPwdEmailBx').val(email);
                $('.hiddenOtp').val(otp);
            }
        },
        error: function(response) {
            console.log(response);
        }});
    }

    function resetPassword(otp,email,password){
        $.ajax({
        url: '{{route('reset_password')}}',
        type: 'post',
        data: {
            email,otp,password
        },
        success: function(response) {
            alert('rasa');
        },
        error: function(response) {
            console.log(response);
        }});
    }

    function convertOtp(cls){
        let otp ='';
        $(cls).each(function() {
            otp += $(this).val();
        });
        return otp;
    }

    $('body').on('click','.clsOtpVerifyBtn',function(){
        let otp = convertOtp(".otp-input");
        let email = $('.clsParFrgtEm').val();
        verifyOtp(otp,2,email);
    });

    $('body').on('click','.clsPwdResetBtn',function(e){
        let otp = convertOtp(".hiddenOtp");
        let email = $('.resetPwdEmailBx').val();
        let password = $('.clsConfirmPwd').val();
        resetPassword(otp,email,password);
    });

}

</script>
