<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="./js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            $un = $_POST["un"];
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];
            $rpwd = $_POST["rpwd"];
            if($pwd != $rpwd)
            {
                echo "<script>alert('Enter the same password');
                location.href='./register.html';</script>";
            }
            $qry = "select count(*) from REGISTERS where EMAIL='$email';";
            $con = mysqli_connect("localhost","root","Abhi7674");
            if(!$con)
            {
                die("Connection Error");
            }
            else
            {
                mysqli_select_db($con,"CONTACT_BOOK");
                $result = mysqli_query($con,$qry);
                while($tabledata=mysqli_fetch_row($result))
                {
                    if($tabledata[0] != 0)
                    {
                        echo "<script>
                        alert('This Email is already registed !');
                        location.href='./register.html';
                        </script>";
                    }
                }
                $table = (explode("@",$email)[0]);
                $qry_1 = "create table $table(first_name varchar(20) not null,surname varchar(15),full_name varchar(35) not null,company varchar(30),phone varchar(10) primary key,phone_label varchar(10),email varchar(25),email_label varchar(10),significant_date varchar(12),date_label varchar(12),favourite varchar(4) not null);";
                $qry_2 = "insert into REGISTERS values('$un','$email','$pwd','$table');";
                $result_1 = mysqli_query($con,$qry_1);
                $result_2 = mysqli_query($con,$qry_2);
                echo "<script>alert('Account Registed Successfully');
                location.href='./index.html';</script>";
            }
        ?>
    </body>
</html>