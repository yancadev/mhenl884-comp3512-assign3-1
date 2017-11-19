<?php

/**
 * This class helps with connecting the application to access the Employees and Contacts Database.
 */
class MessagesGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
}

/**
 * Returns the select statements to retrieve information about the employees.
 * @return      the query results
 */
 protected function getSelectStatement() {
 return "SELECT employ.EmployeeID, message.EmployeeID, message.MessageDate, message.Category, message.Content, 
        message.ContactID, contact.ContactID FROM Employees employ, EmployeeMessages message, Contacts contact
        WHERE employ.EmployeeID = message.EmployeeID AND message.ContactID=contact.ContactID AND employ.EmployeeID=:id";
}

/* Returns the following fields and primary key
* @return      The last name, first name, and employeeID
*/
 protected function getOrderFields() {
 return 'LastName, FirstName';
 }
 
 protected function getPrimaryKeyName() {
 return "EmployeeID";
 }
}

?>