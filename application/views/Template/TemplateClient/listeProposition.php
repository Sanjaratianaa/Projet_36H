<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Les propositions</span></h2>
            </div>
                <?php for($i = 0; $i<count($listeProposition); $i++){ ?>

                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="<?php echo base_url(); ?>/assets/img/product-8.jpg" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $listeProposition[$i]['titre']; ?> </h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$<?php echo $listeProposition[$i]['price']; ?></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="<?php echo site_url("ControllerClient/Acceptation/".$listeProposition[$i]['IdProposition']);?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Accepter</a>
                                <a href="<?php echo site_url("ControllerClient/Refusation/".$listeProposition[$i]['IdProposition']);?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Refuser</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url(); ?>/assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
</body>

</html>