<?php
$_SESSION['username'] = "Admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create A Gallery Using PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.html" class="header-brand">mmtuts</a>
        <nav>
            <ul>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="contact.html">Contact</a></li>
         </ul>
        <a href="cases.html" class="header-cases">Cases</a>
       </nav>
</header>
<main>
    <section class="gallery-links">
        <div class="wrapper">
            <h2>Gallery</h2>
            
            <div class="gallery-container">
                <?php
                include_once 'includes/dbh.inc.php';

                $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "SQL statement failed!";
                } else {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<a href="#">
                    <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                    <h3>'.$row["titleGallery"].'</h3>
                    <p>'.$row["descGallery"].'</p>
              </a>';
                    }
                }
                   
              ?>
           </div>

           <?php
           if (isset($_SESSION['username'])) {
            echo '<div class="gallery-upload">
          <form action="includes/gallery-inc.php" method="post" enctype="multipart/form-data">
              <input type="text" name="filename" placeholder="File Name....">
              <input type="text" name="filetitle" placeholder="File Title....">
              <input type="text" name="filedesc" placeholder="Image Description....">
              <input type="file" name="file">
              <button type="submit" name="submit">UPLOAD</button>
        </form>
     </div>';
           }
          ?>

      </div>
 </section>

</main>
<div class="wrapper">
    <footer>
        <ul class="footer-links-main">
            <li><a href="#">Home</a></li>
            <li><a href="#">Cases</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About Me</a></li>
            <li><a href="#">Contact</a></li>
     </ul>
     <ul class="footer-cases-main">
            <li><a href="#">Latest Cases</a></li>
            <li><a href="#">Mailing Shoalin - Web Development</a></li>
            <li><a href="#">Excellento - Web Development, Seo</a></li>
            <li><a href="#">Mmtuts - Youtube channel</a></li>
            <li><a href="#">weltec - video production</a></li>
     </ul>
</footer>
</body>
</html>