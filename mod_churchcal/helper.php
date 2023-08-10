<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_churchcal
 *
 * @copyright   Copyright (C) 2018 Ulrich Rueth, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 defined('_JEXEC') or die;

 use Joomla\CMS\Http\HttpFactory;

class ModChurchCalHelper
{
//	public $cookies = array();
	
	public static function getCookies() {
  		global $cookies;
  		$res = "";
  		foreach ($cookies as $key => $cookie) {
    		$res .= "$key=$cookie; ";
  		}
  		return $res;
	}

	public static function saveCookies($r) {
  		global $cookies;
  		foreach ($r as $hdr) {
    		if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
      			parse_str($matches[1], $tmp);
      			$cookies += $tmp;
    		}
  		}
	}

	public static function sendRequest($url, $data, $apicalkey) {
		// Get HTTP Factory.
		$http = HttpFactory::getHttp();
	
		// Setzen der Header für die Anfrage
		$headers = array(
			'Authorization' => $apicalkey,
			'content-type' => 'application/json'
		);

		//echo 'Authorization:' . $apicalkey;		

		// Basis-URL für den REST-Aufruf
		$baseURL = $url;

		// Generiere den Query-String aus den Parametern
		$queryString = http_build_query($data);

		// Füge den Query-String zur Basis-URL hinzu
		$fullURL = $baseURL . '?' . $queryString;


		// API-Anfrage durchführen
		$response = $http->get($fullURL, $headers);
		//echo $response->body;
	
		//print_r($response); // Zeigt den Inhalt des Response-Objekts an
		// Oder
		//var_dump($response); // Gibt eine detaillierte Darstellung des Response-Objekts aus
		

		// Überprüfen auf Fehler
		if ($response->code != 200) {
			echo 'Fehler: ' . $response->message;
			//echo 'Code: ' . $response->code;
		} else {
			$obj = json_decode($response->body);
			if ($obj->status == 'error') {
				echo "Fehler: $obj->message";
				exit;
			}
			return $obj;
		}
	}

}