<?php
//include "session.php";
include 'includes/book-config.inc.php';

try {
    $db = new EmployeesGateway($connection);
    $result = $db-> limitBy(30);
    
    //list employees
    $string = "";
    foreach ($result as $row){
       $string .= createEmployeeList($row);
    }
    
    //output address DOESNT WORK
    $string1="";
    $string2="";
    $string3="";
    $sql = "SELECT EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
    if (isset($_GET['id'])) {
        $result1 = $db-> runDifferentSelect($sql, "EmployeeID",$_GET['id'], 1);
        foreach($result1 as $row){
            $string1 .= outputAddresses($row);
        }
        
    }
    $sql2 = "select  ToDoID, EmployeeID, DateBy, Status, Priority, Description from EmployeeToDo";
    if(isset($_GET['id'])){
        $result2 = $db-> runDifferentSelect($sql2, "EmployeeID", $_GET['id'],20);
        foreach($result2 as $row){
            $string2 .= outputToDo($row);
        }
    }
    
    /*$sql3= "select  employ.EmployeeID, message.EmployeeID, message.MessageDate, message.Category, message.Content, 
        message.ContactID, contact.ContactID from Employees employ, EmployeeMessages message, Contacts contact
        where employ.EmployeeID = message.EmployeeID and message.ContactID=contact.ContactID and employ.EmployeeID=:id";
    if(isset($_GET['id'])){        
        $result3 = $db->runDifferentSelect($sql3);
        foreach($result3 as $row){
            $string3.=outputMessages($row);
        }
    }*/
}
catch (Exception $e) {
    die( $e->getMessage() );
}

function createEmployeeList($rows){
    return  "<li><a href='?id=".$rows['EmployeeID']."'> ".$rows['FirstName']." ".$rows['LastName'] ."</a></li>";
}

function outputAddresses($rows){
    return "<br><font size='7 pt'>" . $rows['FirstName']." ".$rows['LastName']. "<br></font size><br>".$rows['Address']."<br>".
    $rows['City'] . " ". $rows['Region'] . "<br>".$rows['Country'] . " ". $rows['Postal'] . "<br>".$rows['Email'];
}

function outputToDo($rows){
    return "<tr><td class='mdl-data-table__cell--non-numeric'>". $rows['DateBy']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Status']."</td><td class='mdl-data-table__cell--non-numeric'>". $rows['Priority']."</td><td class='mdl-data-table__cell--non-numeric'>".
    $rows['Description']."</td></tr>";
}

function outputMessages($rows){
     return "<tr><td class='mdl-data-table__cell--non-numeric'>".$rows['MessageDate']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Category']."</td>
     <td class='mdl-data-table__cell--non-numeric'>".$rows['employ.FirstName']."</td><td class='mdl-data-table__cell--non-numeric'>".$rows['Content']."</td></tr>";
}





?>

<script>
function switchFunction() {
    var x = document.getElementById("filter");
     if (x.style.display === "none") {
      x.style.display = "block";
      } else {
      x.style.display = "none";
              }
            }
</script>