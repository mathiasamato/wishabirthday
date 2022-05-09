<title>Accueil | WishABirthday</title>
<section>
    <article id="homeContent">
        <aside>
            <h2>bon anniversaire !</h2>
            <div id="smallSearchForm">
                <form method="POST" action="index.php?uc=home">
                    <div id="smallSearchFormNoButton">
                        <input type="text" name="searchBar" value="<?= $_POST["searchBar"] ?>" />
                        <select name="languageSelect">
                            <option <?php if ($_POST["languageSelect"] == 1) echo 'selected="selected"'; ?> name="1" value="1">Français</option>
                            <option <?php if ($_POST["languageSelect"] == 2) echo 'selected="selected"'; ?> name="2" value="2">Anglais</option>
                        </select>
                    </div>
                    <input style="height: 92px;" id="sendSearchButton" type="submit" value="Rechercher"></button>
                </form>
            </div>
            <div id="users">
                <?= DisplayUsersWithBirthdayToday(); ?>
            </div>
        </aside>
        <div id="homeColumn">
            <div id="lastTenMessages">
                <?= GetAndDisplay10LastPublicMessagesSent(); ?>
            </div>
            <div id="homeSendRandomMessage">
                <form method="POST" action="index.php?uc=message&action=random">
                    <textarea name="TextToSendToRandomUser" placeholder="Envoyer un message..."></textarea>
                    <div id="checkbox">
                        <label id="checkboxLabel" for="checkboxInput">Privé ?</label><input name="IsPrivate" id="checkboxInput" type="checkbox" />
                    </div>
                    <input type="submit" id="sendCommentButton">
                </form>
            </div>
        </div>
    </article>
</section>