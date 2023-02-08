<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
       
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/login.css">



        <title>Sign Up</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login</h2>
                <div class="card my-5">

                <form class="card-body cardbody-color p-lg-5" action="<?php echo base_url();?>Inscription/inscr" method="post">
                    <div class="mb-3">
                    <input type="text" class="form-control" name="name"  aria-describedby="emailHelp"
                        placeholder="User Name">
                    </div>
                    <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="User Email">
                    </div>
                    <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Sign Up</button></div>
                </form>
                </div>
                <a href="../ControllerAll/affichage"><< retour</a>
            </div>
            </div>
        </div>
    </body>
</html>