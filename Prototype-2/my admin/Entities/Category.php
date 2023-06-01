<?php

class Category{
    private $Id;
    private $Category;
    

    public function getId() {
        return $this->Id;
    }
    public function setId($id) {
        $this->Id = $id;
    }

    public function getCategory() {
        return $this->Category;
    }
    public function setCategory($category) {
        $this->Category = $category;
    }
}
     
?>