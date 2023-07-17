<?php 
  session_start();
  if (isset($_SESSION['sslogin'])) {
    header('location:machine_list.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <link   rel="icon" href="1.png" type="image/icon">
  <title>Login</title>
  
  <!-- Custom fonts for this template-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  

  <!-- Custom styles for this template-->
  <link href="sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<style type="text/css">
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.tp{
  margin-top: 10%;
  text-align: center;
}
.he1{
  padding-right: 32%;
  padding-left: 30%;
  color: white;
}
.m1{
  padding-right: 22%;
  padding-left: 22%;
}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  padding-top: 20px;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
padding: 10px;
background: #167c97;
color: white;
min-width: 50px;
text-align: center;
}
.input-field {
width: 100%;
/*padding: 10px;*/
outline: none;
}
.input-field:focus {
border: 2px solid #167c97;
}
/* Set a style for the submit button */
.btn {
background-color: #167c97;
color: white;
padding: 10px 20px;
margin-bottom: 10%;
border: none;
cursor: pointer;
text-align: center;
width: 25%;
opacity: 0.9;
}
.btn:hover {
opacity: 1;

}
.form-check-inline
{
  padding: 10px 20px;
}
.field-icon {
  float: right;
  margin-left: -20px; 
  margin-top: 20px;
  
  position: relative;
  z-index: 2;
}
   @media screen and (max-width: 760px){
  .he1{
    padding-right: 20%;
    padding-left: 10%;
  }
  .m1{
    padding-right: 5%;
    padding-left: 5%;
  }
}
</style>
<body style=" background: url('image/7.jpg');background-size: cover; background-color:#8db1dd45;">
  
  
  <div class="container">
    <form action="login_db.php"  method="POST" accept-charset="utf-8" id="captcha_form">
      
      <!-- Outer Row -->
      <div class="row justify-content-center tp">
        <div class="he1">
          <div class="" style="background:#497f9726; height: 350px;">
            <div class="card-header" style="background-color: #167c97;">
              <div class="">
                <h1 class="h4 text-white font-weight-bold">Login Here!</h1>
              </div>
            </div>
            <div class="card-body p-0">
             
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5 m1">
                    
                   
                      
                      <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field mx-2" type="text" placeholder="Employee Id" name="employee_id"  required>
                      </div>
                      
                      
                      <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="password" placeholder="Password" name="password" id="password-field"  required>
                       <br>
                      </div>
   
                        </div> <br>
                      <button type="submit" class="btn btn-sm" name="login_btn" id="login_btn">LOGIN</button>
                    
               
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
 </body>
</html>
