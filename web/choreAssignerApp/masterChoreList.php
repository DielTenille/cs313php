<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 9:22 AM
 */

require "dbConnection.php";
$db = get_db();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Master Chore List</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage-css.css">
</head>
<body>
<div>
    <header>
        <h1>Master Chore List</h1>
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
                <h2>About Me</h2>
                <figure class = "side-image">
                    <img src="../images/chore-chart.jpg">
                </figure>
                <br/>
                <h3>Welcome To My CIT 313 Home Page!</h3>
                <p>My name is Tenille Diel and I am excited to showcase my work for you on this website! </p>
                <p>I am happily married to my sweetheart, Jon, and am the mother of 5 wonderful children.  I work full-time as a quality  assurance engineer, testing software, and am going to school full-time to earn a BS in Web Design &amp; Development with an emphasis in Development. </p>
                <span>Don't worry... I know I am crazy.</span>
                <p>This site was created to showcase the assignments created by me throughout the CIT 313: Web Engineering II course.  As the semester progresses I will add new links to the assignments I am working on or that are completed.  See all available assignments by clicking on the 'Assignments' link in the menu or by <a href="assignments.php">clicking here!</a></p>
            </section>
        </article>
    </main>
</div>

</body>
</html>
