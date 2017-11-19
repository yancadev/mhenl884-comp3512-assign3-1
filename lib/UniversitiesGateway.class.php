<?php

/**
 * This class helps with connecting the application to access the Universities Database.
 */
class UniversitiesGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the universities.
 * @return      the query results
 */
 protected function getSelectStatement() {
 return "select UniversityID, Name, Address, City, State, Zip, Longitude, Latitude, Website from Universities";
 }

/** 
* Returns the following fields and primary key
* @return      The name, and universityID
*/
 protected function getOrderFields() {
 return 'Name';
 }
 
 protected function getPrimaryKeyName() {
 return "UniversityId";
 }
}
?>