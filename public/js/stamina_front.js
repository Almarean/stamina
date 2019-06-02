// Action de déplacement vers la rubrique de l'équipe.
let teamButton = document.getElementById('team-button');
teamButton.onclick = () => {
    document.getElementById('team').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Action de déplacement vers la rubrique des actualités.
let newsButton = document.getElementById('news-button');
newsButton.onclick = () => {
    document.getElementById('news').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

// Action de déplacement vers la rubrique de contact.
let contactButton = document.getElementById('contact-button');
contactButton.onclick = () => {
    document.getElementById('contact').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

// Gestion du temps d'affichage du message d'alerte pour un contact.
var contactAlert = document.getElementById('contact').getElementsByClassName('alert')[0];
if (contactAlert) {
    setTimeout(() => {
        let containerAlert = document.querySelector('#contact article.w-75.mx-auto');
        containerAlert.removeChild(containerAlert.getElementsByClassName('alert')[0]);
    }, 10000);
}

// Gère la visibilité de certains éléments sur la page en fonction de la taille de l'écran.
if (screen.width < 768) {
    document.querySelectorAll('.item-description').forEach(description => {
        description.remove();
    });
    document.getElementById('comment').remove();
    document.getElementById('news-button').remove();
    document.getElementById('team-button').remove();
    document.getElementById('contact-button').remove();
}