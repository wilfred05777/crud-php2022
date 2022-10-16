<?php



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prducts CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="app.css">
</head>
<body>
<h1>Prducts CRUD</h1>
<div class="contianer">


<form>
    <div class="mb-3">
        <label >Product Image</label>
        <input type="file" class="form-control" >

    </div>
    <div class="mb-3">
        <label >Product Title</label>
        <input type="text" class="form-control" >

    </div>
    <div class="mb-3">
        <label >Product Description</label>
        <textarea  class="form-control" ></textarea>

    </div>
    <div class="mb-3">
        <label >Product Price</label>
        <input type="number" step=".01" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

