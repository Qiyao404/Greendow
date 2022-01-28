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
    <p>
      <button class="button" data-modal="modalTwo">Envoyer un formulaire de plainte</button>
    </p>


    <div id="modalOne" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <a class="close">&times;</a>
          <form action="/">
            <h2>Contacter Nous</h2>
            <div>
              <input class="fname" type="text" name="name" placeholder="Nom">
              <input type="text" name="name" placeholder="Email">
              <input type="text" name="name" placeholder="Nombre de téléphone">
              <input type="text" name="name" placeholder="Site Web">
            </div>
            <span>Message</span>
            <div>
              <textarea rows="4"></textarea>
            </div>
            <button type="submit" href="/">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div id="modalTwo" class="modal">
      <div class="modal-content">
        <div class="contact-form">
          <span class="close">&times;</span>
          <form action="/">
            <h2>Formulaire de plainte</h2>
            <div>
              <input class="fname" type="text" name="name" placeholder="Nom">
              <input type="text" name="name" placeholder="Email">
              <input type="text" name="name" placeholder="Nombre de téléphone">
              <input type="text" name="name" placeholder="Site Web">
            </div>
            <span>Message</span>
            <div>
              <textarea rows="4"></textarea>
            </div>
            <button type="submit" href="/">Envoyer</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
