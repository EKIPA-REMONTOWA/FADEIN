<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('przygotuj_dane'))
{
    function przygotuj($arg)
    {
        $this->load->model('search_model');
		$req_validated_arg = $this->search_model($arg);
		return $req_validated_arg;
		
    } 
}
?>