<?php
/**
 * This class helps with connecting the application to access the Employees Database.
 */
class BooksVisitGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the total visits.
 * @return      the query results
 */
 protected function getSelectStatement()
 {
 return "SELECT VisitID, BookID, DateViewed, IpAddress, CountryCode
 FROM BookVisits ";
 }

/** 
* Returns the following fields and primary key
* @return      last name, first name and employeeID
*/
 protected function getOrderFields() {
 return 'VisitID, BookID';
 }
 
 protected function getPrimaryKeyName() {
 return "VisitID";
 }
}
?>