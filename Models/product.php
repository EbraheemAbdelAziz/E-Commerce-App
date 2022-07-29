<?php
class product {
	private $id;
    private $name;
    private $description;
    private $price;
    private $rate;
    private $image;
    private $categoryid;

	/**
	 * 
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param mixed $id 
	 * @return product
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getName() {
		return $this->name;
	}
	
	/**
	 * 
	 * @param mixed $name 
	 * @return product
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getDescription() {
		return $this->description;
	}
	
	/**
	 * 
	 * @param mixed $description 
	 * @return product
	 */
	function setDescription($description): self {
		$this->description = $description;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getPrice() {
		return $this->price;
	}
	
	/**
	 * 
	 * @param mixed $price 
	 * @return product
	 */
	function setPrice($price): self {
		$this->price = $price;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getRate() {
		return $this->rate;
	}
	
	/**
	 * 
	 * @param mixed $rate 
	 * @return product
	 */
	function setRate($rate): self {
		$this->rate = $rate;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getImage() {
		return $this->image;
	}
	
	/**
	 * 
	 * @param mixed $image 
	 * @return product
	 */
	function setImage($image): self {
		$this->image = $image;
		return $this;
	}
	/**
	 * 
	 * @return mixed
	 */
	function getCategoryid() {
		return $this->categoryid;
	}
	
	/**
	 * 
	 * @param mixed $categoryid 
	 * @return product
	 */
	function setCategoryid($categoryid): self {
		$this->categoryid = $categoryid;
		return $this;
	}
}

?>