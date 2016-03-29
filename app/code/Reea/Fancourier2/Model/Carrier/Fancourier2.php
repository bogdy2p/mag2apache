<?php

namespace MagePsycho\Fancourier2\Model\Carrier;

use Magento\Quote\Model\Quote\Adress\RateRequest;

/**
 * Description of Fancourier2 class
 *
 * @author pbc
 */
class Fancourier2 extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
\Magento\Shipping\Model\Carrier\CarrierInterface
{
    /*
     * @var string
     */
    protected $_code = 'reea_fancourier2';

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

    /**
     * 
     * @param \Magento\Quote\Model\Quote\Address\RateRequest $request
     * @return \Magento\Shipping\Model\Rate\Result
     * @SupressWarnings(PHPMD.UnusedLocalVariable)
     */
    public function collectRates(\Magento\Quote\Model\Quote\Address\RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        $result = $this->_rateResultFactory->create();

        $shippingPrice = $this->getConfigData('price');

        $method = $this->_rateMethodFactory->create();

        $method->setCarrier($this->code);
        $method->setCarrierTitle($this->getConfigData('title'));

        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('name'));

        $method->setPrice($shippingPrice);
        $method->setCost($shippingPrice);

        $result->append($method);

        return $result;
    }

    /**
     * Return allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
//put your code here
}