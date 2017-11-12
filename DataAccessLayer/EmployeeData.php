<?php
require_once ( 'AbstractClass.php');

class EmployeesDB extends AbstractClass
{
/**
 * Returns the main query statement for the University table 
 * @return      the main query statement
 */    
    public function getStatement() {
        return 'SELECT * FROM Employees ';
    }
/**
 * Returns the primary key of the table
 * @return      the primary key
 */
    public function getPrimaryKey() {
        return "EmployeeID";
    }
    
        public function getEmpListOrderedByAlphabet(){
            
        $sql = $this->getStatement(). 'ORDER BY Name';
        $connection = $this->dataSource ->createConnection();
        $result = $this->dataSource->runQuery($connection, $sql, null);
        return $result;
    
    }

    public function getSingleEmployeeDetail($id){

        $sql = $this->getStatement(). ' WHERE ' . $this -> getPrimaryKey() .' = ' . $id;
        $connection = $this->dataSource ->createConnection();
        $result = $this->dataSource->runQuery($connection, $sql, null);
        return $result;
    
    }



?>