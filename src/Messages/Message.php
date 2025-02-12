<?php

namespace JagdishJP\SBIPay\Messages;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use JagdishJP\SBIPay\Traits\Encryption;

class Message
{
    use Encryption;

    /** Transaction Id For Each Payment */
    public $referenceId;

    /** Transaction Id generated by SBI on each transaction */
    public $transactionId;

    /** Seller ID provided by SBI */
    public $merchantKey;

    /** Account ID provided by SBI */
    public $merchantId;

    /** Seller bank code used in the transaction */
    public $aggregatorId;

    /** Operatin Mode */
    public $operatinMode;

    /** Currency */
    public $currency;

    /** Country */
    public $country;

    /** Total amount to be paid */
    public $amount;

    /** datetime of the transaction in YYYYMMDDHHmmSS format */
    public $orderTimestamp;

    /** datetime of the transaction generate from SBI in YYYYMMDDHH24MISS */
    public $transactionTimestamp;

    /** order no of merchant */
    public $merchantOrderNo;

    /** The selected bank ID by the customer */
    public $targetBankId;

    /** Other Information separated by ^ */
    public $otherInformation;

    /** Merchant Customer Id */
    public $merchantCustomerId;

    /** Payment Mode */
    public $payMode;

    /** Access Medium */
    public $accessMedium;

    /** Transaction Source */
    public $transactionSource;

    /** Response Success Url */
    public $successUrl;

    /** Response Fail Url */
    public $failUrl;

    /** Request checksum */
    public $checkSum;

    /** Multiple Account Details */
    public $accountIdentifier;

    /** Multiple Account Details */
    public $multiAccountDetails;

    /** Response array */
    public array $response;

    public function __construct()
    {
        $this->aggregatorId             = Config::get('sbipay.aggregator_id');
        $this->merchantId               = Config::get('sbipay.merchant_id');
        $this->merchantKey              = Config::get('sbipay.merchant_key');
        $this->currency                 = Config::get('sbipay.currency');
        $this->operatinMode             = Config::get('sbipay.operating_mode');
        $this->country                  = Config::get('sbipay.country');
        $this->successUrl               = Config::get('sbipay.success_url');
        $this->failUrl                  = Config::get('sbipay.fail_url');
        $this->payMode                  = Config::get('sbipay.pay_mode');
        $this->accountIdentifier[]      = Config::get('sbipay.account_identifier');

        $this->referenceId              = Str::random(12);
        $this->merchantCustomerId       = 'NA';
        $this->accessMedium             = 'ONLINE';
        $this->transactionSource        = 'ONLINE';
        $this->multiAccountDetails      = [];

        $this->init();
    }
}
