<title>Se connecter | WishABirthday</title>
<section>
   <div id="form" class="col-12">
        <p style="color: red; font-size: 25px;"><?= $_SESSION['error'] ?></p>
        <form method="POST" action="index.php?uc=login&action=send"><br>
            <input type="email" name="email" placeholder="Entrer un email" value="<?= $_SESSION['userInfos']['email'] ?>" required /><br>
            <input type="password" name="password" placeholder="Entrer un mot de passe" required /><br>
            <p style="color: black;">Se souvenir de moi</p><input style="margin-top: -1vh;" type="checkbox" name="remember_me_checkbox"/>
            <input type="submit" name="submit" value="Se connecter" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>