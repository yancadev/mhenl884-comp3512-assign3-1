<?php
class DBHelper
{
    public static function createConnection(){
        $pdo = new pdo ('mysql:host=localhost; dbname=book','root', "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    public static function runQuery($pdo, $sql, $parameter=array()){
    try{   
        $statement = null;
        if (count($parameter)>0){
            $statement = $pdo-> prepare($sql);
            $statement -> execute($parameter);
            $statement->bindValue(_,_);
        }
       else {
            $statement = $pdo-> prepare($sql);
       }
       return $statement;
    }
       catch (PDOException	$e)	
       {
			die($e->getMessage());
		}
    
    }
    
}


?>