//Funkcja obsługująca zmianę aktywnego guziczka w wyszukiwarce osoba/projekt
function Set_search_status(arg) {
	if (arg == 1) {
		$(search_2).removeClass("active");
		$(search_1).addClass("active");
		$(search_2).attr('value', '0');
		$(search_1).attr('value', '1');
	}
	else if (arg == 2) {
		$(search_1).removeClass("active");
		$(search_2).addClass("active");
		$(search_1).attr('value', '0');
		$(search_2).attr('value', '1');
	}
}