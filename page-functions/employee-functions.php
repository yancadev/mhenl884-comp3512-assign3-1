<?php
//include "session.php";
include 'includes/book-config.inc.php';

/** 
* Runs all the methods and objects for the browse-employees.php page.
*/
try {
    $db = new EmployeesGateway($connection);
    $result = $db-> limitBy(30);
    
    
    // --- list employees --- //
    $string = "";
    $ordering = $db-> orderAndLimit('LastName', 30);
    foreach ($ordering as $row){
       $string .= createEmployeeList($row);
    }
    
    $string1="";
    $string2="";
    $string3="";
    $string5="";
    
    // --- output employee details --- //
    $sql = "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
    if (isset($_GET['id'])) {
        $result1 = $db-> runDifferentSelect($sql, "EmployeeID",$_GET['id'], 1);
        foreach($result1 as $row){
            $string1 .= outputAddresses($row);
        }
    }
    
    // --- output toDo List --- //    
    $sql2 = "select  ToDoID, EmployeeID, DateBy, Status, Priority, Description from EmployeeToDo";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql2, "EmployeeID", $_GET['id'],20);
        foreach($result2 as $row){
            $string2 .= outputToDo($row);
        }
    }
    
    
    // --- output message --- // 
   $sql5 ="SELECT mess.MessageDate, mess.Category, mess.ContactID, mess.Content, con.FirstName, con.LastName, mess.EmployeeID	FROM	EmployeeMessages AS mess JOIN Contacts AS con  USING (ContactID)";
    if(isset($_GET['id'])){
        $result5 = $db-> runDifferentSelect($sql5, "EmployeeID", $_GET['id'],20);
        foreach($result5 as $row){
            $string5 .= outputMessages($row);
        }
    }
   
    
    // ----- filter ----- //
    $sql3 = "SELECT DISTINCT City FROM Employees ORDER BY City ASC";
    $result3 = $db-> runDifferentSelect($sql3);
    $string4="";
    foreach($result3 as $row){
         $string4 .= createCityList($row);
    }
    
    if(isset($_GET['City'])){
        $result4 =  $db->runDifferentSelect($sql, "City",$_GET['City'], 30);
        $string="";
        foreach($result4 as $row){
            $string .= createEmployeeList($row);
        }
    }
    
    $filter ="";
    if(isset($_GET['last-name'])){
        $filter .= $_GET['last-name'];
    }
    $sql3 = "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees WHERE LastName LIKE '%" . $filter . "%' ";
    if(isset($_GET['last-name'])){
        $result5 = $db->runDifferentSelect($sql3);
        $string="";
        foreach($result5 as $row){
            $string .= createEmployeeList($row);
        }
    }
}
catch (Exception $e) {
    die( $e->getMessage() );
}

/** 
* Creates different types of lists on the main employee function page.
* @return      employees, addresses, ToDo, messages, and cities.
* @param       rows
*/
function createEmployeeList($rows){
    return  "<li><a href='?id=".$rows['EmployeeID']."'> ".$rows['FirstName']." ".$rows['LastName'] ."</a></li>";
}

function outputAddresses($rows){
    return "<br><font size='6 pt'>" . $rows['FirstName']." ".$rows['LastName']. "<br></font size><br>".$rows['Address']."<br>".
    $rows['City'] . " ". $rows['Region'] . "<br>".$rows['Country'] . " ". $rows['Postal'] . "<br>".$rows['Email'];
}

function outputToDo($rows){
    return "<tr><td class='mdl-data-table__cell--non-numeric'>". $rows['DateBy']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Status']."</td><td class='mdl-data-table__cell--non-numeric'>". $rows['Priority']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Description']."</td></tr>";
}

function outputMessages($rows){
     return " <tr><td class='mdl-data-table__cell--non-numeric'>".$rows['MessageDate']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Category']."</td>
     <td class='mdl-data-table__cell--non-numeric'>".$rows['FirstName']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Content']."</td></tr>";
}

function createCityList($rows)
{
    return '<option value="'.$rows['City'].'">'.$rows['City'].'</option>';
    
}

