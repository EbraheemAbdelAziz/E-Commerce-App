<?php
    class keyword{
        private $id;
        private $word;
        
	function getId() {
		return $this->id;
	}

	function setId($id): self {
		$this->id = $id;
		return $this;
	}

	function getWord() {
		return $this->word;
	}

	function setWord($word): self {
		$this->word = $word;
		return $this;
	}
}
?>