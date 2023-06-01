<?php

include_once('../../Prototype-2/my admin/Managers/GestionType.php');
include_once('../Managers/GestionCategory.php');



if(isset($_GET['id'])){
    $gestionCategorys = new GestionCategory();
    $gestionTypes = new GestionTypes();

    $Category_ID = 'Category_ID';
    $id = $_GET['id'] ;
    $gestionTypes->Supprimer($id, $Category_ID);
    $gestionCategorys->Supprimer($id);
    header('Location: ../index.php');
}


?>