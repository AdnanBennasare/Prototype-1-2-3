<?php

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}

require_once(__ROOT__ . '/Entities/Type.php');


class GestionTypes {

    private $Connection = Null;

    private function getConnection(){
        if(is_null($this->Connection)){
            $this->Connection = mysqli_connect('localhost', 'root', '', 'aaffiliate');
            // Vérifier l'ouverture de la connexion avec la base de données
            if(!$this->Connection){
                $message =  'Erreur de connexion: ' . mysqli_connect_error(); 
                throw new Exception($message); 
            }
        }
        
        return $this->Connection;
        
    }

    

    public function AjouterTypeToCategory($type){

        $Type_Name = $type->getType();
        $Category_id = $type->getCategory();

        // requête SQL
        $sql = "INSERT INTO type(Type_Name, Category_ID) 
                                VALUES('$Type_Name', '$Category_id')";

        mysqli_query($this->getConnection(), $sql);
    }






    public function Modifier($id,$Type_name)
    {
        $sql = "UPDATE type SET Type_Name='$Type_name'
        WHERE Type_Id = $id";

        mysqli_query($this->getConnection(), $sql);

        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous(){
        $sql = 'SELECT Type_Id, Type_Name, Category_ID FROM type';
        $query = mysqli_query($this->getConnection() ,$sql);
        $types_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $types = array();
        foreach ($types_data as $type_data) {
            $type = new Type();
            $type->setId($type_data['Type_Id']);
            $type->setType($type_data['Type_Name']);
            $type->setCategory($type_data['Category_ID']);

            array_push($types, $type);
        }
        return $types;
    }

   


    public function RechercherParId($id){
        $sql = "SELECT * FROM type WHERE Type_Id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $types_data = mysqli_fetch_assoc($result);
        $type = new Type();
        $type->setId($types_data['Type_Id']);
        $type->setType($types_data['Type_Name']);
        
        return $type;
    }

    
    public function Supprimer($id, $Column){
        $sql = "DELETE FROM type WHERE $Column= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }


}


?>