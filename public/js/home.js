let teamButton = document.getElementById('team-button');
teamButton.onclick = () => {
    document.getElementById('team').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

let newsButton = document.getElementById('news-button');
newsButton.onclick = () => {
    document.getElementById('news').scrollIntoView({ behavior: 'smooth', block: 'center' });
}