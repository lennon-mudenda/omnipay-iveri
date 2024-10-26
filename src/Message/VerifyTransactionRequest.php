<?php

namespace Omnipay\IVeri\Message;

use Dpo\Common\Dpo;
use SimpleXMLElement;
use Omnipay\Common\Exception\InvalidRequestException;

class VerifyTransactionRequest extends BaseRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('transactionToken');

        return [
			'companyToken' => $this->getCompanyToken(),
			'transToken' => $this->getTransactionToken(),
		];
    }

    public function sendData($data): Response
    {
		$data['redirect'] = false;
		try {
			$dpoClient = new Dpo($this->getTestMode());

			$response = $dpoClient->verifyToken($data);

			$xml = new SimpleXMLElement($response);

			$code = $xml->xpath('Result')[0]->__toString();
			$message = $xml->xpath('ResultExplanation')[0]->__toString();

			$data['metadata'] = [
				'result' => $code,
				'message' => $message,
			];

			if (in_array($code, ['000', '001', '002'])) {
				$data['success'] = true;
				$data['message'] = "Success";
			} else {
				throw new \Exception(
					$message
				);
			}
		} catch (\Exception $exception) {
			$errorMessage = $exception->getMessage();

			$data['success'] = false;
			$data['message'] = "Failure: $errorMessage";
		}

		return $this->response = new Response($this, $data);
    }
}
