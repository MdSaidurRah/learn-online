<!DOCTYPE html>
<html>
<head>
    <link href="{{url('/assets/lib/bootstrap/4.1.1/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{url('/custom/css/common.css')}}" rel="stylesheet">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<section  class="login">
    <div class="container" style="padding: 100px">
        <div class="row" style="filter: drop-shadow(14px 7px 13px #000);">

            <div class="col-md-8 loginPicture"></div>
            <div class="col-md-4 loginBox">
                <h2 class="loginAccount">Login Account</h2>

                <p class="shortMessage">WELCOME to EduInnTech Smart University Website Dashboard.
                    Please continue with your official email for login.</p>

                @if(isset($message))
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @endif

                <form id="loginform" action="{{url('/login-post')}}" method="post" enctype="" >
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" value="saidur@eduinntech.com" name="userEmail" id="userEmail" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Please provide only official e-mail.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" value="asdf" name="userPassword" id="userPassword" class="form-control" id="exampleInputPassword1">
                    </div>
                    <br/>
                    <button type="submit" class="login-btn">Login</button>
                </form>

            </div>
        </div>
    </div>

</section>


</body>
<script src="{{url('/assets/js/jquery.js')}}"></script>
<script src="{{url('/assets/lib/jquery-validate/1.19.0/jquery.validate.min.js')}}"></script>
<script src="{{url('assets/js/plugins/bootstrap.min.js')}}"></script>
<script>
    $( document ).ready(function() {

        // $('#userEmail').change(function () {
        //     let emailReg = new RegExp(/^[a-z]+\_*\.*[a-z]*@[a-z]*\.*green\.edu\.bd$/i);
        //     let emailText = $('#userEmail').val();
        //     if (!emailReg.test(emailText)) {
        //         alert('Invalid Email Address\Addresses format! Please Re-enter only GUB Official Email');
        //         $('#userEmail').val('');
        //         return false;
        //     }
        // });

    });

    $("#loginform").validate({
        rules: {
            userEmail: {
                required: true
            },
            userPassword: {
                required: true
            }
        },
        messages: {
            userEmail: {
                required: "Please enter email",
            },
            userPassword: {
                required: "Please enter password",
            }
        },
    })
</script>
</html>
