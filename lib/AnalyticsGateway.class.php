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
 return "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ORDER BY LastName, FirstName ASC";
 }

/** 
* Returns the following fields and primary key
* @return      The name, and universityID
*/
 protected function getOrderFields() {
 return 'Name';
 }
 
 protected function getPrimaryKeyName() {
 return "VisitID";
 }
 
/*public function retrieveVisits(){
 return $this->runDifferentSelect("Select VisitID, CountryName from BookVisits JOIN Countries on Countries.CountryCode = BookVisits.CountryCode LIMIT 15");
}

public function retrieveTopTenBooks(){
 return $this->runDifferentSelect("SELECT ISBN10, ISBN13, Title,  `BookID` , COUNT( * ) AS  `adopted` FROM AdoptionBooks JOIN Books USING ( BookID ) GROUP BY  `BookID` ORDER BY adopted DESC LIMIT 10");
}

public function retrieveTopUniversites(){
 return $this->runDifferentSelect("SELECT  `CountryName` , COUNT( * )  AS  `adopted` FROM BookVisits JOIN Countries  USING (CountryCode) GROUP BY  `CountryCode` ORDER BY adopted DESC LIMIT 15");
}

public function retrieveVisitCount(){
 return $this->runDifferentSelect("SELECT COUNT( * ) AS  `visits`, COUNT( DISTINCT  `CountryCode` ) AS  `uniqueCountries` FROM BookVisits WHERE  `DateViewed` >  '06/01/2017' AND  `DateViewed` <  '06/31/2017'");
}

public function retrieveMessages(){
 return $this->runDifferentSelect("SELECT COUNT( * ) AS  `messagescount` FROM EmployeeMessages WHERE  `MessageDate` >  '2017-06-01*' AND  `MessageDate` <  '2017-06-31*'");
}

public function retrieveToDo(){
 return $this->runDifferentSelect("SELECT COUNT( * ) AS  `todocount` FROM EmployeeToDo WHERE  `DateBy` >  '2017-06-01*' AND  `DateBy` <  '2017-06-31*'");
}*/
}

?>
