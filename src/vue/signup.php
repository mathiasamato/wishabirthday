<title>Créer un compte | WishABirthday</title>
<section>
   <div id="form" class="col-12">
       <p style="color: red; font-size: 25px;"><?= $_SESSION['error'] ?></p>
        <form method="POST" action="index.php?uc=signup&action=send"><br>
            <input type="text" name="Lastname" placeholder="Entrer un nom" value="<?= $_SESSION['userInfos']['Lastname'] ?>" required /><br>
            <input type="text" name="Firstname" placeholder="Entrer un prénom" value="<?= $_SESSION['userInfos']['Firstname'] ?>" required /><br>
            <input type="email" name="Email" placeholder="Entrer un email" value="<?= $_SESSION['userInfos']['Email'] ?>" required /><br>
            <input type="date" name="DoB" placeholder="Entrer une date de naissance au format JJ-MM-AAAA" value="<?= $_SESSION['userInfos']['DoB'] ?>" required /><br>
            <input type="password" name="Password" placeholder="Entrer un mot de passe" required /><br>
            <input type="password" name="ConfirmPassword" placeholder="Confirmer le mot de passe" required /><br>
            <label class="label_for_checkbox">Français</label><br><input type="radio" name="Language" value="1" required/><br>
            <label class="label_for_checkbox">English</label><br><input type="radio"  name="Language" value="2" required/><br>
            <label class="label_for_checkbox" for="ConfirmRules">J'ai lu et j'accepte les règles d'utilisations de WishABirthday.com</label><input type="checkbox" name="ConfirmRules" required/>
            <input type="submit" name="submit" value="Créer un compte" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>