<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .grpah {
            display: flex;
            flex-direction: column;
        }
    </style>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous" defer></script>
</head>
<body>
    <header>
        <section>
            <form action="" method="GET">
                <label for="english">English: </label>
                <input type="radio" name="language" id="english">
                <label for="japanese">Japanese: </label>
                <input type="radio" name="language" id="japanese">
                <label for="spanish">Spanish: </label>
                <input type="radio" name="language" id="spanish">
                <label for="korean">Korean: </label>
                <input type="radio" name="language" id="korean">
            </form>
        </section>
        <figure>
            <figcaption>
                <?php
                    session_start();
                    echo "<h1>".$_SESSION['logUser']['first_name']." ".$_SESSION['logUser']['last_name']."</h1>";
                ?>
                <a href="logout">logout</a>
            </figcaption>
            <img src="img/image1.png" alt="person's picture">
        </figure>
    </header>
    <main>
        <section class="navigation">
            <section class="calendar">
                <?php include 'calendar.php';?>
            </section>
            <form action="customerPage.php" class="customers" method="POST">
                <select name="customer">
                    <?php
                        session_start();
                        $id = $_SESSION['logUser']['id'];
                        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
                        $cmd = "SELECT * FROM customer";
                        $cmd = "SELECT * FROM customer WHERE uid = $id";
                        // if some error happened, please check out the argument of mysqli, database name, and table name!!
                        $search = $dbcon -> query($cmd);
                        $data = $search -> fetch_all();
                        foreach ($data as $eachData) {
                            echo "<option value=".$eachData[0].">".$eachData[2]." ".$eachData[3].": ".$eachData[0]."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="jump to page">
            </form>
            <form action="regCustomer.php" class="regCustomer" method="POST">
                <aside>
                    <label for="fname">first name: </label>
                    <input type="text" name="fname" value="john">
                </aside>
                <aside>
                    <label for="lname">last name: </label>
                    <input type="text" name="lname" value="doe">
                </aside>
                <aside>
                    <label for="phone">phone number: </label>
                    <input type="tel" name="phone" value="222-222-2222">
                </aside>
                <aside>
                    <label for="email">email: </label>
                    <input type="email" name="email" value="johndoe@gmail.com">
                </aside>
                <aside>
                    <input type="submit" value="register">
                </aside>
            </form>
        </section>
        <section class="graph">
            <?php include './sales_manager.php';?>                    
        </section>
        <section class="graph">
            <?php include './sales_month.php'; ?>                    
        </section>
    </main>
</body>
</html>