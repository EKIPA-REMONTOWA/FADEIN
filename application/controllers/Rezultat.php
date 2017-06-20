<?php
class Rezultat extends CI_Controller {
	
	function _remap($param) {
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('search_user');
		
		switch($param) {
			case 'u':
				$this->u();
			break;
			case 'f':
				$this->f();
			break;
			case 'l':
				$this->l();
			break;
			case 'c':
				$this->c();
			break;
		}
	}
	
	function przygotuj_dane() {
		//Pobranie argumentu szukania z URL i obsługa szukania.
		$argument_szukania_no_repl = $this->uri->segment(3);
		$this->load->model('search_model');
		$argument_szukania = $this->search_model->replace($argument_szukania_no_repl);
		echo $argument_szukania;
		if (strlen($argument_szukania) < 3) {
			$err_message = array(
									'message'=>'Podaj conajmniej 3 litery w polu szukania.'
			);
			$this->load->view('result_item_fail', $err_message);
			return false;
		} else {
			return $argument_szukania;
		}
	}
	
	function query_validate($req_query) {
		if (gettype($req_query) == 'array') {
			$data = array(
							'wynik'=>$req_query
			);
			$this->load->view('result_item', $data);
			$this->load->view('footer');
		}
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
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		$this->load->model('search_model');
		$query = $this->search_model->szukaj_username($argument_szukania);
		$this->query_validate($query);
		
	}
	function f() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		$this->load->model('search_model');
		$query = $this->search_model->szukaj_first_name($argument_szukania);
		$this->query_validate($query);
	}
	function l() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		$this->load->model('search_model');
		$query = $this->search_model->szukaj_last_name($argument_szukania);
		$this->query_validate($query);
	}
	function c() {
		$argument_szukania = $this->przygotuj_dane();
		if ($argument_szukania == false) {
			return false;
		}
		$this->load->model('search_model');
		$query = $this->search_model->szukaj_profession($argument_szukania);
		$this->query_validate($query);
	}
}
?>