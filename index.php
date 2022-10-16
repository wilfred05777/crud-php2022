<!--https://www.youtube.com/watch?v=2eebptXfEvw -->

<?php



$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC ');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

//echo '<pre>';
//var_dump($products);
//echo '</pre>';

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
  <div class="container">
    <h1>Prducts CRUD</h1>

    <p>
        <a href="create.php" class="btn btn-success btn-sm">Create Product</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as  $i=> $product) : ?>
          <tr>
              <th scope="row"><?php echo $i+1; ?></th>
               <td></td>
               <td><?php echo $product['title'] ?></td>
               <td><?php echo $product['price'] ?></td>
               <td><?php echo $product['create_date'] ?></td>
               <td>

                   <button type="button" class="btn btn-sm btn-outline-primary" >Edit</button>
                   <button type="button" class="btn btn-sm btn-outline-danger"  >Delete</button>
               </td>

           </tr>

        <?php endforeach;  ?>

<!--        --><?php //foreach ( $products as $product) { ?>
<!--            <tr>-->
<!--                <th scope="row">1</th>-->
<!--                <td>Mark</td>-->
<!--                <td>Otto</td>-->
<!--                <td>@mdo</td>-->
<!--            </tr>-->
<!--        --><?php //} ?>


        </tbody>
    </table>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>

