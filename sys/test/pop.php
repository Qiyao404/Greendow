<?php 
  require_once('inc/session.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Titre du document</title>
  <link rel="stylesheet" type="text/css" href="popup.css">
  <script src="popup.js" defer ></script>
  </head>

  <body>
    <h2>Formes Popup Multiples</h2>
    <p>
      <button class="button" data-modal="modalOne">Contacter nous</button>
    </p>
    
    <div id="modalOne" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <a class="close">&times;</a>
          <h2>Profil :</h2>
          <p>Prénom : <?= $_SESSION['auth']['prenom'] ?></p>
          <p>Nom : <?= $_SESSION['auth']['nom'] ?></p>
          <p>E-mail : <?= $_SESSION['auth']['email'] ?></p>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
