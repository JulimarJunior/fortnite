<?php
function loadShop() {
	date_default_timezone_set('America/Sao_Paulo');	

	$hour = date('H:i');

	$json = [];

	if($hour > date('21:00')) {
		$date = date('d-m-Y');
		$name_arq = 'shop/'.$date.'.json';
		$exist = file_exists($name_arq);
		if($exist) {
			$response = file_get_contents($name_arq);
			$json = json_decode($response, true);
			return $json;
			exit;
		} else {
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://fortniteapi.io/v1/shop?lang=pt-BR',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"authorization: [token_de_autorizacao]"
				),
			));

			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			$response = curl_exec($curl);

			curl_close($curl);

			$name_arq = 'shop/'.date('d-m-Y').'.json';
			$fp = fopen($name_arq, 'w');
			fwrite($fp, $response);
			fclose($fp);

			$json = json_decode($response, true);
			return $json;
			exit;
		}
	} else {
		$date = date('d-m-Y');
		$date = date('d-m-Y', strtotime($date. ' - 1 days'));
		$name_arq = 'shop/'.$date.'.json';
		$response = file_get_contents($name_arq);
		$json = json_decode($response, true);

		return $json;
		exit;
	}
}