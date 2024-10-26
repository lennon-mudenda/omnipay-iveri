<?php

namespace Omnipay\IVeri\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;

abstract class BaseRequest extends AbstractRequest implements RequestInterface
{
    // Merchant Application ID
    public function getGatewayURL(): ?string
    {
        return $this->getParameter('gatewayURL');
    }

    public function setGatewayURL(string $gatewayURL = null): void
    {
        $this->setParameter('gatewayURL', $gatewayURL);
    }

    // Merchant Application ID
    public function getMerchantApplicationId(): ?string
    {
        return $this->getParameter('applicationId');
    }

    public function setMerchantApplicationId(string $applicationId = null): void
    {
        $this->setParameter('applicationId', $applicationId);
    }

    // Order Amount
    public function getOrderAmount(): ?string
    {
        return $this->getParameter('amount');
    }

    public function setOrderAmount(string $amount = null): void
    {
        $this->setParameter('amount', $amount);
    }

    // Success URL
    public function getSuccessUrl(): ?string
    {
        return $this->getParameter('successfulUrl');
    }

    public function setSuccessUrl(string $url = null): void
    {
        $this->setParameter('successfulUrl', $url);
    }

    // Fail URL
    public function getFailUrl(): ?string
    {
        return $this->getParameter('failUrl');
    }

    public function setFailUrl(string $url = null): void
    {
        $this->setParameter('failUrl', $url);
    }

    // Try Later URL
    public function getTryLaterUrl(): ?string
    {
        return $this->getParameter('tryLaterUrl');
    }

    public function setTryLaterUrl(string $url = null): void
    {
        $this->setParameter('tryLaterUrl', $url);
    }

    // Error URL
    public function getErrorUrl(): ?string
    {
        return $this->getParameter('errorUrl');
    }

    public function setErrorUrl(string $url = null): void
    {
        $this->setParameter('errorUrl', $url);
    }

    // Line Items [...['product' => ..., 'quantity' => ..., 'amount' => ...]]
    public function getLineItems(): array
    {
        return $this->getParameter('lineItems');
    }

    public function setLineItems(array $lineItems): void
    {
        $this->setParameter('lineItems', $lineItems);
    }

    // Consumer Order ID Prefix
    public function getConsumerOrderIdPrefix(): ?string
    {
        return $this->getParameter('consumerOrderIdPrefix');
    }

    public function setConsumerOrderIdPrefix(string $prefix = null): void
    {
        $this->setParameter('consumerOrderIdPrefix', $prefix ?? 'AUTOGENERATE');
    }

    // Billing Email
    public function getBillingEmail(): ?string
    {
        return $this->getParameter('billingEmail');
    }

    public function setBillingEmail(string $email = null): void
    {
        $this->setParameter('billingEmail', $email);
    }

    // Payment Protocols
    public function getPaymentCardProtocols(): ?string
    {
        return $this->getParameter('paymentCardProtocols');
    }

    public function setPaymentCardProtocols(string $protocols = null): void
    {
        $this->setParameter('paymentCardProtocols', $protocols ?? 'IVERI');
    }

    // Consumer Order ID
    public function getConsumerOrderId(): ?string
    {
        return $this->getParameter('consumerOrderId');
    }

    public function setConsumerOrderId(string $orderId = null): void
    {
        $this->setParameter('consumerOrderId', $orderId ?? 'AUTOGENERATE');
    }

    // Transaction Complete Flag
    public function getTransactionComplete(): bool|string|null
    {
        return $this->getParameter('transactionComplete');
    }

    public function setTransactionComplete(bool|null $complete = false): void
    {
        $this->setParameter('transactionComplete', $complete ?? 'false');
    }
}
