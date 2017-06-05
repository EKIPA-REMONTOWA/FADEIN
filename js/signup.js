var counter = 0;
var hintCounter = 1;
var prof1;
var prof2;
var prof3;
function dodajProf(value) {
	var wartosc = $('#profInput').val();
	if(prof1 == null && prof1 != wartosc && prof2 != wartosc && prof3 != wartosc) {
		prof1 = wartosc;
		$('#prof1').val(wartosc);
		counter = 1;
		renderProf(wartosc);
	}
	else if (prof2 == null && prof1 != wartosc && prof2 != wartosc && prof3 != wartosc) {
		prof2 = wartosc;
		$('#prof2').val(wartosc);
		counter = 2;
		renderProf(wartosc);
	} else if (prof3 == null && prof1 != wartosc && prof2 != wartosc && prof3 != wartosc) {
		prof3 = wartosc;
		$('#prof3').val(wartosc);
		counter = 3;
		renderProf(wartosc);
	} else {
		alert(wartosc);
	}
}
function renderProf(requestedProf) {
	var node = document.createElement("div");
	node.setAttribute("class","hint");
	var close = document.createElement("div");
	close.setAttribute("class", "hintClose");
	close.setAttribute("id", "hint"+counter);
	close.setAttribute("onClick", "deleteProf("+counter+")");
	var x = document.createTextNode('x');
	close.appendChild(x);
	node.appendChild(close);
	var t = document.createTextNode(requestedProf);
	node.appendChild(t);
	node.setAttribute("id", "podpowiedz"+counter);
	document.getElementById('profHints').appendChild(node);
}

function deleteProf(val) {
	if (val == 1) {
		var hintHolder = $("#podpowiedz1");
		hintHolder.remove(hintHolder.children[0]);
		var inputHolder = document.getElementById('prof1');
		inputHolder.setAttribute("value","");
		prof1 = null;
	}
	else if (val == 2) {
		var hintHolder = $("#podpowiedz2");
		hintHolder.remove(hintHolder.children[0]);
		var inputHolder = document.getElementById('prof2');
		inputHolder.setAttribute("value","");
		prof2 = null;
	}
	else {
		var hintHolder = $("#podpowiedz3");
		hintHolder.remove(hintHolder.children[0]);
		var inputHolder = document.getElementById('prof3');
		inputHolder.setAttribute("value","");
		prof3 = null;
	}
}

$( function() {
    var availableTags = [
		"agregaciarz",
		"aktor",
		"akustyk",
		"asystent reżysera",
		"autor dialogów",
		"charakteryzator",
		"dekorator",
		"dźwiękowiec",
		"fotograf",
		"kaskader",
		"kierownik produkcji",
		"klapser",
		"kompozytor muzyki",
		"kostiumolog",
		"montażysta",
		"montażysta dźwięku",
		"operator kamery",
		"operator obrazu",
		"operator steadycam-u",
		"operator zdjęć specjalnych",
		"ostrzyciel",
		"oświetleniowiec",
		"perukarz",
		"producent",
		"realizator",
		"rekwizytor",
		"reżyser",
		"scenarzysta",
		"scenograf",
		"statysta",
		"tancerz",
		"wózkarz",
		"tyczkarz"
    ];
    $( "#profInput" ).autocomplete({
      source: availableTags
    });
	  $( "#profInput" ).autocomplete( "option", "autoFocus", true );
} );
