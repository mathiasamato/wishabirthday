<title>Profile | WishABirthday</title>
<section id="profile">
    <p id="profileName"><?= $_SESSION["userInfos"]['Firstname'] . ' ' . $_SESSION["userInfos"]['Lastname'] ?></p>
    <img id="profile_picture" src="assets/medias/pfp/<?= $_SESSION["userInfos"]['Photo'] ?>" alt="image de profil"/>
    <article>
        <div id="buttons">
            <button onclick='readMessages.setAttribute("hidden", ""); sendMessages.removeAttribute("hidden");'>Lui envoyer un message</button>
            <button onclick='sendMessages.setAttribute("hidden", ""); readMessages.removeAttribute("hidden");'>Messages reçus publics</button>
        </div>
        <div hidden id="sendMessages">
            <textarea id="textareaMessage" placeholder="Envoyer un message..."></textarea>
            <div id="checkbox">
                <label id="checkboxLabel" for="checkboxInput">Privé ?</label><input id="checkboxInput" type="checkbox"/>
            </div>
            <button id="sendCommentButton">Envoyer</button>
        </div>
        <div id="readMessages">
            <div id="message">
                <img id="profile_picture" src="assets/medias/like.png" alt="image de profil"/>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula. Sed lobortis quam at lacinia rhoncus. Cras consequat, sem sit amet euismod elementum, ipsum justo mollis libero, a commodo ante dolor vitae leo. Cras vel felis id ipsum lobortis commodo ut a mi. In non leo feugiat, elementum magna sed, rutrum magna. Mauris tincidunt id nunc eget volutpat. Nullam ut cursus ipsum, eu posuere ligula. Pellentesque sit amet tortor commodo, posuere odio in, sodales urna. Praesent ac auctor risus. Fusce ut iaculis urna. Ut vitae est augue. </p>
                    <div id="interaction">
                        <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like"/>
                        <p>0</p>
                    </div>
                    <div id="comments">
                        <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>
                        <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>
                        <textarea></textarea>
                        <button id="sendCommentButton">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script>
        var sendMessages = document.getElementById("sendMessages");
        var readMessages = document.getElementById("readMessages");
    </script>
</section>
