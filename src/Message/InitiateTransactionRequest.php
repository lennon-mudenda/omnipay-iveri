<?php

namespace Omnipay\IVeri\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class InitiateTransactionRequest extends BaseRequest
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('amount');

        return [
            'redirect' => true,
            'success' => false
        ];
    }

    public function sendData($data = []): Response
    {
		return $this->response = new Response($this, $data);
    }
}
