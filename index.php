<?php

$method = $_Server['REQUEST_METHOD'];

// Process only when method is POST
if($_method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->text;

	switch ($text) 
	{
		case 'hi':
			$speech = 'Hi, Nice to meet you';
			break;

		case 'bye':
			$speech = 'Bye, Good Night';
			break;	

		case 'anything':
			$speech = 'Yes, you can type anything here';
			break;	
		
		default:
			$speech = 'Sorry, I did not get that. Please ask me something else';
			break;
	}
	
	$response = new \stdClass();
	$response->speech = "";
	$response->dispayText = "";
	$response->source = "webhook";

	echo json_encode($response);  
}

else
{
	echo "Method not allowed";
}

?>