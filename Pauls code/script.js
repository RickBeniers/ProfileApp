function login() {
    const usernameOrEmail = document.getElementById('usernameOrEmail').value;
    const password = document.getElementById('password').value;

    if (usernameOrEmail && password) {
        // Voer hier de inlogfunctionaliteit in (bijvoorbeeld controleer in de database)
        // Je kunt AJAX gebruiken om naar de server te sturen.
        alert('Inloggen gelukt!');
    } else {
        alert('Vul alstublieft uw gebruikersnaam/e-mail en wachtwoord in.');
    }
}