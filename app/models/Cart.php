<?php 
    class Cart { 
        public $listItems;

        function __construct() { 
            $this->listItems = [];
        }

        function add($item) {
            $this->listItems[] = $item;
        }

    }
?>
