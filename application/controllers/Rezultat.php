<?php
//Kontroler rezultatu zapytania wyszukiwarki
class Rezultat extends CI_Controller {
	//Zakeżnie od odebranego parametru szukania _remap przekieruje pod wybrany adres...
	function index($parm = FALSE, $arg = FALSE) {
		if ($parm != FALSE && $arg !=FALSE) { 
			if ($parm == 'u' || $parm == 'c' || $parm == 'f' || $parm == 'l' || $parm == 't' || $parm == 'a' || $parm == 'g') {
				$this->load->model('search_model');
				$req_replaced_arg = $this->search_model->replace($arg);
				if(strlen($req_replaced_arg) < 3) {
					$err_message = array(
									'message'=>'Podaj conajmniej 3 litery w polu szukania.'
					);
					$this->load->view('header');
					$this->load->view('menu');
					$this->load->view('rezultaty_wyszukiwan/result_item_fail', $err_message);
					$this->load->view('footer');
				}
				else {
					$this->load->model('search_model');
					$query = $this->search_model->szukaj($parm, $req_replaced_arg);
					if (gettype($query) == 'array') {
						$this->load->view('header');
						$this->load->view('menu');
						if ($parm == 'u' || $parm == 'c' || $parm == 'f' || $parm == 'l') {
							$data = array(
								'wynik'=>$query
							);
							$this->load->view('rezultaty_wyszukiwan/result_item', $data);
						}
						else {
							$data = array(
								'wynik'=>$query
							);
							$this->load->view('rezultaty_wyszukiwan/result_item_proj', $data);
						}
					$this->load->view('footer');
					}
					else if (gettype($query) == 'string') {
						$this->load->view('header');
						$this->load->view('menu');
						$data_err = array(
											'message'=>$query
						);
						$this->load->view('rezultaty_wyszukiwan/result_item_fail', $data_err);
						$this->load->view('footer');
					}
				}
			}
			else {
				show_error('Podany parametr wyszukiwania jest nieprawidłowy!');
			}
		}
		else {
			show_404();
		}
	}
}
?>