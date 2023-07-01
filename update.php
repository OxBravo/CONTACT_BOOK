<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="./js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <?php
            session_start();
            $email = $_SESSION['email'];
            $pwd = $_SESSION['pwd'];
            $name = $_SESSION['name'];
            $table = $_SESSION['table'];
            $qry = "select * from REGISTERS where EMAIL='$email';";
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
                    if($tabledata[2] != $pwd)
                    {
                        echo "<script>
                        alert('Wrong Email or Password !');
                        location.href='./index.html';
                        </script>";
                    }
                    $flag = 1;
                }
                if(!$flag)
                {
                    echo "<script>
                    alert('Wrong Email or Password !');
                    location.href='./index.html';
                    </script>";
                }
            }
            mysqli_close($con);
        ?>
    </head>
    <body>
        <?php
            $fname = $_POST["fname"];
            $sname = $_POST["sname"];
            $company = $_POST["company"];
            $phone1 = $_POST["phone1"];
            $phone2 = $_POST["phone2"];
            $phone_label = $_POST["phone_label"];
            $email = $_POST["email"];
            $email_label = $_POST["email_label"];
            $date = $_POST["date"];
            $date_label = $_POST["date_label"];

            session_start();
            $table = $_SESSION['table'];

            $full_name = $fname." ".$sname;
            if(!$email)
            {
                $email_label = null;
            }
            if(!$date)
            {
                $date_label = null;
            }

            $qry = "update $table set first_name='$fname',surname='$sname',full_name='$full_name',company='$company',phone='$phone2',phone_label='$phone_label',email='$email',email_label='$email_label',significant_date='$date',date_label='$date_label' where phone=$phone1;";
            $con = mysqli_connect("localhost","root","Abhi7674");
            if(!$con)
            {
                die("Connection Error");
            }
            mysqli_select_db($con,"CONTACT_BOOK");
            $result = mysqli_query($con,$qry);
            echo "<script>alert('$full_name Saved');
            location.href='./contacts.php';</script>";
        ?>
    </body>
</html>