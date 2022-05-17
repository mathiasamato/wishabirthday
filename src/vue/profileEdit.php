<title><?= $_SESSION['userInfos']['Firstname'] . ' ' . $_SESSION['userInfos']['Lastname']?> | WishABirthday</title>
<section style="overflow: auto; max-height: 920px;">
   <div id="form" class="col-12">
       <p style="color: red; font-size: 25px;"><?= $_SESSION['error']['edit'] ?></p>
        <form method="POST" action="index.php?uc=profile&action=editconfirm" enctype="multipart/form-data">
            <input style="color: black;" accept="image/png, image/jpeg, image/jpg, image/gif" type="file" name="ProfilePicture" /><br>
            <input type="text" name="newLastname" placeholder="Modifier le nom" value="<?= $_SESSION['newUserInfos']['Lastname'] ?>" /><br>
            <input type="text" name="newFirstname" placeholder="Modifier le prénom" value="<?= $_SESSION['newUserInfos']['Firstname'] ?>" /><br>
            <input type="email" name="newEmail" placeholder="Modifier l'email" value="<?= $_SESSION['newUserInfos']['Email'] ?>" style="color: #A0A0A0;" readonly /><br>
            <input type="date" name="newDateBirth" placeholder="Modifier la date de naissance" value="<?= $_SESSION['newUserInfos']['DoB'] ?>" /><br>
            <select style="background-color: #EAEAEA; width: 80vw;" name="newLanguageSelect">
                <option name="1" value="1">Français</option>
                <option name="2" value="2">Anglais</option>
            </select><br>
            <input type="password" name="currentPassword" placeholder="Entrer le mot de passe actuel (nécessaire pour modifier les informations)" required /><br>
            <input type="password" name="newPassword" placeholder="Entrer un nouveau mot de passe" /><br>
            <input type="password" name="newConfirmPassword" placeholder="Confirmer le nouveau mot de passe" /><br>
            <input type="submit" name="submit" value="Confirmer les modifications" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>