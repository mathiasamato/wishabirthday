<title>Profile | WishABirthday</title>
<section id="profile">
    <!--<form method="POST" action="index.php?uc=profile&action=edit">
        <input type="submit" value="Modifier les informations" name="edit_profile"/>
    </form>-->
    <p id="profileName">Page personnelle</p>
    <img id="profile_picture" src="assets/medias/pfp/image.jpg" alt="image de profil"/>
    <article>
        <div id="buttons">
            <button onclick='receivedMessages.setAttribute("hidden", ""); sentMessages.removeAttribute("hidden");'>Messages envoyés</button>
            <button onclick='sentMessages.setAttribute("hidden", ""); receivedMessages.removeAttribute("hidden");'>Messages reçus</button>
        </div>
        <div id="sentMessages">
            <div id="message">
                <img id="profile_picture" src="assets/medias/pfp/image.jpg" alt="image de profil"/>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula. Sed lobortis quam at lacinia rhoncus. Cras consequat, sem sit amet euismod elementum, ipsum justo mollis libero, a commodo ante dolor vitae leo. Cras vel felis id ipsum lobortis commodo ut a mi. In non leo feugiat, elementum magna sed, rutrum magna. Mauris tincidunt id nunc eget volutpat. Nullam ut cursus ipsum, eu posuere ligula. Pellentesque sit amet tortor commodo, posuere odio in, sodales urna. Praesent ac auctor risus. Fusce ut iaculis urna. Ut vitae est augue. </p>
                    <div id="interaction">
                        <img id="likeButton" src="assets/medias/like.png" alt="image du bouton like"/>
                        <p>0</p>
                    </div>
                    <div id="comments">
                        <p> > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non metus eget lectus volutpat hendrerit. Suspendisse vitae justo vel velit suscipit porttitor et non ligula</p>
                        <textarea></textarea>
                        <button id="sendCommentButton">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
        <div hidden id="receivedMessages">
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
                        <textarea></textarea>
                        <button id="sendCommentButton">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script>
        var sentMessages = document.getElementById("sentMessages");
        var receivedMessages = document.getElementById("receivedMessages");
    </script>
</section>


