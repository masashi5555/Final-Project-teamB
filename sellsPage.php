<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
            <section class="calendar">
                <?php include 'calendar.php';?>
                <!-- <form action="calender function">
                    <input type="date" min="2022-01-01" max="2100-12-31">
                </form> -->
            </section>
            <form action="customerPage.php" class="customers" method="POST">
                <select name="customer">
                    <?php
                        session_start();
                        $id = $_SESSION['logUser']['id'];
                        $dbcon = new mysqli('localhost', 'root', '', 'demo_db');
                        // $cmd = "SELECT * FROM customer";
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
            <h2>graph will be here</h2>
        </section>
    </main>
</body>
</html>