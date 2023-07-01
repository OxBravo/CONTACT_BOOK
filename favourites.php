<!DOCTYPE html>
<html>
    <head>
        <title>FAVOURITES</title>
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
            <div class="border rounded-pill mt-2 bg-light row">
                <img class="col-1 my-3 ms-2" src="./Images/search.png" height="30px">
                <form class="col-9" action="./search.php" method="post">
                    <input type="submit" value="Search Contacts" class="bg-light h1 pt-2 border-0" style="width:486px;text-align: left;">
                    <input type="text" name="from_address" value="favourites" class="invisible w_1">
                </form>
                <button class="col-1 my-3 ms-4 bg-light border-0" onclick="keybab()"><img src="./Images/settings.png" height="30px"></button>
            </div>
            <h2 class="ms-2 mt-4">Favourites</h2>
            <hr>
            <div style="flex: 1;">
                <?php
                    session_start();
                    $table = $_SESSION['table'];
                    $qry="select * from $table where favourite='Yes' order by full_name;";
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
                            echo "<div>
                                <form action='profile.php' method='post'>
                                    <button class='w-100 pt-3 pb-2 bg-white border-0'>
                                        <div class='row'>
                                            <div class='col-2'>
                                                <img src='./Images/profile.png' height='50px'>
                                            </div>
                                            <div class='col'>
                                                <h1 style='text-align: left;'>$tabledata[2]</h1>
                                            </div>
                                            <div class='col-1'>
                                                <input type='number' name='phone' value=$tabledata[4] class='invisible'>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </div>";
                        }
                    }
                    mysqli_close($con);
                ?>
            </div>
            <div id="three_dot_menu" class="position-absolute bg-light border invisible" style="bottom: 724px;left: 362px;height: 165px;width: 340px;">
                <div class="pt-3"><a href="./index.html" style="text-decoration: none"><h4 class="border border-2 p-2 mx-3">Login to another account</h4></a></div>
                <hr>
                <div class=""><a href="./register.html" class="bg-warning" style="text-decoration: none"><h4 class="border border-2 p-2 mx-3">Create a new account</h4></a></div>
            </div>
            <div class="position-fixed navigation bg-white">
                <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary shadow-sm mb-3 pt-3 px-4 rounded" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);height: 70px;">
                    <li class="nav-item" role="presentation">
                    <a href="./contacts.php" style="text-decoration: none"><button class="nav-link rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Contacts</button></a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Favourites</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a href="./settings.php" style="text-decoration: none"><button class="nav-link rounded-5" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Profile</button></a>
                    </li>
                </ul>
                <div class="position-relative bg-white" style="height: 20px;width: 720px;right: 21px;">
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html>