<?php
require_once ( 'AbstractClass.php');

class UniversitiesDB extends AbstractClass
{
/**
 * Returns the main query statement for the University table 
 * @return      the main query statement
 */    
    public function getStatement() {
        return 'SELECT * FROM Universities ';
    }
/**
 * Returns the primary key of the table
 * @return      the primary key
 */
    public function getPrimaryKey() {
        return "UniversityID";
    }
    
        public function getUniListOrderedByAlphabet()
    {
        $sql = $this->getStatement(). 'ORDER BY Name';
        $connection = $this->dataSource ->createConnection();
        $result = $this->dataSource->runQuery($connection, $sql, null);
        return $result;
    
    
    
    
    
    
}



}


?>