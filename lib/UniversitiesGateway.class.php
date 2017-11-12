<?php

class UniversitiesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities";
 }

 protected function getOrderFields() {
 return 'Name';
 }
 protected function getPrimaryKeyName() {
 return "UniversityId";
 }
}
?>