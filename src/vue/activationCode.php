<!-- activationCode.php display the text input to enter the activation code received by email -->
<title>Créer un compte | WishABirthday</title>
<section>
   <div id="form" class="col-12">
   <p style="color: red; font-size: 25px;"><?= $_SESSION['error']['activation'] ?></p>
       <p style="color: black; font-size: 25px;">Entrez le code envoyé par email : </p>
        <form method="POST" action="index.php?uc=activate&action=send"><br>
            <input type="number" name="activationCode" placeholder="000000" required /><br>
            <input type="submit" name="submit" value="Vérifier le compte" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>