<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://siteadmin.green.edu.bd/public/custom/css/common.css" rel="stylesheet">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>


<section  class="login">
    <div class="container" style="padding: 100px">
        <div class="row" style="filter: drop-shadow(14px 7px 13px #000); height: 300px">

            <div class="col-md-6 resetPicture"></div>
            <div class="col-md-6 resetBox">
                <h2 class="loginAccount">Reset Password</h2>
                <p class="shortNote">Dont Worry. If you forget your Password please put your email here and request for new password.
                    We will send you new password to your GUB official email.</p>
                <form id="passwordresetform" action="{{url('/password-reset-request')}}" method="post" enctype="" >
                    @csrf
                    <div class="form-group box-label" >
                        <label for="exampleInputEmail1">Please enter your E-mail address:</label>
                        <br/>
                        <input type="email" class="form-control" name="userEmail" id="userEmail" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted shortNote">Only GUB official email will be accepted.</small>
                    </div>
                    <br/>
                    <button type="submit" class="req-btn">Request Password</button>
                </form>
                <p class="shortMessage">For login : <a href="{{url('/login')}}" class="link-info">Login</a></p>
            </div>
        </div>
    </div>

</section>



</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>
<script>
    $( document ).ready(function() {

        $('#userEmail').change(function () {
            let emailReg = new RegExp(/^[a-z]+\_*\.*[a-z]*@[a-z]*\.*green\.edu\.bd$/i);
            let emailText = $('#userEmail').val();
            if (!emailReg.test(emailText)) {
                alert('Invalid Email Address\Addresses format! Please Re-enter only GUB Official Email');
                $('#userEmail').val('');
                return false;
            }
        });

    });
    $("#passwordresetform").validate({
        rules: {
            userEmail: {
                required: true
            },
        },
        messages: {
            userEmail: {
                required: "Please enter valid email id",
            },
        },
    })
</script></html>
