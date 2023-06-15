<?php include 'config.php'; ?>



<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Develery feladat">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, SQL">
  <meta name="author" content="Oberding Róbert">
  <title>Űrlap</title>
  <meta property="og:image" content="//oberding.hu/pic/bg/freedom.jpg" />
  <meta property="og:image:secure_url" content="//secure.oberding.hu/pic/bg/freedom.jpg" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="400" />
  <meta property="og:image:height" content="300" />
  <meta property="og:image:alt" content="Oberding" />
  <link rel="icon" type="image/gif" href="//oberding.hu/pic/fav/ober_fav.png" sizes="16x16 32x32">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mindig hozzá kell adnod a head részhez, ha szeretnéd, hogy a media query-k jól működjenek. -->
  <!-- <link rel="stylesheet" type="text/css" href="//oberding.hu/1/resetcss.css"> Reset CSS-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> <!-- import the jQuery library -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> <!-- import the plugin's stylesheet -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> <!-- import the plugin's JavaScript file -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/775f5942c6.js" crossorigin="anonymous"></script> <!-- ikonok miatt kell -->
  <link rel="stylesheet" type="text/css" href="develery.css"><!--    import the webpage's stylesheet -->
  <script src="develery.js" defer></script> <!--   import the webpage's JavaScript file -->
  <script src="//oberding.hu/1/syncscroll.js" defer></script>
  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- betűkészlet használja -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- betűkészlet használja -->
  <link href="//fonts.googleapis.com/css?family=Merriweather:300%7COpen+Sans" rel="stylesheet"> <!-- az előző sor egy Google féle betűkészelet. Ezt mindig a záró head elé kell tenni -->
</head>

<body>

  <!-- FORM -->
  <form class="row g-3 needs-validation" action="send.php" method="post" novalidate>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Neved</label>
          <input type="text" class="form-control" id="validationCustom01" value="" name="name" minlength="3" maxlength="100" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <label for="validationEmail" class="form-label">Email címed</label>
          <input type="email" class="form-control" id="validationEmail" name="email" maxlength="100" required>
        </div>
      </div>

      <div class="empty"></div>

      <div class="row">
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Üzenet</label>
          <span class="font">Még::
            <span id="charNum">500</span>
            <span>karakter</span>
          </span>
          <textarea class="form-control" id="field" placeholder="Kérlek írd ide üzeneted ..." class="txta" title="" name="message" rows="4" cols="" onkeyup="countChar(this)" required></textarea>
        </div>
      </div>

      <div class="empty"></div>


      <div class="col-12">
        <button class="btn btn-primary" id="send" name="send" type="submit">Küldés</button>
      </div>
    </div>
  </form>

  <div class="empty"></div>

  <!-- Tábla  -->
  <table class="table table-light table-striped table-hover">
    <thead>
      <tr class="table-primary">
        <th scope="col">Dátum</th>
        <th scope="col">Név</th>
        <th scope="col">Email cím</th>
        <th scope="col">Tárgy</th>
        <th scope="col">Üzenet</th>
      </tr>
    </thead>

    <tbody>
      <?php
       $tasks = mysqli_query($db4, "
       SELECT *
       FROM email 
       ORDER BY id");
    
        $i = 1;
        while
        ($row = mysqli_fetch_array($tasks))
        {
    ?>

      <tr>
        <td scope="row"><?php echo $row['date'];?></td>
        <td scope="row"><?php echo $row['name'];?></td>
        <td scope="row"><?php echo $row['email_to'];?></td>
        <td scope="row"><?php echo $row['subject'];?></td>
        <td scope="row"><?php echo $row['message'];?></td>
      </tr>
      <?php $i++; } ?>
    </tbody>

  </table>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
