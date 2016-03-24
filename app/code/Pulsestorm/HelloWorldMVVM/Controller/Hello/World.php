<?php

namespace Pulsestorm\HelloWorldMVVM\Controller\Hello;

class World extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        echo "<p> You did it !</p>";
        var_dump(__METHOD__);
    }
}