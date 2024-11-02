<?php

namespace Omnipay\IVeri;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\IVeri\Message\CompleteTransactionRequest;
use Omnipay\IVeri\Message\VerifyTransactionRequest;
use Omnipay\IVeri\Message\InitiateTransactionRequest;

class Gateway extends AbstractGateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName(): string
    {
        return 'IVeri';
    }

    public function getDefaultParameters(): array
    {
        return [];
    }

	/**
	 * @param array $options
	 * @return AbstractRequest
	 */
    public function purchase(array $options = []): AbstractRequest
	{
        return $this->createRequest(InitiateTransactionRequest::class, $options);
    }

	/**
	 * @param array $options
	 * @return AbstractRequest
	 */
	public function completePurchase(array $options = []): AbstractRequest
	{
		return $this->createRequest(CompleteTransactionRequest::class, $options);
	}

	/**
	 * @param array $options
	 * @return AbstractRequest
	 */
    public function refund(array $options = []): AbstractRequest
	{
        return $this->createRequest(VerifyTransactionRequest::class, $options);
    }
}
