<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="get" action="../../Proposition">
        <div class="container">
        <div class="form-outline mb-4">
                <label class="form-label" for="ProduitPropose">Le produit Propose</label>
                <input type="text" id="ProduitPropose" class="form-control" name="ProduitPropose" value="<?php echo $ProduitProposer['idProducts']; ?>" placeholder="<?php echo $ProduitProposer['nameProduct']; ?>"/>
                <input type="hidden" id="idProprio" value="<?php echo $ProduitProposer['idPerson']; ?>" name="idProprio">

                <br>

                <label class="form-label" for="monProduit">Mon Produit</label>
                <select class="monProduit form-control" name="monProduit"> Categorie
                    <?php for($i = 0; $i<count($ProduitAprendre); $i++){?>
                        <option value="<?php echo $ProduitAprendre[$i]['idProducts']?>"><?php echo $ProduitAprendre[$i]['nameProduct']?></option>
                    <?php } ?>
                </select>

                <br>
                <input type="submit" id="submit" class="form-control" name="submit" value="Submit"/>

            </div>
        </div>
    </form>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url(); ?>assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>