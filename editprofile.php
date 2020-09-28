<?php
include 'lib/Session.php';
Session::init();
include 'lib/Database.php';
include 'helpers/Format.php';
// include 'classes/Product2.php';
// include 'classes/Cart.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});
$db = new Database();
$fm = new Format();
$pd = new Product();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();

?>
<?php
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>
<?php
$cmrId = Session::get("cmrId");
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $updateCmr = $cmr->customerUpdate($_POST, $cmrId);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha512-u7ppO4TLg4v6EY8yQ6T6d66inT0daGyTodAi6ycbw9+/AU8KMLAF7Z7YGKPMRA96v7t+c7O1s6YCTGkok6p9ZA==" crossorigin="anonymous" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .login-container {
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .login-form-1 {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-1 h3 {
            text-align: center;
            color: #333;
        }

        .login-form-2 {
            padding: 5%;
            background: #0062cc;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
        }

        .login-form-2 h3 {
            text-align: center;
            color: #fff;
        }

        .login-container form {
            padding: 10%;
        }

        .btnSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            border: none;
            cursor: pointer;
        }

        .login-form-1 .btnSubmit {
            font-weight: 600;
            color: #fff;
            background-color: #0062cc;
        }

        .login-form-2 .btnSubmit {
            font-weight: 600;
            color: #0062cc;
            background-color: #fff;
        }

        .login-form-2 .ForgetPwd {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .login-form-1 .ForgetPwd {
            color: #0062cc;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 login-form-1">
                <?php
                $id = Session::get("cmrId");
                $getData = $cmr->getCustomerData($id);
                if ($getData) {
                    while ($result = $getData->fetch_assoc()) {
                ?>
                        <div class="register_account">

                            <a href="index.php"><i class="fas fa-home">Home</i></a>
                            <?php if (isset($updateCmr)) {
                                echo "<tr><td colspan='3' style='text-align: center;''>" . $updateCmr . "</td></tr>";
                            } ?>
                           
                            <h3>Edit Akun</h3>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Anda *" value="<?php echo $result['name']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email Anda *" value="<?php echo $result['email']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Password Anda *" value="<?php echo $result['pass']; ?>" />
                                </div>
                                <input type="hidden" name="country" class="form-control" placeholder="Password Anda *" value="Indonesia" />
                                <div class="form-group">
                                    <textarea type="text" name="address" class="form-control" placeholder="Alamat lengkap Anda *" value="" rows="4"><?php echo $result['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" placeholder="Kota Anda *" value="<?php echo $result['city']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon / Hp Anda *" value="<?php echo $result['phone']; ?>" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="zip" class="form-control" placeholder="Kode Poss Anda *" value="<?php echo $result['zip']; ?>" />
                                </div>
                                <br>
                                <div class="form-group">
                                    <!-- <input type="submit" class="btnSubmit" value="Login" /> -->
                                    <button class="btnSubmit" name="register">Update Account</button>
                                </div>
                                <div class="form-group">
                                    <!-- <a href="login.php" class="ForgetPwd">Sudah terdaftar? Login Sekarang</a> -->
                                </div>
                            </form>
                    <?php
                    }
                } ?>
                        </div>
                        <div class="col-md-3">
                            <!-- <div style="margin-bottom: 100px;"></div>
                <h3>Belum terdaftar ?</h3>
                <div class="d-flex justify-content-center">
                <button class="btn  btn-primary" style="border-radius: 50px;">Daftar Sekarang</button>

                </div> -->
                        </div>
            </div>
        </div>
</body>

</html>