<?php

class ImprintsGateway extends TableDataGateway {
 public function __construct($connect) {
 parent::__construct($connect);
 }

 protected function getSelectStatement()
 {
 return "select BookID, ISBN10, ISBN13, Title, CopyrightYear, TrimSize, PageCountsEditorialEst
        as PageCount, Description, CoverImage, STATUS , Subcategories.SubcategoryID, SubcategoryName, Imprints.ImprintID, Imprint, BindingType from Books
        join Statuses on (Books.ProductionStatusID = Statuses.StatusID) join Subcategories on 
        (Books.SubcategoryID = Subcategories.SubcategoryID) join Imprints using (ImprintID) join BindingTypes using (BindingTypeID)";
 }

 protected function getOrderFields() {
 return 'Title, CoverImage';
 }
 protected function getPrimaryKeyName() {
 return "BookID";
 }
 
 
}

?>