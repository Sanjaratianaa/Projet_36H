<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Categories Start -->
    <div class="container-fluid">
        <div class="row px-xl-5 pb-3">
            <?php for($i = 0; $i<count($listesCategories); $i++){?>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">15 Products</p>
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="<?php echo base_url(); ?>/assets/img/cat-2.jpg" alt="">
                        </a>
                        <center><h5 class="font-weight-semi-bold m-0"><?php echo $listesCategories[$i]['nameCategories']?></h5><a href="<?php echo site_url('ControllerAdmin/redirectionCategorie/'.$listesCategories[$i]['idCategories']); ?>">Update</a></center>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Categories End -->

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