<?php 
session_start();
if (isset($_SESSION['slogin'])) {
    header('location:Vender_Register.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
      <!-- bootstrap cdn -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- jq cdn -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
<style type="text/css">
  body{
    background: url('login_image/macine.jpg') no-repeat;
    width: 100% !important;
    height: 100% !important;
      }
  #log{
    /*  border: 2px solid white;*/
    width: 85%;
    height: 90%;
    padding: 60px 40px;
    margin-top: 80px;
    -webkit-box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);   /*cssmatic.com [box shadow]*/
    -moz-box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);
    box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);
  }
  img{
    width: 140px;
    margin-left: 34%;

  }
  h1{
    color: white;
    text-align: center;
    font-weight: bolder;
    margin-top: 2px;  
    margin-bottom: 8%;
  }
  label{
    font-size: 20px;
    color: white;
  }
  .btn{
      margin-left: 33%;
     -webkit-box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);
     -moz-box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);
     box-shadow: -5px 2px 62px 8px rgba(0,0,0,0.75);
  }
  .check{
    height: 20px;
    width: 30px;
  }

</style>
</head>
<body>
  <div class="container-fluid ">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
       <div class="col-md-4 col-sm-4 col-xs-12">        <!-- login file db -->
         <form action="v_login_db.php" method="POST" id="log" accept-charset="utf-8" >
          <h1>LOGIN</h1>
          <img src="login_image/images.jpg" class="img img-responsive rounded-circle d-none d-lg-block">
             <div class="form-group">
                 <label>User Name</label>
                 <input type="text" name="u_name" class="form-control" placeholder="--User Name--">
             </div><br>
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="psw" class="form-control" placeholder="--Password--">
             </div><br><br>
             <!-- <div class="checkbox">
                 <label><input type="checkbox" class="mx-1 check" required> Remember me</label>
             </div><br> -->
            <button type="submit" name="login_btn" class="btn btn-info py-2 px-5">Login</button>
         </form>
       </div>
       <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
  </div>
</body>
</html>