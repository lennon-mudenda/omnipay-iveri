<?php

namespace Omnipay\IVeri\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\ResponseInterface;


class Response extends AbstractResponse implements ResponseInterface
{
    public function isSuccessful(): bool
    {
        return isset($this->data['success']) && $this->data['success'];
    }

	public function getTransactionPaymentLink(): ?string
	{
        return $this->request->getGatewayURL();
	}

	public function isRedirect(): bool
	{
		return $this->data['redirect'] ?? false;
	}

	public function getRedirectUrl(): ?string
	{
		return $this->getTransactionPaymentLink();
	}

    public function getRedirectMethod(): string
    {
        return 'POST';
    }

    public function getRedirectData(): array|string
    {
        return $this->getData();
    }

    public function getData(): array
    {
        $mappings = [
            'getMerchantApplicationId' => 'Lite_Merchant_ApplicationId',
            'getOrderAmount'           => 'Lite_Order_Amount',
            'getSuccessUrl'            => 'Lite_Website_Successful_Url',
            'getFailUrl'               => 'Lite_Website_Fail_Url',
            'getTryLaterUrl'           => 'Lite_Website_TryLater_Url',
            'getErrorUrl'              => 'Lite_Website_Error_Url',
            'getConsumerOrderIdPrefix' => 'Lite_ConsumerOrderID_PreFix',
            'getBillingEmail'          => 'Ecom_BillTo_Online_Email',
            'getPaymentCardProtocols'  => 'Ecom_Payment_Card_Protocols',
            'getConsumerOrderId'       => 'Ecom_ConsumerOrderID',
            'getTransactionComplete'   => 'Ecom_TransactionComplete',
        ];

        $lineItemMappings = [
            'product' => 'Lite_Order_LineItems_Product_',
            'quantity' => 'Lite_Order_LineItems_Quantity_',
            'amount' => 'Lite_Order_LineItems_Amount_',
        ];

        $data = [];

        foreach ($mappings as $key => $param_name) {
            $param_value = $this->request->{$key}();
            $data[$param_name] = $param_value;
        }

        foreach ($this->request->getLineItems() as $index => $lineItem) {
            $data[$lineItemMappings['product'] . ($index + 1)] = $lineItem['product'];
            $data[$lineItemMappings['quantity'] . ($index + 1)] = $lineItem['quantity'];
            $data[$lineItemMappings['amount'] . ($index + 1)] = $lineItem['amount'];
        }

        return $data;
    }
}
