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
        <form method="post" action="../updateCategory">
        <!-- Name input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="nomCategorie">Nom du Categorie</label>
            <input type="text" id="nomCategorie" class="form-control" name="nomCategorie" />
            <input type="hidden" id="nomCategorie" class="form-control" name="idCategorie" value="<?php echo $namePerson;?>"/>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Modifier</button>
        </form>
    </div>
</body>