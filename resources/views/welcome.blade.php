<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{url('/custom/css/common.css')}}" rel="stylesheet">
</head>
<body>
<section  class="login">

    <div class="container" style="padding: 100px">
        <div class="row" style="filter: drop-shadow(14px 7px 13px #000); height: 300px">

            <div class="col-md-6 WelcomePicture"></div>
            <div class="col-md-6 resetBox">

                <h2 class="loginAccount">WELCOME <br/> to EduInnTech Smart University</h2>
                <p class="shortNote"></p>
                <div>
                    <a href="{{url('/login')}}" class="login-btn btn btn-primary"> Login Account</a>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
