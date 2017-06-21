<?php
//Kontroler rezultatu zapytania wyszukiwarki
class Rezultat extends CI_Controller {
	//Zakeżnie od odebranego parametru szukania _remap przekieruje pod wybrany adres...
	function _remap($param) {
		switch($param) {
			//Jeśli szukamy po nazwie użytkownika 'username' =>
			case 'u':
				$this->u();
			break;
			//Jeśli szukamy po nazwie imieniu 'first_name' =>
			case 'f':
				$this->f();
			break;
			//Jeśli szukamy po nazwie nazwisku 'last_name' =>
			case 'l':
				$this->l();
			break;
			//Jeśli szukamy po nazwie profesji 'category' =>
			case 'c':
				$this->c();
			break;
		}
	}
	
	//Funkcja przygotowawcza
	function przygotuj_dane() {
		//Pobranie argumentu szukania z URL i obsługa szukania.
		$argument_szukania_no_repl = $this->uri->segment(3);
		$this->load->model('search_model');
		/* 
			CodeIgniter nie obsługuje natywnie GET'a więc łapiemy poszczególne segmenty URI i przekierowijemy.
			Uruchomienie funkcji własnej w modelu 'search_model' ma na celu naprawienie błedów w stringach, 
			występujących w związku z brakiem obsługi polskich znaków diakrytycznych w adresach URL.
			tj. C582 => ł, C584 => ń itd...
		*/
		$argument_szukania = $this->search_model->replace($argument_szukania_no_repl);
		//Sprawdzenie czy użytkownik podał minimum 3 znaki.
		if (strlen($argument_szukania) < 3) {
			$err_message = array(
									'message'=>'Podaj conajmniej 3 litery w polu szukania.'
			);
			//Wyświetlenie błedu wyszukiwania w ładowanym widoku 'result_item_fail'.
			$this->load->view('result_item_fail', $err_message);
			return false;
		} else {
			//Zwrócenie
			return $argument_szukania;
		}
	}
	
	//Walidacja i renderowanie danych znalezionych przez wyszukiwarkę.
	function query_validate($req_query) {
		//Jeśli zwrócony wynik jest tablicą, to oznacza że wyszukiwanie powiodło się i znaleziono dopasowane rekordy.
		$this->load->view('header');
		$this->load->view('menu');
		if (gettype($req_query) == 'array') {
			$data = array(
							'wynik'=>$req_query
			);
			$this->load->view('result_item', $data);
			$this->load->view('footer');
		}
		//Jeśli zapytanie zwróciło string == komunikat o błędzie, to wyświetlamy nic innego jak komunikat o błędzie >-<
		else if (gettype($req_query) == 'string') {
			$data_err = array(
								'message'=>$req_query
			);
			$this->load->view('result_item_fail', $data_err);
			$this->load->view('footer');
		}
	}
	
	//Szukaj nazwy użytkownika.
	function u() {
		//Wysyłamy odebranego stringa do funkcji przygotowawczej.
		$argument_szukania = $this->przygotuj_dane();
		//Jeśli użytkownik nie wpisał conajmniej 3 znaków zwróć fałsz.
		if ($argument_szukania == false) {
			return false;
		}
		else {
			//Załadowanie modelu szukania, i uruchomienie funkcji.
			$this->load->model('search_model');
			$query = $this->search_model->szukaj_username($argument_szukania);
			//Walidacja odebranych danych.
			$this->query_validate($query);
		}
	}
	function f() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		else {
			$this->load->model('search_model');
			$query = $this->search_model->szukaj_first_name($argument_szukania);
			$this->query_validate($query);
		}
	}
	function l() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		else {
			$this->load->model('search_model');
			$query = $this->search_model->szukaj_last_name($argument_szukania);
			$this->query_validate($query);
		}
	}
	function c() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		else {
			$this->load->model('search_model');
			$query = $this->search_model->szukaj_profession($argument_szukania);
			$this->query_validate($query);
		}
	}
}
?>