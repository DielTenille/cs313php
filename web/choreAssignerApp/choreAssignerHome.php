<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 9:40 AM
 */

require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Master Chore List</title>
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
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <section class="post-content">
                <h2>Welcome to the Chore Assigner Application</h2>
                <hr>
                <br/>
                <h3>Current Users</h3>
                <?php
                $statement = $db->prepare("SELECT username, firstname, lastname, email FROM user");
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<p>';
                    echo $row['username'] . '  ' . $row['firstname']. '  ' . $row['lastname']. '  ' . $row['email'];
                    echo '</p>';
                }

                ?>

            </section>
        </article>
    </main>
</div>

</body>
</html>
