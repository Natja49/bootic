<?php
include("./header_admin.php");
?>

<div class="container-fluid ">
  <div class="row-8 p-5">
    <div class="col-sm-12 col-md-4 col-lg-6">
      <form action="" method="">
        <h2>Voici vos informations : </h2>
        <div class="">
          <label for="email"></label>
          <input type="text" class="form-control" placeholder="Votre email est : toto@gmail.com" aria-label="">
        </div>
        <div class="">
          <label for="ville"></label>
          <input type="text" class="form-control" placeholder="Votre ville est : Angers" aria-label="">
        </div>
        <div class="">
          <label for="cp"></label>
          <input type="text" class="form-control" placeholder="Votre code postal est : 49000" aria-label="">
        </div>
        <div class="">
          <label for="exampleFormControlTextarea1" class="form-label"></label>
          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre adresse est : 2 bd Raspail" rows="2"></textarea>
        </div><br>
        <?php

        include("./../inc/footer.inc.php");
        ?>