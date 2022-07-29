<?php
require_once "../../Models/category.php";
require_once '../../Controllers/DBController.php';



class CategoryController{
    protected $db;
    public function getCategories(){

         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from category";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }}
    public function addCategory( category $category)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
             $Cname = $category->getName();
            $query="insert into category values ('','$Cname')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function deleteCategory($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from category where id = $id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}



?>