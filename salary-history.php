<?php

require "config.php";

use App\Employee;

$emps = Employee::historylist($_GET['emp']);

$department = Employee::getByDeptId($_GET['dept']);
$employee = Employee::getByEmpId($_GET['emp']);
$titles = Employee::getByTitleId($_GET['emp']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Salary History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container-fluid mt-3">
        <a href="javascript:history.back()" class="btn btn-primary">Back</a><br><br>
        <h2>Salary History of <?php echo $employee ->getEmpName();?></h2>
        <h4><strong>Department:</strong> <?php echo $department->getDeptName();?> | <strong>Title:</strong> <?php echo $titles ->getTitle();?> | <strong>Birthdate:</strong> <?php echo $employee ->getBirthdate();?> | <strong>Gender:</strong>
            <?php 
                if($employee ->getGender() == "M"){
                    echo "Male";
                }else{
                    echo "Female";
                }
            ?>
        </h4>
        <table id="salaryTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    foreach ($emps as $row) {
                        echo "<tr>";
                        $cols = get_object_vars($row);
                        echo "<td>".$cols["from_date"]."</td>";
                        echo "<td>".$cols["to_date"]."</td>";
                        echo "<td>$".$cols["salary"]."</td>";

                        echo "</tr>";  
                      }
                    ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#salaryTable').DataTable();
        } );
    </script>
</body>
</html>