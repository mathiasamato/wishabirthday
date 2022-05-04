<title><?= $_SESSION['userInfos']['firstname'] . ' ' . $_SESSION['userInfos']['lastname']?> | WishABirthday</title>
<section style="overflow: auto; max-height: 920px;">
   <div id="form" class="col-12">
       <p style="color: red; font-size: 25px;"><?= $_SESSION['error'] ?></p>
        <form method="POST" action="index.php?uc=profile&action=editconfirm" enctype="multipart/form-data">
            <input style="color: black;" accept="image/png, image/jpeg, image/jpg, image/gif" type="file" name="file_to_upload" /><br>
            <input type="text" name="new_lastname" placeholder="Modifier le nom" value="<?= $_SESSION['new_user_infos']['lastname'] ?>" /><br>
            <input type="text" name="new_firstname" placeholder="Modifier le prénom" value="<?= $_SESSION['new_user_infos']['firstname'] ?>" /><br>
            <input type="email" name="new_email" placeholder="Modifier l'email" value="<?= $_SESSION['new_user_infos']['email'] ?>" /><br>
            <input type="date" name="new_date_birth" placeholder="Modifier la date de naissance" value="<?= $_SESSION['new_user_infos']['birthdate'] ?>" /><br>
            <textarea name="new_description" style="resize: none; width: 82%; height: 15%; font-size: 15px;" placeholder="Bio..."><?= $_SESSION['new_user_infos']['description'] ?></textarea><br>
            <input type="password" name="current_password" placeholder="Entrer le mot de passe actuel (nécessaire pour modifier les informations)" required /><br>
            <input type="password" name="new_password" placeholder="Entrer un nouveau mot de passe" /><br>
            <input type="password" name="new_confirm_password" placeholder="Confirmer le nouveau mot de passe" /><br>
            <input type="submit" name="submit" value="Confirmer les modifications" style="background-color: #CACACA;" /><br>
        </form>
    </div>
</section>