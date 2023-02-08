<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
            </div>
            <div class="col-lg-7 col-6 text-left">
                <form class="row row-cols-lg-auto g-3 align-items-center" method="get" action="resultatsSearch">
                    <div class="input-group col-12">
                        <input type="text" class="form-control" name="indice" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        
                        <select class="categorie" name="categorie"> Categorie
                            <?php for($i = 0; $i<count($listesCategories); $i++){?>
                                <option value="<?php echo $listesCategories[$i]['idCategories']?>"><?php echo $listesCategories[$i]['nameCategories']?></option>
                            <?php } ?>
                        </select>

                        <input type="submit" class="form-control" value="Submit">
                    </div>

                </form>
            </div> 
            <!-- <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span>
                </a>
            </div> -->
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"> -->
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?php echo site_url('ControllerClient/affichage'); ?>" class="nav-item nav-link">Home</a>
                            <a href="<?php echo site_url('ControllerClient/pourProduit'); ?>" class="nav-item nav-link">Ajouter un Produit</a>
                            <a href="<?php echo site_url('ControllerClient/showProposition'); ?>" class="nav-item nav-link">Liste des propositions</a>
                            <a href="<?php echo site_url('ControllerClient/listeProduit'); ?>" class="nav-item nav-link">Liste de mes produits</a>
                            <a href="<?php echo site_url('ControllerAll/deconnexion'); ?>" class="nav-item nav-link">Deconnexion</a>
                        </div>
                    <!-- </div> -->
                </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

</body>
</html>