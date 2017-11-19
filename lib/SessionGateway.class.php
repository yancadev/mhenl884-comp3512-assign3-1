<?php
/**
 * This class helps with connecting the application to access the users Database to handle login session.
 */
class SessionGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the users.
 * @return      the query results
 */
 protected function getSelectStatement() {
 return "SELECT UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email FROM Users";
 }

/** 
* Returns the following fields and primary key
* @return      The user name, and userID
*/
 protected function getOrderFields() {
 return 'UserName, UserID';
 }
 
 protected function getPrimaryKeyName() {
 return "UserID";
 }

}

?>