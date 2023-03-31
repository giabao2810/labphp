<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP PHP</title>
</head>
<body>
    <div id="wrapper">
        <?php
            require_once("userclass.php");
            $user1 = new User ('Nguyen Van A', 'abc@gmail.com');
            echo "<h2> ---User infor ---</h2>";
            echo "UserID: ".$user1->GetUserID()."<br/>";
            echo "UserName: ".$user1->GetUserName()."<br/>";

            $user2 = new User ('Nguyen Van B', 'abc@gmail.com');
            echo "<h2> ---User infor ---</h2>";
            echo "UserID: ".$user2->GetUserID()."<br/>";
            echo "UserName: ".$user2->GetUserName()."<br/>";
            
            include("emloyeeclass.php");
            $person_a = new Person("Nguyen Van C", 1234);
            echo "<h2> ---More OPP PHP</h2>";
            echo "Person Name: ".$person_a->GetName()."<br/>";
            echo "Person ID: ".$person_a->GetName()."<br/>";

            echo "<h2>Employee</h2>";
            $employee_a = new Employee("Nguyen Van D",5678,"Security");
            echo "Employee Id: ".$employee_a->GetEmployeeID()."<br/>";
            echo "Employee Name: ".$employee_a->GetName()."<br/>";
            echo "Employee Department: ".$employee_a->GetDepartment()."<br/>";
            echo "<h2>More Employee</h2>";
            $employee_b =  new Employee("Nguyen Van E", 112233, "Offial");
            echo "Employee ID: ".$employee_b->GetEmployeeID()."<br/>";
            echo "Employee Name: ".$employee_b->GetName()."<br>/";
            echo "Employee Department: ".$employee_b->GetDepartment()."<br/>";
        ?>

    </div>
</body>
</html>