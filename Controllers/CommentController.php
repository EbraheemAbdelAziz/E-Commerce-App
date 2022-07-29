<?php
require_once "../../Controllers/DBController.php";
require_once "../../Models/comment.php";
class CommentController{
    protected $db ;
    public function getComments($id){
        $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select  comments.id ,comments.content ,users.firstName ,users.lastName  from users,comments where users.id = comments.userId and comments.productId=$id";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getAllComments($id){
      $this->db=new DBController;
       if($this->db->openConnection())
       {
          $query="select  content   from comments where productId=$id";
          return $this->db->select($query);
       }
       else
       {
          echo "Error in Database Connection";
          return false; 
       }
  }
    public function addComment(comment $comment )
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $Cname =$comment->getContent() ;
            $CproductId = $comment->getProductId();
            $CuserId = $comment->getUserId();

            $query="insert into comments values ('','$Cname','$CuserId',$CproductId)";
            return $this->db->insert($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }


}
?>