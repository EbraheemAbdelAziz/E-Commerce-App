<?php
class comment{
    private $id;
    private $content;
    private $userId;
    private $productId;
	
	function getId() {
		return $this->id;
	}

	function setId($id): self {
		$this->id = $id;
		return $this;
	}

	function getContent() {
		return $this->content;
	}
	
	function setContent($content): self {
		$this->content = $content;
		return $this;
	}
	
	function getUserId() {
		return $this->userId;
	}
	
	
	function setUserId($userId): self {
		$this->userId = $userId;
		return $this;
	}

	function getProductId() {
		return $this->productId;
	}

	function setProductId($productId): self {
		$this->productId = $productId;
		return $this;
	}
}


?>