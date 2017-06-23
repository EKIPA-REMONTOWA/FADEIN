<?php 

	class Membership_model extends CI_Model {
		
		
		
		public function check_extension($file, $extensions){
			// Wyciągnij informacje o pliku
			$file_info = pathinfo($file);
			// Jeśli podana zmienna z rozszeżeniami jest tablicą 
			if(is_array($extensions)){
				//Zainicjuj zmienną która będzie zawierać dane czy rozszeżenie
				$result = "";
				// Dla każdej nazwy rozszeżenia z tablicy
				foreach($index as $value){
					// Sprawdz czy podane rozszeżenie jest takie samo jak rozszeżenie pliku i...
					if($file_info["extension"] == $value){
						//zmień zmienną status na TRUE i zakończ pętle
						$result == TRUE;
						return $result;
						break;
					}
				}
			}
			// Jeśli podana zmienna jest stringeim
			elseif(is_string($extensions)){
				// jeśli podane rozszeżenie jest akie samo jak rozszeżenie pliku
				if($file_info['extension'] == $extensions){
					return TRUE;
				}
				// Jeśli rozszeżenia nie są takie same
				else{
					return FALSE;
				}
			}
				
		}
	}

?>