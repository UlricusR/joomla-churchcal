<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_churchcal
 *
 * @copyright   Copyright (C) 2018 Ulrich Rueth, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;

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

	public static function sendRequest($url, $data, $calpikey) {

    // Erstellen des HTTP-Objekts
    $http = \Joomla\Http\HttpFactory::getHttp();

    // Setzen der Header für die Anfrage
    $headers = array(
        'Authorization' => $apicalkey,
        'Accept' => 'application/json'
    );

    // API-Anfrage durchführen
    $response = $http->get($url, $data, $headers);

    // Überprüfen auf Fehler
    if ($response->code != 200) {
        echo 'Fehler: ' . $response->message;
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