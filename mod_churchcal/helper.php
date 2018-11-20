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
	public $cookies = array();
	
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

	public static function sendRequest($url, $data) {
  		$options = array(
    		'http'=>array(
//      			'header' => "Cookie: ". modChurchCalHelper::getCookies() . "\r\nContent-type: application/x-www-form-urlencoded\r\n",
      			'method' => 'POST',
      			'content' => http_build_query($data),
    		)
  		);
  		$context = stream_context_create($options);
  		$result = file_get_contents($url, false, $context);
  		$obj = json_decode($result);
  		if ($obj->status == 'error') {
    		echo "There is an error: $obj->message";
    		exit;
  		}
//  		modChurchCalHelper::saveCookies($http_response_header);
  		return $obj;
	}
}