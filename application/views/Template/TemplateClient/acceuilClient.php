<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- Offer Start -->
    <?php if(isset($resultats)) { ?>
        <div class="container-fluid offer pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Les resultats</span></h2>
            </div>
            <div class="row px-xl-5">
                <?php for($i=0; $i<count($resultats); $i++){ ?>
                    <div class="col-md-4 pb-4">
                        <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                            <img src="<?php echo base_url(); ?>/assets/img/offer-2.png" alt="">
                            <div class="position-relative" style="z-index: 1;">
                                <h5 class="text-uppercase text-primary mb-3"><?php echo $resultats[$i]['titre']; ?></h5>
                                <h1 class="mb-4 font-weight-semi-bold"><?php echo $resultats[$i]['nameProduct']; ?></h1>
                                <!-- <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a> -->
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Toutes les produits disponibles</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php for($i = 0; $i<count($produitDispo); $i++){ ?>

                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100 " src="<?php echo base_url(); ?>/assets/img/<?php echo $produitDispo[$i]['photo1'];?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?php echo $produitDispo[$i]['titre']; ?> </h6>
                            <div class="d-flex justify-content-center">
                                <h6>Price : <?php echo $produitDispo[$i]['price']; ?> Ariary</h6>
                            </div>
                            <p><?php if(isset($produitDispo[$i]['difference'])){ ?>Difference de prix: <?php echo $produitDispo[$i]['difference'];?>%<?php } ?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                            <a href="<?php echo site_url("ControllerClient/viewDetails/".$produitDispo[$i]['idProducts']);?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <!-- <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a> -->
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url(); ?>/assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
</body>

</html>