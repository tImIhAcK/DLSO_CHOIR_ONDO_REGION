<?php


require_once 'database.class.php';

/**
 * 
 */
class Controller extends Database
{

	// Function to query the database
	public static function query($query, $params = array()){
		$statement = parent::connect()->prepare($query);
		$statement->execute($params);

		// Select from and Insert to the Database
		if (explode(' ', $query)[0] == 'SELECT') { 
			$data = $statement->fetchAll();

			try{
				return $data;
			}catch(Exception $e){
				return $e->getMessage()."Couldn't fetch data form the database! ";
			}
		}
	
	}
}
