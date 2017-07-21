<?php
namespace NethServer\Module\SharedFolder\Plugin;

use Nethgui\System\PlatformInterface as Validate;
use Nethgui\Controller\Table\Modify as Table;

/**
 * Httpd SharedFolder plugin
 *
 * @author stephane de labrusse <stephdl@de-labrusse.fr>
 *
 */
class  PhpScl  extends \Nethgui\Controller\Table\RowPluginAction
{

    protected function initializeAttributes(\Nethgui\Module\ModuleAttributesInterface $base)
    {
        return \Nethgui\Module\SimpleModuleAttributesProvider::extendModuleAttributes($base, 'PhpScl', 20);
    }


    public function initialize()
    {

        $schema = array(
            array('Status', Validate::SERVICESTATUS, Table::FIELD, 'HttpStatus'),
            array('PhpVersion', $this->createValidator()->memberOf('default','php54','php55','php56','php70','php71'), Table::FIELD, 'PhpVersion'),
        );

        $this
            ->setDefaultValue('Status', 'enabled')
            ->declareParameter('PhpVersion')->setDefaultValue('PhpVersion', 'default')
        ;

        $this->setSchemaAddition($schema);
        parent::initialize();
    }

}
