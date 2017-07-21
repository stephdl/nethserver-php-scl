<?php
namespace NethServer\Module\PhpAdjustableValues;

use Nethgui\System\PlatformInterface as Validate;

/**
 * Implement gui module for php settings
 */

class Php2Httpd extends \Nethgui\Controller\AbstractController
{

    public function initialize()
    {

    $this->declareParameter('PhpVersion', $this->createValidator()->memberOf('php54','php55','php56','php70','php71','default'), array('configuration', 'httpd', 'PhpVersion'));

        parent::initialize();
    }


    public function onParametersSaved($changes)
    {
        $this->getPlatform()->signalEvent('nethserver-php-save@post-process');
    }

}
