<?php
require_once "../../Controllers/DBController.php";
require_once "../../Controllers/KeywordController.php";
require_once "../../Controllers/CommentController.php";
require_once "../../Controllers/ProductController.php";

class rateController{
    protected $db;
    protected $KeywordController;
    protected $CommentController;

    public function getProductRate($id){
        $this->db = new DBController;
        
        if($this->db->openConnection()){
            
            $count = 0 ;
            $CommentController = new CommentController;
            $comments = $CommentController->getAllComments($id);
            $KeywordController = new KeywordController;
            $keywords = $KeywordController->getAllKeyword();
            foreach($comments as $comment){
                $str =strtolower($comment["content"]);
                $arr = explode(" ",$str);
                foreach ($keywords as $keyword){
                   
                    for($i = 0 ; $i <= count($arr) ; $i++ ){
                        
                        if ($arr[$i] === $keyword["word"]) {
                            # code...
                            $count++;
                            break;

                        }else{
                            continue;
                        }
                    }
                    
                }

            }
            if(count($comments)!=0){
            $rate = ($count / count($comments))*100 ;
            $this->updateRate($rate ,$id);
            return true ;
            }else{
                $this->updateRate(0 ,$id);
                return true ;

            }

        }else{
            echo "Error in Database Connection";
            return false;
        }
            
            

    }
   private function updateRate($rate ,$id){
    $this->db = new DBController;
    if($this->db->openConnection()){
        $query = "update products SET rate = '$rate' WHERE products.id = $id ;";
        return $this->db->ubdate($query);
    }else{
        return false;
    }
   }
    
}
?>