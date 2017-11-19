<?php
/**
 * This class helps with connecting the application to access the States Database.
 */
class StatesGateway extends TableDataGateway {
 public function __construct($connect) {
        parent::__construct($connect);
 }

/**
 * Returns the select statements to retrieve information about the states.
 * @return      the query results
 */
 protected function getSelectStatement() {
 return "select StateID, StateAbbr, StateName from States order by StateName";
 }

/* Returns the following fields and primary key
* @return      The state name, and stateID
*/
 protected function getOrderFields() {
 return 'StateName';
 }
 
 protected function getPrimaryKeyName() {
 return "StateID";
 }
}

?>