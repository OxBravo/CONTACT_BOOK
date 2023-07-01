<!DOCTYPE html>
<html>
    <head>
        <title>PROFILE</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <script src="./js/bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="./scripts.js"></script>
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
        <div class="border border-1 mt-4 main position-relative" style="min-height: 1000px;">
            <div class="rounded bg-dark-subtle p-3">
                <br><br><br><br><h1 class="text-center text-success">CONTACT BOOK</h1><br><br>
                <div class="d-flex justify-content-center">
                    <img src="./Images/profile.png" height="140px">
                </div><br>
                <?php
                    session_start();
                    $name = $_SESSION['name'];
                    $email = $_SESSION['email'];
                    echo"<h1 class='d-flex justify-content-center'>$name</h1><br>
                    <div class='row d-flex justify-content-center'>
                        <div class='col-1'></div>
                        <div class='col-1 d-flex justify-content-center'>
                            <img src='./Images/mail.png' height='54px'>
                        </div>
                        <div class='col-7 mt-2 d-flex justify-content-center'>
                            <h3>$email</h3>
                        </div>
                    </div>";
                ?>
                <br><br>
                <div class="pt-3"><a href="./index.html" style="text-decoration: none"><h4 class="border border-2 p-2 mx-3 text-center bg-light">Login to another account</h4></a></div>
                <br>
                <div class="mt-2"><a href="./register.html" style="text-decoration: none"><h4 class="border border-2 p-2 mx-3 text-center bg-light">Create a new account</h4></a></div><br><br>
            </div>
            <br><br>
            <div class="position-fixed navigation bg-white">
                <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary shadow-sm mb-3 pt-3 px-4 rounded" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);height: 70px;">
                    <li class="nav-item" role="presentation">
                    <a href="./contacts.php" style="text-decoration: none"><button class="nav-link rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contacts</button></a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a href="./favourites.php" style="text-decoration: none"><button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Favourites</button></a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Profile</button>
                    </li>
                </ul>
                <div class="position-relative bg-white" style="height: 20px;width: 720px;right: 21px;">
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html>