<?php

include_once('Managers/GestionCategory.php');



$gestionCategorys = new GestionCategory();
$Categorys = $gestionCategorys->RechercherTous();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Ui/Style/style.css">
    <title>Document</title>
</head>

<body>

<a href="Ui/ajouter.php">Ajouter un category</a>


    <div>
        <table>
            <thead>
                <tr>
                    <th>Category id</th>
                    <th>Category name</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($Categorys as $Category) {
                    ?>

                    <tr>

                        <td>
                            <?= $Category->getId() ?>
                        </td>
                        <td>
                            <?= $Category->getCategory() ?>
                        </td>
                        <td>
                            <a href="Ui/editer.php?id=<?php echo $Category->getId() ?>">Éditer</a>
                            <a href="Ui/suprimer.php?id=<?php echo $Category->getId() ?>"
                                >Supprime</a>                            

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>Category id</th>
                    <th>Category name</th>
                    <th>Actions</th>


                </tr>
            </tfoot>
        </table>
    </div>


</body>

</html>