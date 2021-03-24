<?php session_start();?>
<?php require '../vendor/autoload.php';?>
<?php require '../web.config.php';?>
<?php require '../CloudABIS/CloudABISConnector.php';?>
<?php use CloudABISSampleWebApp_CloudABIS\CloudABISConnector;?>
<?php

if(isset($_SESSION['admin_id'])){
header("location: dashboard.php");
}else

  


?>


<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Vote system using finger print as authentication - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <?php 
        function LoadCloudABISToken()
        {
            // CloudABISAPICredentials cloudABISCredentials = new CloudABISAPICredentials();
            // cloudABISCredentials.AppKey = AppSettingsReader.CloudABISAppKey;
            // cloudABISCredentials.SecretKey = AppSettingsReader.CloudABISSecretKey;
            // cloudABISCredentials.BaseAPIURL = AppSettingsReader.CloudABIS_API_URL;
            // cloudABISCredentials.CustomerKey = AppSettingsReader.CloudABISCustomerKey;
            // cloudABISCredentials.EngineName = EngineName();

            //Read token from CloudABIS Server
            $cloudABISConnector = new CloudABISConnector(CloudABISAppKey, CloudABISSecretKey, CloudABIS_API_URL, CloudABISCustomerKey, ENGINE_NAME);

            $token = $cloudABISConnector->GetCloudABISToken();
            if ( ! is_null($token) && isset($token->access_token) != "" )
            {
                $_SESSION['access_token'] = $token->access_token;
                //SessionManager.CloudABISAPIToken = token.AccessToken;
                //SessionManager.CloudABISCredentials = cloudABISCredentials;
            }
            else
            {
                SetStatus("CloudABIS Not Authorized!. Please check credentails");
            }
        }

        LoadCloudABISToken();

        function SetStatus($message)
        {
            echo $message . "<br />";
        }
    ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h2>E-Vote System</h2>
                      <h4 class="h6 text-gray-900 mb-4">Using finger print as authentication!</h4>
                    <h4 class="h5 text-gray-900 mb-2">Login!</h4>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
              <!--       <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <a href="Javascript:void(0);" class="btn btn-success btn-user btn-block" id="login_btn">
                      Login
                    </a>
            
                  </form>
                 
                
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendors/jquery/jquery.min.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendors/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>


  <script type="text/javascript">
    
    $(document).ready(function(){

// function validateEmail(email) 
//     {
//         var re = /\S+@\S+\.\S+/;
//         return re.test(email);
//     }


      $('#login_btn').click(function(event){

event.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        if (username == '') {
alert('Username Field is required');
        }else if (password == '') {
alert('Password Field is required');
        }else{


         $.ajax({        
        url:"ajaxprocess/login.php",
        method:"POST",
        data:{username:username,password:password},
        success:function(data){

    console.log(data);

    if (data == 'success') {

      window.location.href = 'dashboard.php';

    }else{

      alert(data);
    }

          }
        
         })

        }



      });




    });


  </script>

</body>

</html>
