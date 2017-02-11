<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:10 PM
 */
$formErrMsg = '';

require "dbConnection.php";
$db = get_db();

if (isset($_POST['add_user'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    if ($firstname == '' || $lastname == ''|| $email == ''|| $username == ''|| $password == '') {
        $formErrMsg = "Please fill out all fields.";
    } else {

        $db->exec("INSERT INTO appuser (firstname, lastname, email, appusername, appuserpassword)
                    VALUES ('$firstname', '$lastname', '$email', '$username', '$password')");
        header("Location: choreAssignerHome.php");
    }

}
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
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <section class="post-content">
                <h2>Welcome to the Chore Assigner Application</h2>
                <hr>
                <h3>New User Form</h3>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >
                    <p id="error"><?php if($formErrMsg != ''){echo $formErrMsg;}  ?></p>
                    <div class="row">
                    <label class="chore-form-label"><span class="chore-form-span">First Name:</span>
                    <input class="chore-form-input" type="text" name="first_name">
                    </label>
                    <label class="chore-form-label"><span class="chore-form-span">Last Name:</span>
                        <input class="chore-form-input" type="text" name="last_name">
                    </label>
                    </div>

                        <div class="row">
                    <label class="chore-form-label"><span class="chore-form-span">Username:</span>
                        <input class="chore-form-input" type="text" name="user_name">
                    </label>
                    <label class="chore-form-label"><span class="chore-form-span">Password:</span>
                    <input class="chore-form-input" type="text" name="user_password">
                    </label>
                        </div>

                    <div class="row left">
                        <label class="chore-form-label"><span class="chore-form-span">Email:</span>
                            <input class="chore-form-input" type="text" name="email">
                    </div>
                    <br>
                    <button id="submit" class="button" name="add_user" type="submit">Submit</button>
                </form>

            </section>
        </article>
    </main>
</div>

</body>
</html>
