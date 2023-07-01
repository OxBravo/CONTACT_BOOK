<!DOCTYPE html>
<html>
    <head>
        <title>CONTACTS</title>
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
        <div class="border border-1 mt-4 main" style="min-height: 1000px;">
            <div class="row position-relative pt-2" style="bottom: 20px;right: 8px;width: 718px;">
                <a class="col-1 ms-3 mt-3" href="./contacts.php">
                    <img class="mt-1" src="./Images/back.png" height="30px">
                </a>
                <form id="search" class="col-10 my-2" action="" method="post">
                    <?php
                        $search_data = $_POST["search_box"];
                        $from_address = $_POST["from_address"];
                        echo "<input type='text' name='search_box' id='search_box' class='h1 border-0' style='width: 562px;outline: none;' placeholder='Search Contacts' onchange='search()' value='$search_data'>
                        <input type='text' name='from_address' value='$from_address' class='invisible w_1'>";
                    ?>
                </form>
                <hr>
            </div>
            <div style="flex: 1;">
                <?php
                    $search_data = $_POST["search_box"];
                    $from_address = $_POST["from_address"];
                    session_start();
                    $table = $_SESSION['table'];
                    if($from_address == "contacts")
                    {
                        $qry="select * from $table where full_name like '%$search_data%' order by full_name";
                    }
                    elseif($from_address == "favourites")
                    {
                        $qry="select * from $table where full_name like '%$search_data%' and favourite='Yes' order by full_name";
                    }
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
            <div class="position-fixed navigation bg-white">
                <div class="position-relative bg-white" style="height: 20px;width: 720px;right: 21px;">
                    <hr>
                </div>
            </div>
        </div>
    </body>
</html>