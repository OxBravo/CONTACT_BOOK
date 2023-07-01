<!DOCTYPE html>
<html>
    <head>
        <title>NEW CONTACT</title>
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
            <div class="bg-dark-subtle row position-relative" style="width: 718px;bottom: 20px;right: 8px;">
                <a class="col-1 my-4" href="./contacts.php">
                    <img src="./Images/cancel.png" height="30px" class="mt-1 ms-2">
                </a>
                <h1 class="col-9 position-relative my-2" style="top: 10px;left: 6px;">Create contact</h1>
                <form class="col-2 my-3" action="insert.php" method="post">
                    <input type="submit" class="rounded-pill bg-info bg-gradient h2 border-primary" value="Save">
            </div><br>
            <div class="d-flex justify-content-center">
                <img src="./Images/profile.png" height="140px">
            </div>
            <br><br>
                <div class="row">
                    <div class="col-1">
                        <img src="./Images/person.png" height="40px">
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="fname" class="form-control" placeholder="First name" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="sname" class="form-control" placeholder="Surname"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <img src="./Images/company.png" height="40px">
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="company" class="form-control" placeholder="Company"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <img src="./Images/phone.png" height="40px">
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-outline mb-4 col">
                        <select class="form-select w-auto" name="phone_label">
                            <option value="No label">No label</option>
                            <option value="Mobile" selected>Mobile</option>
                            <option value="Work">Work</option>
                            <option value="Home">Home</option>
                            <option value="Main">Main</option>
                            <option value="Work fax">Work fax</option>
                            <option value="Home fax">Home fax</option>
                            <option value="Pager">Pager</option>
                            <option value="Other">Other</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mt-1">
                        <img src="./Images/mail.png" height="30px">
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-outline mb-4 col">
                        <select class="form-select w-auto" name="email_label">
                            <option value="No label">No label</option>
                            <option value="Home" selected>Home</option>
                            <option value="Work">Work</option>
                            <option value="Other">Other</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1 mt-1">
                        <img src="./Images/date.png" height="36px">
                    </div>
                    <div class="form-outline mb-4 col">
                        <input type="date" name="date" class="form-control" placeholder="Significant date"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="form-outline mb-4 col">
                        <select class="form-select w-auto" name="date_label">
                            <option value="No label">No label</option>
                            <option value="Birthday" selected>Birthday</option>
                            <option value="Work">Anniversary</option>
                            <option value="Other">Other</option>
                            <option value="Custom">Custom</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>