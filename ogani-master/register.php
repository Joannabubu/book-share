<!DOCTYPE html>
<?php
$name = "";
$account = "";
$password = "";
$method = "newregister";

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">建立帳號
                                </h1>
                            </div>
                            <form class="user" action="dblinkback.php" method="post">
                                <input type=hidden name="method" value="<?php echo $method ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name" value="<?php echo $name ?>" placeholder="姓名" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="account" maxlength="10" value="<?php echo $account ?>" placeholder="手機號碼" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" value="<?php echo $password ?>" placeholder="密碼" required>
                                    </div>
                                </div>

                                <input type="submit" value="註冊" name = "submit" class="btn btn-primary btn-user btn-block" id="demo0">
                                <br><br>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">忘記密碼</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login1.php">已有帳號!我要登入!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>