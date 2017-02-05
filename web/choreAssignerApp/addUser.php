<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:10 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | New User</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage-css.css">
</head>
<body>
<div>
    <header>
        <h1>Chore Assigner Application</h1>
        <hr>
        <nav>
            <ul>
                <li><a href="choreAssignerHome.php">Chore Assigner Home</a></li>
                <li><a href="masterChoreList.php">Master Chore List</a></li>
                <li><a href="childrenList.php">Children</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <section class="post-content">
                <h2>Welcome to the Chore Assigner Application</h2>
                <hr>
                <br/>
                <h3>New User Form</h3>
                <br>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >

                    <label>First Name:
                    <input type="text" name="first_name">
                    </label>
                    <br>
                    <label>Last Name:
                        <input type="text" name="last_name">
                    </label>
                    <br>
                    <label>Email:
                        <input type="text" name="email">
                    </label>
                    <br>
                    <label>Username:
                        <input type="text" name="user_name">
                    </label>
                    <br>
                    <label>Password:
                    <input type="text" name="user_password">
                    </label>
                    <br><br>
                    <button id="submit" class="button" type="submit">Submit</button>
                </form>

            </section>
        </article>
    </main>
</div>

</body>
</html>
