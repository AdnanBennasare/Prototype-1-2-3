<?php  

include_once('../Managers/GestionCategory.php');


// Trouver tous les employés depuis la base de données 
$gestionCategorys = new GestionCategory();


if (isset($_GET['id'])) {
  $Category = $gestionCategorys->RechercherParId($_GET['id']);
}


if (isset($_POST['modifier'])) {

  $id = $_POST['Category_id'];
  $Product_Name = $_POST['Category_Name'];

  $gestionCategorys->Modifier($id, $Product_Name);
  header('Location: ../index.php');
  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div>
                    <form method="post" action="">


                        <div >
                                <label>Category</label>
                                <input type="text" value="<?= $Category->getCategory() ?>" name="Category_Name"
                                    placeholder="Enter a Category">
                                    <input type="hidden" value="<?= $Category->getId() ?>" name="Category_id">
                        </div>


                        <div>
                            <button type="submit" name="modifier" >Modifie category</button>
                        </div>

                    </form>
                </div>
</body>
</html>