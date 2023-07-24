<?php
session_start();
require_once('php/CreateDb.php');
require_once('./php/component.php');

//create instance of the class "Createdb class"
$database = new CreateDb(dbname:"Productdb", tablename:"producttb");
if(isset($_POST['add'])){
    
    if(isset($_SESSION['cart'])){
        print_r($_SESSION['cart']);
    } else{
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    


</head>
<body>
    <div class="container">
         <div class="row text-center py-5">
           
            <?php

                        
                $result = $database->getData();
                while($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                    
                }
                
               

            ?>
        
           
        </div>
    </div>
    


    <script src="https://kit.fontawesome.com/d008619a9c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>