<footer class="page-footer blue-grey darken-3">
    <div class="container">
        <div class="row">
            <div class="col s6">
                <h5 class="blue-grey-text text-lighten-5 brand-bold">About me</h5>
                <p class="blue-grey-text text-lighten-5 brand-regular">Ce projet a été créée pour le TP du module développement web par Syrine Khelifi FIA2-GL-02.</p>
            </div>
            <div class="col s6">
                <h5 class="blue-grey-text text-lighten-5 brand-bold">Contact us</h5>
                <form action="#" method="POST">
                    <div class="input-field">
                        <input id="e-mail" type="email" class="validate">
                        <label for="e-mail" class="blue-grey-text text-lighten-5 brand-regular">Your E-mail</label>
                    </div>
                    <div class="input-field">
                        <input id="subject" type="text" class="validate">
                        <label for="subject" class="blue-grey-text text-lighten-5 brand-regular">Subject</label>
                    </div>
                    <div class="input-field">
                        <textarea id="message" class="materialize-textarea"></textarea>
                        <label for="message" class="blue-grey-text text-lighten-5 brand-regular">How can we help you?</label>
                    </div>
                    <button class="btn blue-grey darken-3 blue-grey-text text-lighten-5 brand-bold waves-effect waves-light" type="submit" name="send">Send</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-copyright blue-grey darken-4">
        <div class="container">
            © 2021 Syrine Khelifi
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
</footer>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elemsDropdown = document.querySelectorAll('.dropdown-trigger');
    var instancesDropdown = M.Dropdown.init(elemsDropdown, {coverTrigger: false,constrainWidth: false,hover: true});
    
    var elemsSelect = document.querySelectorAll('select');
    var instancesSelect = M.FormSelect.init(elemsSelect, {});

    var elemsTooltip = document.querySelectorAll('.tooltipped');
    var instancesTooltip = M.Tooltip.init(elemsTooltip, {position: top});

    var elemsParallax = document.querySelectorAll('.parallax');
    var instancesParallax = M.Parallax.init(elemsParallax, {});
  });

  </script>
</body>
