<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if ( ! function_exists('count_visitor')) {

    function count_visitor(){
        $nama_bulan = date("F", strtotime(date("Y")."-".date("m")."-01"));
		$array_bulan = json_decode(file_get_contents(APPPATH . 'logs/counter.txt'),true);
		foreach ($array_bulan as $key => $value) {
			if($key == $nama_bulan){
				$array_bulan[$key] = $array_bulan[$key]+1;
			}
		}
		$bulan = json_encode($array_bulan);
		$file_bulan_counter = (APPPATH . 'logs/counter.txt');
		$file=fopen($file_bulan_counter, 'w');
        fputs($file,$bulan);
        fclose($file);
        return $array_bulan;
    }

    function get_visitor(){
        $array_bulan = json_decode(file_get_contents(APPPATH . 'logs/counter.txt'),true);
        return $array_bulan;
    }
}
