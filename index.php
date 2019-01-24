<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST')
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->text;

	switch ($text) 
	{
		case 'hi':
			$fulfillmentText = "Hi, Nice to meet you";
			break;

		case 'bye':
			$fulfillmentText = "Bye, good night";
			break;

		case 'anything':
			$fulfillmentText = "Yes, you can type anything here.";
			break;
			
		case 'What is an EMI?':
			$fulfillmentText = "You repay the loan in Equated Monthly Installments (EMIs) comprising both principal and interest. Repayment by way of EMI starts from the month following the month in which you take full disbursement
";
			break;	
			
		case 'What is NEFT?':
			$fulfillmentText = " National Electronic Funds Transfer (NEFT) is a nation-wide payment system facilitating one-to-one funds transfer. Under this Scheme, individuals, firms and corporates can electronically transfer funds from any bank branch to any individual, firm or corporate having an account with any other bank branch in the country participating in the Scheme.
";
			break;	
			
		case ' Are all bank branches in the country part of the NEFT funds transfer network?':
			$fulfillmentText = "For being part of the NEFT funds transfer network, a bank branch has to be NEFT- enabled. The list of bank-wise branches which are participating in NEFT is provided in the website of Reserve Bank of India at http://www.rbi.org.in/scripts/neft.aspx
";
			break;	
			
		case 'Who can transfer funds using NEFT?':
			$fulfillmentText = "Individuals, firms or corporates maintaining accounts with a bank branch can transfer funds using NEFT. Even such individuals who do not have a bank account (walk-in customers) can also deposit cash at the NEFT-enabled branches with instructions to transfer funds using NEFT. However, such cash remittances will be restricted to a maximum of ₹ 50,000/- per transaction. Such customers have to furnish full details including complete address, telephone number, etc. NEFT, thus, facilitates originators or remitters to initiate funds transfer transactions even without having a bank account.
";
			break;
			
		case 'Who can receive funds through the NEFT system?':
			$fulfillmentText = "Individuals, firms or corporates maintaining accounts with a bank branch can receive funds through the NEFT system. It is, therefore, necessary for the beneficiary to have an account with the NEFT enabled destination bank branch in the country. The NEFT system also facilitates one-way cross-border transfer of funds from India to Nepal. This is known as the Indo-Nepal Remittance Facility Scheme. A remitter can transfer funds from any of the NEFT-enabled branches in India to Nepal, irrespective of whether the beneficiary in Nepal maintains an account with a bank branch in Nepal or not. The beneficiary would receive funds in Nepalese Rupees.
";
			break;	
		
		default:
			$fulfillmentText = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	//$response->speech = $speech;
	$response->fulfillmentText = $fulfillmentText;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
