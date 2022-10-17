<?php



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//?image=&title=&description=&price=

//echo '<pre>';
//    var_dump($_GET);
//echo '</pre>';

//echo '<pre>';
//    var_dump($_POST);
//echo '</pre>';

//echo '<pre>';
//    var_dump($_SERVER);
//echo '</pre>';
//exit;

//echo $_SERVER['REQUEST_METHOD']."<br>";

$errors = [];

//// purpose is to get the input when other inputs are wrong and start over again it will still be there e.g input values: $price, $description, $title (in the form management)
$title = '';
$price = '';
$description = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

//    $errors = [];


        /// check if the input title is an empty it will show a validation
        if(!$title) {
            $errors[] = "Product title is required";
        }
        if(!$price){
            $errors[] = "Price is required";
        }

    //// this is an unsafe approach
    //$pdo->exec("
    //    INSERT INTO products (title, image, description, price, create_date)
    //    VALUES ('$title', '', '$description', $price, '$date')
    //");


    /// note:
    ///  1:
    ///  name parameter feature in pdo e.g :title, :image, :description, :price, :date
    ///

        //// if there is no error save in the database
    if(empty($errors)){
        $statement = $pdo->prepare("
            INSERT INTO products (title, image, description, price, create_date)
            VALUES (:title, :image, :description, :price, :date)
        ");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', '');
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
    }
}
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
<h1>Create new Product</h1>
<div class="contianer">

    <?php  if(!empty($errors)):  ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <div>
                    <?php echo $error ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

<form action="" method="post">
    <div class="mb-3">
        <label >Product Image</label>
        <input type="file" name="image" class="form-control" >

    </div>
    <div class="mb-3">
        <label >Product Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title?>">
    </div>
    <div class="mb-3">
        <label >Product Description</label><textarea name="description" class="form-control"><?php echo $description; ?></textarea>
    </div>
    <div class="mb-3">
        <label >Product Price</label>
        <input type="number" name="price" step=".01" class="form-control" value="<?php echo $price?> ">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

