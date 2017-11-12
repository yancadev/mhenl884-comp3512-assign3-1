<?php

class SessionGateway extends TableDataGateway {
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

}

?>