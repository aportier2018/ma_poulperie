window.addEventListener("load", function () {
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#237afc",
                "text": "#000"
            },
            "button": {
                "background": "#fff",
                "text": "#237afc"
            }
        },
        "showLink": false,
        "theme": "classic",
        "content": {
            "message": "En poursuivant votre navigation sur le site, vous acceptez l’utilisation de cookies.",
            "dismiss": "J'accepte"
        }
    })
});