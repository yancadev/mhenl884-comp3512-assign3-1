
<?php

require __DIR__ . "/TableDataGateway.class.php";

class AnalyticsGateway extends TableDataGateway {
    public function __construct($connect) {
           parent::__construct($connect);
    }
   
   
    protected function getSelectStatement() {
    return "Select distinct VisitID, CountryName, bv.CountryCode from BookVisits AS bv JOIN Countries on Countries.CountryCode = bv.CountryCode group by  bv.CountryCode LIMIT 15";
   
    }
   
    protected function getOrderFields() {
    return 'Name';
    }
    
    protected function getPrimaryKeyName() {
    return 'VisitID';
    }
}

?>




