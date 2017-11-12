<?php

class LoginGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email from Users";
 }

 protected function getOrderFields() {
 return 'UserName, UserID';
 }
 protected function getPrimaryKeyName() {
 return "UserID";
 }
 
 public function findByUserName($user){
 $sql = $this->getSelectStatement() . ' WHERE ' . "UserName='" . "$user'";

 $statement = DatabaseHelper::runQuery($this->connection, $sql,null);
 return $statement->fetch();
} 
public function findByUserID($user){
 $sql = $this->getSelectStatement() . ' WHERE ' . "UserID='" . "$user'";

 $statement = DatabaseHelper::runQuery($this->connection, $sql,null);
 return $statement->fetch();
}
}

?>