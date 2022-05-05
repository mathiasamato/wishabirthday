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
                <div id="message">
                    <img id="profile_picture" src="assets/medias/like.png" alt="image de profil" />
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula. Sed lobortis quam at lacinia rhoncus. Cras consequat, sem sit amet euismod elementum, ipsum justo mollis libero, a commodo ante dolor vitae leo. Cras vel felis id ipsum lobortis commodo ut a mi. In non leo feugiat, elementum magna sed, rutrum magna. Mauris tincidunt id nunc eget volutpat. Nullam ut cursus ipsum, eu posuere ligula. Pellentesque sit amet tortor commodo, posuere odio in, sodales urna. Praesent ac auctor risus. Fusce ut iaculis urna. Ut vitae est augue. </p>
                        <div id="interaction">
                            <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like" />
                            <p>0</p>
                        </div>
                    </div>
                </div>
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