<?php

namespace MagePsycho\Customshipping\Model\Carrier;

use Magento\Quote\Model\Quote\Adress\RateRequest;

/**
 * Description of Customshipping class
 *
 * @author pbc
 */
class Customshipping extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
\Magento\Shipping\Model\Carrier\CarrierInterface
{
    /*
     * @var string
     */
    protected $_code = 'magepsycho_customshipping';

    /*
     * @var boolean
     */
    protected $_isFixed = true;

    /*
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $_rateResultFactory;

    /*
     * @var \Magento\Quote\Model\Quote\Adress\RateResult\MethodFactory
     */
    protected $_rateMethodFactory;

    /**
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param array $data
     */
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
                                \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
                                \Psr\Log\LoggerInterface $logger,
                                \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
                                \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
                                array $data = array())
    {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;

        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    public function collectRates(\Magento\Quote\Model\Quote\Address\RateRequest $request)
    {
        
    }

    public function getAllowedMethods()
    {

    }
//put your code here
}