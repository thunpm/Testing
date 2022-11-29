<?php 
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
class DB { 
	private static $instance = NULL; 

	public static function getInstance() { 
		if (!isset(self::$instance)) { 
		    try { 
                self::$instance = new PDO('mysql:host=localhost;dbname=shophai', 'root', '12345'); 
                self::$instance->exec("SET NAMES 'utf8'"); 
			} catch (PDOException $ex) { 
				die($ex->getMessage()); 
			} 
		} 
		return self::$instance; 
	} 
}
