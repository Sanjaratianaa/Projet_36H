<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/login.css">

        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login</h2>
                <div class="card my-5">

                <form class="card-body cardbody-color p-lg-5" action="login" method="post">

                    <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="User Name">
                    </div>
                    <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>

                    <input type="hidden" class="form-control" name="status" id="status" value="<?php echo $_SESSION['status']; ?>">

                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button></div>
                    <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                    Registered? <a href="<?php echo base_url();?>/Inscription/ins" class="text-dark fw-bold"> Create an
                        Account</a>
                    </div>
                </form>
                </div>

            </div>
            </div>
        </div>
    </body>
</html>