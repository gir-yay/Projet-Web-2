const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})



//affichage profile

document.getElementById('profile-link').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('profile-section').style.display = 'block';
    document.getElementById('profile-section').innerHTML = '<div class="container"><div class="row align-items-center flex-row-reverse"><div class="col-lg-6"><div class="about-text go-to"><h3 class="dark-color">Profile</h3><h6 class="theme-color lead">Bio</h6><p>{{ $user->bio }}</p><div class="row about-list"><div class="col-md-6"><div class="media"><label>Nom</label><p>{{ $user->nom }}</p></div><div class="media"><label>Prenom</label><p>{{ $user->prenom }}</p></div></div><div class="col-md-6"><div class="media"><label>E-mail</label><p>{{ $user->email }}</p></div><div class="media"><label>Métier</label><p>{{ $user->metier }}</p></div></div></div></div></div><div class="col-lg-6"><div class="about-avatar"><img src="{{ asset($user->photo) }}" title alt width="50%" ></div></div></div><div class="counter"><div class="row"><div class="col-6 col-lg-3"><div class="count-data text-center"><h6 class="count h2" data-to="500" data-speed="500">2</h6><p class="m-0px font-w-600">Services</p></div></div><div class="col-6 col-lg-3"><div class="count-data text-center"><h6 class="count h2" data-to="150" data-speed="150">4.2</h6><p class="m-0px font-w-600">Rank</p></div></div><div class="col-6 col-lg-3"><div class="count-data text-center"><h6 class="count h2" data-to="850" data-speed="850">10</h6><p class="m-0px font-w-600">Nombre de commentaires</p></div></div><div class="col-6 col-lg-3"><div class="count-data text-center"><h6 class="count h2" data-to="190" data-speed="190">5</h6><p class="m-0px font-w-600">Nombres de Demandes</p></div></div></div></div></div>';
});