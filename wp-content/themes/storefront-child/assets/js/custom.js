var rechercher = document.getElementById('rechercher')
var btnRechercher = document.getElementById('btnRechercher')
var btnMenu = document.getElementById('btnMenu')
var nav = document.getElementById('site-navigation')
var menu = document.getElementById('menu-navigation')

btnRechercher.addEventListener('click', function() {
  if(rechercher.style.display === 'none') {
		rechercher.style.display = 'block'
	}
	else {
		rechercher.style.display = 'none'
	}
})

btnMenu.addEventListener('click', function() {
  if(nav.classList.contains('toggled')) {
		nav.classList.remove('toggled')
	  	menu.setAttribute('aria-expanded', 'false');
	}
	else {
		nav.classList.add('toggled')
		menu.setAttribute('aria-expanded', 'true');
	}
})

	