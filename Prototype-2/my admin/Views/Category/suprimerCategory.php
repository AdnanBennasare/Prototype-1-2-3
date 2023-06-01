<?php



include_once('../../Managers/GestionCategory.php');
include_once('../../Managers/GestionType.php');



// Trouver tous les employés depuis la base de données 


if(isset($_GET['id'])){
    $gestionCategorys = new GestionCategory();
    $gestionTypes = new GestionTypes();

    $Category_ID = 'Category_ID';
    $id = $_GET['id'] ;
    $gestionTypes->Supprimer($id, $Category_ID);
    $gestionCategorys->Supprimer($id);
    header('Location: index.php');
}

?>