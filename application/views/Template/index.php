<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/bootstrap 5/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <title>Bienvenue</title>
</head>
<body>
    <div class="container col-xx8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <!-- <p>sary ngeza kely</p> -->
                <img src="<?php echo base_url(); ?>/assets/img/carousel-1.jpg" class="d-block mx-lg-auto img-fluid" alt="photo" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <center><h1 class="display-5 fw-bold">E! Shopper.</h1>
                <p>You can exchange safely (not now!)!</p></center>

                <div class="d-grid gap-2 d-md-flex justify-content-center">
                    <form method="post" action="ControllerAll/affichage">
                        <input type="submit" name="status" value="Client" id="Client" class="btn btn-default btn-lg px-4">
                        <input type="submit" name="status" value="Admin" id="Admin" class="btn btn-default btn-lg px-4">
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>