<div class="newsletter">
  <div class="div_odg" id="div_odg"></div>
      <div class="newsletter-wrapper">
      <p><b>Prijavite se na naš newsletter i budite uvek u toku</b></p>
      <button class="submit-button" onclick=submitNewsletter() id="newsletter">Prijavi se</button>
    </div>
    <div class="newsletter-icons">
      <ul>
        <li><i class="fa-solid fa-cart-shopping fa-2x"></i><ul style="padding: 0px; margin-top: 10px;">Najbolja ponuda i brza<br> i laka kupovina</ul></li>
        <li><i class="fa-solid fa-truck fa-2x"></i><ul style="padding: 0px; margin-top: 10px;">Besplatna isporuka za sve<br> porudžbine preko 5.000 RSD</ul></li>
        <li style="padding: 0"><i class="fa-solid fa-circle-info fa-2x"></i><ul style="padding: 0px; margin-top: 10px;">Za pitanja i sugestije pozovite nas na 011/4434-43432<br> ili nam pošaljite kontakt formu na stranici <a href="contact_page.php">Kontakt</a></ul></li>      </ul>
    </div>
    </div>
</div>
    <div class="footer-wrapper">
    <div class="footer">
      <p>© 2023. G Warehouse. Sva prava zadržana. </p>
    </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    $(function(){
      productsCount();
      })
function submitNewsletter(){
    if(!confirm("Da li ste sigurni da želite da se prijavite na newsletter?")) return false;
    $.get("ajax/ajax_profile.php?action=submitNewsletter", function(response){
        let odg=JSON.parse(response);
        console.log(odg);
        if(odg.error!=""){
            alert(odg.error);
            return false;
        }else{
          $("#div_odg").css('display', 'block').html("<p>"+odg.success+"</p>");
        }
    })
}

function addProduct(proizvod_id){
  $.post("ajax/ajax_cart.php?action=addProduct", {proizvod_id: proizvod_id}, function(response){
    let odg=JSON.parse(response);
    console.log(odg);
  });
}

function productsCount(){
  $.post("ajax/ajax_cart.php?action=productsCount", function(response){
        let odg=JSON.parse(response);
        $("#p_number").html(odg.success);

      })
}
</script>

