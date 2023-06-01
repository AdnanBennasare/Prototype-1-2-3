<?php


define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/Entities/Category.php');


 
class GestionCategory {

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



    public function Ajouter($category){

        $Category_Name = $category->getCategory();
        // requête SQL
        $sql = "INSERT INTO category(Category_Name) 
                                VALUES('$Category_Name')";

        mysqli_query($this->getConnection(), $sql);
    }





    public function Supprimer($id){
        $sql = "DELETE FROM category WHERE Category_ID = '$id'";
        mysqli_query($this->getConnection(), $sql);
    }

    public function Modifier($id,$Category_Name)
    {
        $sql = "UPDATE category SET Category_Name='$Category_Name'
        WHERE Category_ID = $id";

        mysqli_query($this->getConnection(), $sql);

        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous(){
        $sql = 'SELECT Category_ID, Category_Name FROM category';
        $query = mysqli_query($this->getConnection() ,$sql);
        $categorys_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $categorys = array();
        foreach ($categorys_data as $category_data) {
            $category = new Category();
            $category->setId($category_data['Category_ID']);
            $category->setCategory($category_data['Category_Name']);
            array_push($categorys, $category);
        }
        return $categorys;
    }

   


    public function RechercherParId($id){
        $sql = "SELECT * FROM category WHERE Category_ID= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $categorys_data = mysqli_fetch_assoc($result);
        $category = new Category();
        $category->setId($categorys_data['Category_ID']);
        $category->setCategory($categorys_data['Category_Name']);
        
        return $category;
    }

    
}




?>