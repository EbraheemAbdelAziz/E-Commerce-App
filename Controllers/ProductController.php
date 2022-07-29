<?php 

require_once '../../Models/product.php';
require_once '../../Controllers/DBController.php';
class ProductController
{
    protected $db;

    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    
    
    public function addProduct(Product $product)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $pname =$product->getName() ;
            $pdesc =$product->getDescription() ;
            $pprice=$product->getPrice() ;
            $pcatid=$product->getCategoryid() ;
            $pimg =$product->getImage() ;
            $query="insert into products values ('','$pname','$pdesc',0,$pcatid,$pprice,'$pimg')";
            return $this->db->insert($query);

         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getAllProducts()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select products.id,products.name,products.rate,price,category.name as 'category' from products,category where products.categoryid=category.id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function deleteProduct( $id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="delete from products where id = $id";
            return $this->db->delete($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }

    public function getAllProductsWithImages()
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select products.id,products.name,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    
    
    public function getCategoryProducts($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select products.id,products.name,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id and category.id=$id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getProductDetails($id)
    {
         $this->db=new DBController;
         if($this->db->openConnection())
         {
            $query="select products.id,products.name,products.information,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id and products.id=$id;";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function searchProduct($name){
       $this->db=new DBController;
      if($this->db->openConnection())
      {
         $query="select products.id,products.name,products.rate,price,category.name as 'category',image from products,category where products.categoryId=category.id and products.name like '%$name%' ;";
         return $this->db->select($query);
      }
      else
      {
         echo "Error in Database Connection";
         return false; 
      }
    }


    
}

?>