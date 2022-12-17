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
                <h1>person's name here</h1>
                <a href="logout">logout</a>
            </figcaption>
            <img src="img/image1.png" alt="person's picture">
        </figure>
    </header>
    <main>
        <section class="navigation">
            <section class="calendar">
                <form action="calender function">
                    <input type="date" min="2022-01-01" max="2100-12-31">
                </form>
            </section>
            <form action="customer page" class="customers">
                <select name="customer">
                    <option value="customer1">customer1</option>
                    <option value="customer2">customer2</option>
                    <option value="customer3">customer3</option>
                </select>
            </form>
            <form action="reg customer" class="regCustomer">
                <aside>
                    <label for="fname">first name: </label>
                    <input type="text" name="fname">
                </aside>
                <aside>
                    <label for="lname">last name: </label>
                    <input type="text" name="lname">
                </aside>
                <aside>
                    <label for="id">id: </label>
                    <input type="text" name="id">
                </aside>
                <aside>
                    <label for="phone">phone number: </label>
                    <input type="tel" name="phone">
                </aside>
                <aside>
                    <label for="email">email: </label>
                    <input type="email" name="email">
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