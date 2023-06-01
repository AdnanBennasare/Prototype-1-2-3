
<?php  
include_once('../Managers/GestionCategory.php');


// Trouver tous les employés depuis la base de données 
$gestionCategorys = new GestionCategory();

  if (!empty($_POST['Category_Name'])) {
	    $category = new Category();

        $category->setCategory($_POST['Category_Name']);

        $gestionCategorys->Ajouter($category);
        // Redirect to the index.php page
        header("Location: ../index.php");



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

<div class="card-body">
                    <form method="post" action="">


                        <div class="row">
                                <label>Category</label>
                                <input type="text" class="form-control" name="Category_Name"
                                    placeholder="Enter a Category">
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success w-75 mt-5">ADD Category</button>
                        </div>

                    </form>
                </div>

    
</body>
</html>