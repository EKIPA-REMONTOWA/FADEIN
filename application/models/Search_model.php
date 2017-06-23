<?php
	//Model wyszukujący.
	class Search_model extends CI_Model {
		
		
		
		function szukaj($parm, $arg) {
			$czego_szukamy;
			if($parm == 'u' || $parm == 'f' || $parm == 'l' || $parm == 'c') { 
				$czego_szukamy = 'users';
			}
			else {
				$czego_szukamy = 'projects';
			}
			$parametry = array(
								'u' => 'username',
								'f' => 'first_name',
								'l' => 'last_name',
								't' => 'title',
								'a' => 'creator',
								'g' => 'category',
								'c' => array('profesja1','profesja2','profesj3')
			);
			foreach($parametry as $key => $value) {
				if ($key == $parm) {
					$parm = $value;
				}
				else if($parm == 'c') {
					$this->db->select('*')->like('profesja1', $arg);
					$this->db->or_like('profesja2', $arg);
					$this->db->or_like('profesja3', $arg);
					$result = $this->db->get('users');
					$wynik = $this->sprawdz_zapytanie($result);
					return $wynik;
				}
			}
			$this->db->select('*')->like($parm, $arg);
			$result = $this->db->get($czego_szukamy);
			$wynik = $this->sprawdz_zapytanie($result);
			return $wynik;
		}
		
		function sprawdz_zapytanie($req_result) {
			//Jeśli znajdziemy dopasowania w bazie...
			if ($req_result->num_rows() > 0) {
				return $req_result->result_array();
			}
			//Jaśli dopasowań nie znajdziemy...
			else {	
				return 'Nie znaleziono żadnych wyników.';
			}
		}
		//Funkcja naprawiająca polskie litery z URL'a.
		function replace($requested_str) {
			$kody = array();
				$kody[0] = '/%C4%85/';
				$kody[1] = '/%C4%87/';
				$kody[2] = '/%C4%99/';
				$kody[3] = '/%C5%82/';
				$kody[4] = '/%C5%84/';
				$kody[5] = '/%C3%B3/';
				$kody[6] = '/%C5%9B/';
				$kody[7] = '/%C5%BA/';
				$kody[8] = '/%C5%BC/';
				$kody[9] = '/%C4%84/';
				$kody[10] = '/%C4%86/';
				$kody[11] = '/%C4%98/';
				$kody[12] = '/%C5%81/';
				$kody[13] = '/%C5%83/';
				$kody[14] = '/%C3%93/';
				$kody[15] = '/%C5%9A/';
				$kody[16] = '/%C5%B9/';
				$kody[17] = '/%C5%BB/';
			
			$znaki = array();
				$znaki[0] = 'ą';
				$znaki[1] = 'ć';
				$znaki[2] = 'ę';
				$znaki[3] = 'ł';
				$znaki[4] = 'ń';
				$znaki[5] = 'ó';
				$znaki[6] = 'ś';
				$znaki[7] = 'ź';
				$znaki[8] = 'ż';
				$znaki[9] = 'Ą';
				$znaki[10] = 'Ć';
				$znaki[11] = 'Ę';
				$znaki[12] = 'Ł';
				$znaki[13] = 'Ń';
				$znaki[14] = 'Ó';
				$znaki[15] = 'Ś';
				$znaki[16] = 'Ź';
				$znaki[17] = 'Ż';
			return preg_replace($kody, $znaki, $requested_str);
		}
	} 
?>



