<!DOCTYPE html>
<html>
    <head>
        <title>PROFILE</title>
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
        <div class="border border-1 mt-4 main">
            <div class="row position-relative pt-4" style="bottom: 20px;right: 8px;width: 718px;">
                <a class="col-1 ms-3" href="./contacts.php">
                    <img src="./Images/back.png" height="30px">
                </a>
                <div class="col-6"></div>
                <form class="col-1" action="edit.php" method="post">
                    <button class="bg-white border-0"><img src="./Images/edit.png" height="30px"></button>
                    <?php
                        $phone = $_POST["phone"];
                        echo "<input type='number' name='phone' value=$phone class='invisible h_1 w_1'>";
                    ?>
                </form>
                <div class="col"></div>
                <form class="col-1 ps-4" action="add_fav.php" method="post">
                    <?php
                        $phone = $_POST["phone"];
                        session_start();
                        $table = $_SESSION['table'];
                        $qry = "select favourite from $table where phone=$phone;";
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
                                if($tabledata[0] == "No")
                                {
                                    echo "<button class='bg-white border-0'><img src='./Images/favourite_1.png' height='30px'></button>";
                                }
                                else
                                {
                                    echo "<button class='bg-white border-0'><img src='./Images/favourite_2.png' height='30px'></button>";
                                }
                            }
                        }
                        mysqli_close($con);
                        echo "<input type='number' name='phone' value=$phone class='invisible h_1 w_1'>";
                    ?>
                </form>
                <form class="col-2 ms-3 ps-5" action="delete.php" method="post">
                    <button class="bg-white border-0"><img src="./Images/delete.png" height="30px"></button>
                    <?php
                        $phone = $_POST["phone"];
                        echo "<input type='number' name='phone' value=$phone class='invisible h_1 w_1'>";
                    ?>
                </form>
                <hr>
            </div><br>
            <div class="d-flex justify-content-center">
                <img src="./Images/profile.png" height="140px">
            </div>
            <br><br>
            <?php
                $phone = $_POST["phone"];
                session_start();
                $table = $_SESSION['table'];
                $qry = "select * from $table where phone=$phone;";
                $con = mysqli_connect("localhost","root","Abhi7674");
                if(!$con)
                {
                    die("Connection Error");
                }
                mysqli_select_db($con,"CONTACT_BOOK");
                $result = mysqli_query($con,$qry);
                while($tabledata=mysqli_fetch_row($result))
                {
                    echo"<h1 class='d-flex justify-content-center'>$tabledata[2]</h1>
                    <h4 class='d-flex justify-content-center text-secondary'>$tabledata[3]</h4><br>
                    <div class='rounded bg-dark-subtle p-3'>
                        <h3 class='mt-2'>Contact info</h3><br>
                        <div class='row ms-2'>
                            <div class='col-1'>
                                <img src='./Images/phone.png' height='60px'>
                            </div>
                            <div class='col-4 ms-4'>
                                <h4>$tabledata[4]</h4>
                                <h5 class='text-secondary'>$tabledata[5]</h5>
                            </div>
                        </div><br>";
                    if($tabledata[6] != "")
                    {
                        echo "<div class='row ms-2'>
                            <div class='col-1 mt-1 me-2'>
                                <img src='./Images/mail.png' height='54px'>
                            </div>
                            <div class='col-4 ms-4'>
                                <h4>$tabledata[6]</h4>
                                <h5 class='text-secondary'>$tabledata[7]</h5>
                            </div>
                        </div>";
                    }
                    echo "</div>";
                    if($tabledata[3] != "" || $tabledata[8] != "")
                    {
                        echo "<br>
                        <div class='rounded bg-dark-subtle p-3'>
                            <h3 class='mt-2'>About $tabledata[0]</h3><br>";
                        if($tabledata[3] != "")
                        {
                            echo "<div class='row ms-2'>
                                <div class='col-1'>
                                    <img src='./Images/company.png' height='60px'>
                                </div>
                                <div class='col-4 ms-4 mt-3'>
                                    <h3>$tabledata[3]</h3>
                                </div>
                            </div><br>";
                        }
                        if($tabledata[8] != "")
                        {
                            echo "<div class='row ms-2'>
                                <div class='col-1'>
                                    <img src='./Images/date.png' height='60px'>
                                </div>
                                <div class='col-4 ms-4'>
                                    <h4>$tabledata[8]</h4>
                                    <h5 class='text-secondary'>$tabledata[9]</h5>
                                </div>
                            </div>";
                        }
                        echo "</div>";
                    }
                }
            ?>
        </div><br>
    </body>
</html>