<title>Profile | WishABirthday</title>
<section id="profile">
    <!--<form method="POST" action="index.php?uc=profile&action=edit">
        <input type="submit" value="Modifier les informations" name="edit_profile"/>
    </form>-->
    <p id="profileName"><?= $_SESSION["userInfos"]['Firstname'] . ' ' . $_SESSION["userInfos"]['Lastname'] ?></p>
    <img id="profile_picture" src="assets/medias/pfp/<?= $_SESSION["userInfos"]['Photo'] ?>" alt="image de profil"/>
    <article>
        <div id="buttons">
            <button onclick='receivedMessages.setAttribute("hidden", ""); sentMessages.removeAttribute("hidden");'>Messages envoyés</button>
            <button onclick='sentMessages.setAttribute("hidden", ""); receivedMessages.removeAttribute("hidden");'>Messages reçus</button>
        </div>
        <div id="sentMessages">
            <?= GetAllSentMessagesFromUserById($_GET['Id']) ?>
        </div>
        <div hidden id="receivedMessages">
            <?= GetAllPublicReceivedMessagesForUserById($_GET['Id']) ?>
        </div>
    </article>
    <script>
        var sentMessages = document.getElementById("sentMessages");
        var receivedMessages = document.getElementById("receivedMessages");
    </script>
</section>


