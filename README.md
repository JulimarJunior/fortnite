# Fortnite - Loja 🔫

O sistema foi desenvolvido para treino/teste sem fins lucrativos.

-----

#### Tecnologias utilizadas:
HTML, CSS, PHP e JS (Jquery)
 
#### API
[FortniteAPI.io](https://fortniteapi.io/) - FortniteAPI [Basic]

-----

Os dados da API são solicitados por **curl** e arquivos em um arquivo **.json**, armazenando um histórico das **lojas diárias do Fortnite**.
```sh
// Buscar API
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

// Salvar arquivos
$name_arq = 'shop/'.date('d-m-Y').'.json';
$fp = fopen($name_arq, 'w');
fwrite($fp, $response);
fclose($fp);

// Transformar JSON em ARRAY
$json = json_decode($response, true);
return $json;
```

-----

O projeto ainda está em desenvolvimento e ainda receberá melhorias e novos funcionamentos. 😀
