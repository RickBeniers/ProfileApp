<?php
session_start();
require '../functions/auth.php';
if (current_user_role($conn) != 2) {
    header("Location: index.view.php");
}
?>
<!--<!DOCTYPE html>
<html>
<head>
    <title>Accountbeheer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Administratorpagina</h1>
<div class="user-list">
    <h2>Gebruikerslijst</h2>
    <ul id="user-list"></ul>
</div>
<div class="remove-account">
    <h2>Gebruiker Account Ontzeggen</h2>
    <input type="text" id="username" placeholder="Gebruikersnaam">
    <button onclick="removeAccount()">Account Ontzeggen</button>
</div>
<script src="admin.js"></script>
</body>
</html> -->
//<?php
//session_start();

//$user_id = $_SESSION['user_id'];

//f(!isset($user_id)){
//header('location:login.php');
//};

//if(isset($_GET['delete'])){
//$delete_id = $_GET['delete'];
//mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
//header('location:admin_users.php');
//}

?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

         font awesome cdn link  -->
<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->

<!-- custom admin css file link  -->
<!--    <link rel="stylesheet" href="css/admin_style.css"> -->


<!--</head>
<body>

<?php //@include 'admin_header.php'; ?>

<section class="users">

  //  <h1 class="title">gebruikers account</h1>

    <div class="box-container">
        <?php
//$select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
// if(mysqli_num_rows($select_users) > 1){
//     while($fetch_users = mysqli_fetch_assoc($select_users)){
//         ?>
                <div class="box">
                    <p>gebruiker id : <span><?php // echo $fetch_users['id']; ?></span></p>
                    <p>gebruikersnaam : <span><?php //echo $fetch_users['username']; ?></span></p>
                    <p>email : <span><?php //echo $fetch_users['e-mail']; ?></span></p>
                    <p>gebruikerstype : <span style="color:<?php // if($fetch_users['user_type'] == 'user'){ echo 'var(--orange)'; }; ?>"><?php // echo $fetch_users['user_type']; ?></span></p>
                    <a href="admin_user_update.php?update=<?php // echo $fetch_users['id']; ?>" onclick="return confirm('deze gebruiker aanpassen?');" class="option-btn">update</a> -->
<!--        <a href="admin_users.php?delete=<?php // echo $fetch_users['id']; ?>" onclick="return confirm('deze gebruiker verwijderen?');" class="delete-btn">verwijderen</a>
                </div>
                <?php
// }
//  }
?>
    </div>

</section>
</body>
</html> -->

<!DOCTYPE html>

<head>
    <title>Admin Pagina</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Gebruikersoverzicht</h1>
<table>
    <tr>
        <th>Gebruikersnaam</th>
        <th>Actie</th>
    </tr>

    <?php
    // Verbind met de database
   // $db = new mysqli('localhost', 'username', 'raspywords', 'profielplus');

    // Controleer de verbinding
  //  if ($db->connect_error) {
      //  die("Databaseverbinding is mislukt: " . $db->connect_error);
   // }

    // Query om alle gebruikers op te halen
 //   $query = "SELECT username FROM users";
  //  $result = $db->query($query);
//
 //   if ($result->num_rows > 0) {
  //      while ($row = $result->fetch_assoc()) {
  //          echo "<tr>";
   //         echo "<td>" . $row['username'] . "</td>";
   //         echo "<td><a href='disable_user.php?username=" . $row['username'] . "'>Uitschakelen</a></td>";
   //         echo "</tr>";
   //     }
 //   }

    // Sluit de databaseverbinding
 //   $db->close();
 //   ?>
    <?php
    // Verbinding maken met de database
    $dbHost = 'localhost'; // De host van je database
    $dbGebruikersnaam = 'root'; // Je database gebruikersnaam
    $dbWachtwoord = ''; // Je database wachtwoord
    $dbNaam = 'profileapp'; // Naam van je database

    $mysqli = new mysqli($dbHost, $dbGebruikersnaam, $dbWachtwoord, $dbNaam);

    if ($mysqli->connect_error) {
    die('Verbindingsfout: ' . $mysqli->connect_error);
    }

    // Query om alle gebruikers op te halen
    $query = "SELECT id, username, is_deleted FROM users";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Gebruikersnaam</th><th>Status</th><th>Actie</th></tr>';
    while ($row = $result->fetch_assoc()) {
    $gebruikerId = $row['id'];
    $gebruikersnaam = $row['username'];
    $isGeblokkeerd = $row['is_deleted'];

    echo '<tr>';
    echo "<td>$gebruikersnaam</td>";
    echo "<td>" . ($isGeblokkeerd ? 'Geblokkeerd' : 'Actief') . "</td>";
    echo "<td>";
    if ($isGeblokkeerd) {
    echo "<a href='../functions/ontgrendelen.php?id=$gebruikerId'>Ontgrendelen</a>";
    } else {
    echo "<a href='../functions/blokkeren.php?id=$gebruikerId'>Blokkeren</a>";
    }
    echo "</td>";
    echo '</tr>';
    }
    echo '</table>';
    } else {
    echo 'Geen gebruikers gevonden.';
    }

    $mysqli->close();
    ?>

</table>
</body>


