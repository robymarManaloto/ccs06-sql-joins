<?php

require "config.php";

use App\Department;

$depts = Department::list();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container-fluid mt-3">
        <h2>Departments</h2>
        <table id="departmentTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Department Number</th>
                    <th>Department Name</th>
                    <th>Manager Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Number of Years</th>
                    <th>Employees</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                        foreach ($depts as $row) {
                            echo "<tr>";
                            
                            $cols = get_object_vars($row);
                            echo "<td>".$cols["Department_Number"]."</td>";
                            echo "<td>".$cols["Department_Name"]."</td>";
                            echo "<td>".$cols["Manager_Name"]."</td>";
                            echo "<td>".$cols["From_Date"]."</td>";
                            echo "<td>".$cols["To_Date"]."</td>";
                            echo "<td>".$cols["Number_of_Years"]."</td>";
                            
                            echo "<td><a href='employees.php?dept=".$cols["Department_Number"]."&emp=".$cols["Manager_Number"]."
                                      '>View</a></td>";
                            
                            echo "</tr>";  
                          }
                    ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#departmentTable').DataTable();
        } );
    </script>
</body>
</html>
