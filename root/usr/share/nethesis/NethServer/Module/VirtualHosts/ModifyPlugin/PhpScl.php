<?php
namespace NethServer\Module\VirtualHosts\ModifyPlugin;

use Nethgui\System\PlatformInterface as Validate;
use Nethgui\Controller\Table\Modify as Table;

/**
 * Httpd virtualhost plugin
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
            array('Status', Validate::SERVICESTATUS, Table::FIELD, 'status'),
            array('PhpVersion', $this->createValidator()->memberOf('default','php56','php70','php71','php72' ), Table::FIELD, 'PhpVersion'),
        );

        $this
            ->setDefaultValue('Status', 'enabled')
            ->declareParameter('PhpVersion')->setDefaultValue('PhpVersion', 'default')
        ;

        $this->setSchemaAddition($schema);
        parent::initialize();
    }

}
