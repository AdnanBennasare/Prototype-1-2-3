<?php


include_once('../../Managers/GestionType.php');

    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionTypes = new GestionTypes();
    $id = $_GET['id'] ;
    $Type_Id = 'Type_Id';
    $gestionTypes->Supprimer($id, $Type_Id);
     
    header('Location: Types.php');
}
?>