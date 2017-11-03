<?php

class UniversitiesGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "SELECT UniversityId, Name, Address, City,
 State, Zip, Website, Latitude, Longitude FROM Universities ";
 }

 protected function getOrderFields() {
 return 'Name';
 }
 protected function getPrimaryKeyName() {
 return "UniversityId";
 }
}

?>