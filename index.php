<?php
    include 'check_login.php';
    login();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JISDA || Jamiah islam syaikh daut al-fathani</title>
    <link rel="icon" href="icon/favicon.png" sizes="16x16" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  </head>
    <body style="background:url('background/DSC_0045.JPG')no-repeat;
                background-size:100%;
                height: 140px;
                display:block;
                padding:0 !important;
                margin:0;
                opacity:0.8;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;"> 
        <br><br><br>
         <div class="col-md-1">
            
        </div>
        <div class="col-md-9">
            <br><br><br><br><br>
            <div class='col-md-4'></div>
            <div class='col-md-4'>
                <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header">
                        <h3>IDARAH LogIn</h3>
                    </div>
                        <form role="form" method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" class="form-control" placeholder="Username" name="txtUsername" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" placeholder="Password" name="txtPassword" required >
                            </div>
                        </div>
                        <a href="index.php">
               
                        </a>
                        <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> LogIn</button>
                        </form>
                </div>
            </div>
            </div>
        
        <div class="col-md-1">
            
        </div>
           
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
