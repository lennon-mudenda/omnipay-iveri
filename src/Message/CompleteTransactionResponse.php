<?php

namespace Omnipay\IVeri\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;


class CompleteTransactionResponse extends AbstractResponse implements ResponseInterface
{
    const SUCCESS_CODE = 0;

    public function isSuccessful(): bool
    {
        return $this::SUCCESS_CODE === $this->request->getStatusCode();
    }

    public function getTransactionReference(): ?string
    {
        return $this->request->getTransactionToken();
    }

    public function getMessage(): string
    {
        switch ($this->request->getStatusCode()) {
            case 0:
                return 'Iveri Lite complete payment.';
            case 1:
            case 2:
            case 5:
            case 9:
            case 255:
                return 'Payment error: Please try again later ' . $this->request->getPaymentDescription();
            default:
                return 'Payment failed: '. $this->request->getPaymentDescription();
        }
    }

    public function getCode()
    {
        return $this->request->getStatusCode();
    }
}
