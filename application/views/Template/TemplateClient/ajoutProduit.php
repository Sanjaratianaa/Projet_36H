<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter Produit</title>
</head>
<body>
<!-- <section class="vh-100" style="background-color: #0e1c36;"> -->
<section>
    <form action="<?php echo base_url();?>/ControllerClient/ajout" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Ajout Produit</span></h2>
            </div>

                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Nom produit</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <input type="text" class="form-control form-control-lg" id="nomproduit" name="nomproduit"/>
                            </div>
                        </div>

                    <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Categories</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <select class="categorie" name="categorie" class="form-control form-control-lg"> Categorie
                                    <?php for($i = 0; $i<count($listesCategories); $i++){?>
                                        <option value="<?php echo $listesCategories[$i]['idCategories']?>"><?php echo $listesCategories[$i]['nameCategories']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    <hr class="mx-n3">
                    
                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Prix</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <input type="number" class="form-control form-control-lg" placeholder="Inserer prix article" id="prix" name="prix"/>
                            </div>
                        </div>

                    <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Image</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <form action="<?php base_url(); ?>/ControllerClient/upload" method="post">
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="file[]" multiple/>
                                <div class="small text-muted mt-2">Importer photo/ Max file
                                size 50 MB
                                </div>
                                </form>
                            </div>
                        </div>

                    <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Description</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <textarea class="form-control" rows="3" placeholder="Description article" id="descri" name="descri"></textarea>
                            </div>
                        </div>

                    <hr class="mx-n3">
                
                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">
                                <h6 class="mb-0">Titre</h6>
                            </div>
                            <div class="col-md-9 pe-5">
                                <input type="text" class="form-control form-control-lg" id="titre" name="titre"/>
                            </div>
                        </div>

                    <hr class="mx-n3">

                <div class="px-5 py-4">
                <button type="submit" class="btn btn-primary btn-lg">Ajouter produit</button>
                </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
                
</body>
</html>