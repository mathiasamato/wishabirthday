<title>Se connecter | WishABirthday</title>
<section>
   <div id="form" class="col-12">
        <p style="color: red; font-size: 25px;"><?= $_SESSION['error']['login'] ?></p>
        <form method="POST" action="index.php?uc=login&action=send"><br>
            <input type="email" name="Email" placeholder="Entrer un email" value="<?= $_SESSION['userInfos']['email'] ?>" required /><br>
            <input type="password" name="Password" placeholder="Entrer un mot de passe" required /><br>
            <p style="color: black;">Se souvenir de moi</p><input style="margin-top: -1vh;" type="checkbox" name="rememberMeCheckbox"/>
            <input type="submit" name="Submit" value="Se connecter" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>