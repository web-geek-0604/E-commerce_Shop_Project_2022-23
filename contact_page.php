<?php include('header_and_footer/header_and_nav.php') ?>

<div class="contact_wrapper"><br><br>
    <h1 class="contact-page-heading">Možete nas kontaktirati na sledeće načine</h1>
<div class="contact-icons">
      <ul>
        <li><i class="fa-brands fa-whatsapp fa-2x"></i><ul style="padding: 0px;">061/223-4321</ul></li>
        <li><i class="fa-brands fa-viber fa-2x"></i><ul style="padding: 0px;">061/223-4321</ul></li>
        <li><i class="fa-solid fa-envelope fa-2x"></i><ul style="padding: 0px;">gwarehouseit@gmail.com</ul></li>
      </ul>
    </div>
    <h1 class="contact-page-heading">ili nam pošaljite kontakt formu</h1>
    <div class="contact_form_container">
            <h2>KONTAKT FORMA</h2>
            <div id="error_message"></div>
            <form id="myform"  method="POST" action="send.php">
              <div class="input_field">
                  <input type="text" placeholder="Ime*" id="ime" name="ime">
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Email*" id="email" name="email">
              </div>
              <div class="input_field">
                  <input type="text" placeholder="Naslov*" id="naslov" name="naslov">
              </div>
              <div class="input_field">
                  <textarea placeholder="Poruka*" id="poruka" name="poruka"></textarea>
              </div>
              <div class="btn">
                  <button type="submit" class="postavi-btn" name="send" id="send">Pošalji</button>
              </div>
            </form>
          </div>
</div>
<?php include('header_and_footer/footer_and_newsletter.php') ?>
