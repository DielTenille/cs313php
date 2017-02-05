<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:21 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | New Chore</title>
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
                <h3>New Chore Form</h3>
                <br>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >

                    <label>Chore Name:
                        <input type="text" name="chore_name">
                    </label>
                    <br>
                    <label>Chore Description:
                        <input type="text" name="chore_desc">
                    </label>
                    <br>
                    <label>Recommended Minimum Age to Complete:
                        <input type="text" name="min_age">
                    </label>
                    <br>
                    <label>Average Time to Complete:
                        <input type="text" name="hours"> hours
                        <input type="text" name="minutes"> minutes
                    </label>
                    <br>
                    <label>Recommended Recurrence:
                        <select id="numTime"></select>
                        <select id="timeType"></select>
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
