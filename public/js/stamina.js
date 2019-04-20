var hideAlert = () => {
    let container = document.getElementsByClassName('page');
    let alert = document.getElementsByClassName('alert');
    container[0].removeChild(alert[0]);
}

var timeOutAlert = () => {
    setTimeout('hideAlert()', 5000);
}