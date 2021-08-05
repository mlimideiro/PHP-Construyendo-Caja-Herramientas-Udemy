function abrirMenu() {
    var menu = document.getElementById('miMenuSuperior');
    if ( menu.className === 'menuSuperior' ) {
        menu.className += ' responsive';
    } else {
        menu.className = 'menuSuperior';
    }
}