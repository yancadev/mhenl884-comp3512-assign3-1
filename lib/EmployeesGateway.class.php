<?php
/**
 * This class helps with connecting the application to access the Employees Database.
 */
class EmployeesGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the employees.
 * @return      the query results
 */
 protected function getSelectStatement()
 {
 return "SELECT EmployeeID, FirstName, LastName, Address, City,
         Region, Country, Postal, Email FROM Employees ";
 }

/** 
* Returns the following fields and primary key
* @return      last name, first name and employeeID
*/
 protected function getOrderFields() {
 return 'LastName, FirstName';
 }
 
 protected function getPrimaryKeyName() {
 return "EmployeeID";
 }
}

?>