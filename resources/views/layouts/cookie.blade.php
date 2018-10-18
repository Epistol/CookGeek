<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>


<script>

    function setCookie(name, value, expirationInDays) {
        var date = new Date();
        date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
        document.cookie = name + '=' + value + '; ' + 'expires=' + date.toUTCString() +';path=/{{ config('session.secure') ? ';secure' : null }}';
    }

    function cookieExists(name, COOKIE_VALUE) {
        return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
    }


    if(cookieExists('cookie_allowed')) {
        // hideCookieDialog();
        console.log("RGPD OK");
    }
    else {

        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#237afc"
                    },
                    "button": {
                        "background": "#fff",
                        "text": "#237afc"
                    }
                },
                "theme": "edgeless",
                "position": "bottom-left",
                "type": "opt-in",
                "content": {
                    "message": "Test message",
                    "dismiss": "Non merci",
                    "allow": "Autoriser",
                    "link": "Contrôler plus"
                },
                onInitialise: function (status) {
                    var type = this.options.type;
                    var didConsent = this.hasConsented();
                    if (type == 'opt-in' && didConsent) {
                        // enable cookies

                        setCookie("cookie_allowed", true, 90)
                    }
                    if (type == 'opt-out' && !didConsent) {
                        // disable cookies

                        setCookie("cookie_allowed", false, 90)
                    }
                },

                onStatusChange: function(status, chosenBefore) {
                    var type = this.options.type;
                    var didConsent = this.hasConsented();
                    if (type == 'opt-in' && didConsent) {
                        // enable cookies
                        setCookie("cookie_allowed", true, 90)
                    }
                    if (type == 'opt-out' && !didConsent) {
                        // disable cookies
                        setCookie("cookie_allowed", false, 90)

                    }
                },

                onRevokeChoice: function() {
                    var type = this.options.type;
                    if (type == 'opt-in') {
                        // disable cookies
                        setCookie("cookie_allowed", false, 90)

                    }
                    if (type == 'opt-out') {
                        // enable cookies
                        setCookie("cookie_allowed", true, 90)
                    }
                },
            })});
    }

</script>