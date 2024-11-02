<?php

namespace Omnipay\IVeri\Message;

use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\AbstractRequest;

class CompleteTransactionRequest extends AbstractRequest implements ClientInterface
{
    public function getStatusCode(): ?int
    {
        return $this->getParameter('statusCode');
    }

    public function setStatusCode(?int $statusCode): void
    {
        $this->setParameter('statusCode', $statusCode ?? null);
    }

    public function getPaymentDescription(): ?string
    {
        return $this->getParameter('paymentDescription');
    }

    public function setPaymentDescription(?string $paymentDescription): void
    {
        $this->setParameter('paymentDescription', $paymentDescription ?? null);
    }

    public function getSuccessful(): int
    {
        return $this->getParameter('successful');
    }

    public function setSuccessful(?int $successful = 0): void
    {
        $this->setParameter('successful', $successful ?? 0);
    }

    public function getFailed(): int
    {
        return $this->getParameter('failed');
    }

    public function setFailed(?int $failed = 0): void
    {
        $this->setParameter('failed', $failed ?? 0);
    }

    public function getTryLater(): int
    {
        return $this->getParameter('try_later');
    }

    public function setTryLater(?int $tryLater = 0): void
    {
        $this->setParameter('try_later', $tryLater ?? 0);
    }

    public function getIsPaymentError(): int
    {
        return $this->getParameter('is_payment_error');
    }

    public function setIsPaymentError(?int $isPaymentError = 0): void
    {
        $this->setParameter('is_payment_error', $isPaymentError ?? 0);
    }

    public function getTransactionToken(): ?string
    {
        return $this->getParameter('transactionToken');
    }

    public function setTransactionToken(?string $transactionToken): void
    {
        $this->setParameter('transactionToken', $transactionToken ?? '');
    }

    public function getData(): array
    {
        return [];
    }

    public function sendData($data): CompleteTransactionRequest
    {
        return new CompleteTransactionRequest($this, $data);
    }

    public function request($method, $uri, array $headers = [], $body = null, $protocolVersion = '1.1')
    {
        // TODO: Implement request() method.
    }
}
