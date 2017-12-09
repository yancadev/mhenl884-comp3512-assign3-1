
<?php

/**
 * This class helps with connecting the application to access the Universities Database.
 */
class AnalyticsGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the universities.
 * @return      the query results
 */
 protected function getSelectStatement() {
 //return "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ORDER BY LastName, FirstName ASC";
 return "Select distinct VisitID, CountryName, bv.CountryCode from BookVisits AS bv JOIN Countries on Countries.CountryCode = bv.CountryCode group by  bv.CountryCode LIMIT 15";

 }

/** 
* Returns the following fields and primary key
* @return      The name, and universityID
*/
 protected function getOrderFields() {
 return 'Name';
 }
 
 protected function getPrimaryKeyName() {
 return 'VisitID';
 }
 
}

?>




