<title>Profile | WishABirthday</title>
<section id="profile">
    <p id="profileName"><?= $_SESSION["userInfos"]['Firstname'] . ' ' . $_SESSION["userInfos"]['Lastname'] ?></p>
    <img id="profile_picture" src="assets/medias/pfp/<?= $_SESSION["userInfos"]['Photo'] ?>" alt="image de profil" />
    <article>
        <div id="buttons">
            <button onclick='readMessages.setAttribute("hidden", ""); sendMessages.removeAttribute("hidden");'>Lui envoyer un message</button>
            <button onclick='sendMessages.setAttribute("hidden", ""); readMessages.removeAttribute("hidden");'>Messages reçus publics</button>
        </div>
        <div hidden id="sendMessages">
            <form method="POST" action="index.php?uc=message&action=target">
                <textarea id="textareaMessage" name="TextToSendToTargetUser" placeholder="Envoyer un message..."></textarea>
                <div id="checkbox">
                    <label id="checkboxLabel" for="checkboxInput">Privé ?</label><input id="checkboxInput" name="IsPrivate" type="checkbox" />
                </div>
                <button id="sendCommentButton">Envoyer</button>
            </form>
        </div>
        <div id="readMessages">
            <?= GetAllPublicReceivedMessagesForUserById($_GET['Id']) ?>
        </div>
    </article>
    <script>
        var sendMessages = document.getElementById("sendMessages");
        var readMessages = document.getElementById("readMessages");
    </script>
</section>