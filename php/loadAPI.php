<?php
function loadShop() {
	date_default_timezone_set('America/Sao_Paulo');	// Define o horario brasileiro

	$hour = date('H:i'); $date = ''; $json = []; // Cria e atribui as variaveis

	if($hour > date('21:00')) { // Verifica o horario atual
		$date = date('d-m-Y'); // Salva o dia de hoje caso seja necessario
	} else {
		$date = date('d-m-Y', strtotime($date. ' - 1 days')); // Salva o dia de ONTEM caso seja necessario
	}

	$name_arq = 'shop/'.$date.'.json'; // Salva o nome do arquivo baseado na data

	$exist = file_exists($name_arq); // Verifica se o arquivo existe
	if($exist) { // Obtem os dados do arquivo caso ele exista e exibe na tela
		$response = file_get_contents($name_arq);
		$json = json_decode($response, true);
		return $json;
	} else { // Faz a requisicao a API, salva em um arquivo e exibe na tela caso nao exista
		$response = requestAPI();
		$fp = fopen($name_arq, 'w');
		fwrite($fp, $response);
		fclose($fp);
		$json = json_decode($response, true);
		return $json;
	} // Obtem os dados da loja para exibir na tela 
}

function requestAPI() { // Faz a requisicao a API
	$curl = curl_init(); // Inicia uma CURL

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://fortniteapi.io/v1/shop?lang=pt-BR', // Site da API
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET", // Metodo de Requisicao
			CURLOPT_HTTPHEADER => array(
				"authorization: [token_de_autorizacao]" // Token de autorizacao
			),
		));
 		// Desativa as verificacoes de SSL
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$response = curl_exec($curl); // Executa o CURL

	curl_close($curl); // Finaliza o CURL

	return $response; // Retorna os dados da API
}
