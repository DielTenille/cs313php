<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/8/2017
 * Time: 6:41 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | New List</title>
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
                <h2>Add Chore List Form</h2>
                <hr>
                <br/>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >

                    <label>List Name:
                        <input type="text" name="list_name">
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
