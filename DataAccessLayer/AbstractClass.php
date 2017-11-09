<?php

abstract class AbstractClassDef
{

    /*abstract protected function getStatement(); //stores the main statement of the query for a specific class
    abstract protected function getPrimaryKey();//Stores the primary key of the table
    
    protected $dataSource; //The pdo object
    
    
    /* This is the constructor of the abstract class*/
     function __construct($dataSource) 
     {
        $this->dataSource = $dataSource;
     }
     
     /*This method is used to return all values in the table using the getStatement()*/
     function getAll()
     {
         return $this->getStatement();
     }
    
}

?>