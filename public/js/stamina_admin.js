var hideAlert = () => {
    let container = document.getElementsByClassName('page');
    let alert = document.getElementsByClassName('alert');
    container[0].getElementsByTagName('article')[0].removeChild(alert[0]);
}

var timeOutAlert = () => {
    setTimeout('hideAlert()', 5000);
}

// Gestion du temps d'affichage du message d'alerte sur la page d'administration.
var adminAlert = document.getElementsByClassName('alert')[0];
if (adminAlert) {
    setTimeout(() => {
        let containerAlert = document.querySelector('article.w-75.mx-auto');
        containerAlert.removeChild(containerAlert.getElementsByClassName('alert')[0]);
    }, 5000);
}