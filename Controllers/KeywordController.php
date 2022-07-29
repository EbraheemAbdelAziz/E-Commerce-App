<?php
require_once "../../Models/keyword.php";
require_once '../../Controllers/DBController.php';



class KeywordController{
    protected $db;
    public function getKeyword(){

         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select * from keywords";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }}
         public function getAllKeyword(){

            $this->db=new DBController;
            if($this->db->openConnection())
            {
               $query="select word from keywords";
               return $this->db->select($query);
            }
            else
            {
               echo "Error in Database Connection";
               return false; 
            }}
    public function addKeyword( keyword $keyword)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $kname = $keyword->getWord();
            $query="insert into keywords values ('','$kname')";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function deleteKeyword($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from keywords where id = $id";
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