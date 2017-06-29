//Funkcja obsługująca zmianę aktywnego guziczka w wyszukiwarce osoba/projekt
function Set_search_status(arg) {
	if (arg == 1) {
		$(search_2).removeClass("active");
		$(search_1).addClass("active");
		$(zSzukania).attr('value',0);
		$(sel1).empty();
		$(zSzukania).attr('value',0);
		var opcjeSzukaniaUser = ["Nazwa użytkownika", "Profesja", "Imię", "Nazwisko"];
		opcjeSzukaniaUser.forEach(listuj);
	}
	else if (arg == 2) {
		$(search_1).removeClass("active");
		$(search_2).addClass("active");
		$(zSzukania).attr('value',1);
		$(sel1).empty();
		var opcjeSzukaniaProj = ["Tytuł", "Twórca", "Gatunek"];
		opcjeSzukaniaProj.forEach(listuj);
	}
	
	function listuj(item, index) {
			var opcja = document.createElement('option');
			var txt = document.createTextNode(item);
			opcja.setAttribute('value', index);
			opcja.appendChild(txt);
			$(sel1).append(opcja);
		}
}

//Funkcja dodawania do znajomych
function dodajZnajomego(req_id_user) {
	$.ajax({
			type: 'POST',
			url: "/index.php/Poczta/dodaj_znajomego",
			dataType: 'json',
			data: {id_user: req_id_user},
			success: function(res){
				showSuccessLog(res);
			}
	});
	function showSuccessLog(res) {
		window.alert(res);
	}
}