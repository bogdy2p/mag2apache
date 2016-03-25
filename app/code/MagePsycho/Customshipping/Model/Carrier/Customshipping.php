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

    public function collectRates(\Magento\Quote\Model\Quote\Address\RateRequest $request)
    {
        
    }

    public function getAllowedMethods()
    {

    }
//put your code here
}