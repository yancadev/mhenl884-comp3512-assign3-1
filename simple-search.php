<!-- ARE WE EVEN USING THIS? -->
<?php
function getSearchResult(){
    include 'includes/book-config.inc.php';
    $db = new EmployeesGateway($connection);
    
    $searchValue = $_POST['name'];
    
    $sql = "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees WHERE FirstName LIKE '%" . $searchValue . "%' OR 
    LastName LIKE '%" . $searchValue . "%'";
    
    $result = $db->runDifferentSelect($sql);
    foreach ($result as $row) {
        if ($_POST['name'] == $row['FirstName']){
            return $row['FirstName'];
        }
        if ($_POST['name'] == $row['LastName']){
            return $row['LastName'];
        }
    }
    
}

?>