<?php
namespace NethServer\Module\PhpAdjustableValues;

use Nethgui\System\PlatformInterface as Validate;

/**
 * Implement gui module for php settings
 */

class Php56 extends \Nethgui\Controller\AbstractController
{

    public function initialize()
    {
    $executiontime = $this->createValidator()->memberOf('30','60','120','180','240','300','360','420','480','540','600');
    $inputtime = $this->createValidator()->memberOf('60','120','180','240','300','360','420','480','540','600');

    $this->declareParameter('AllowUrlFopen', $this->createValidator()->memberOf('On','Off'), array('configuration', 'php56', 'AllowUrlFopen'));
    $this->declareParameter('MaxExecutionTime',  $executiontime , array('configuration', 'php56', 'MaxExecutionTime'));
    $this->declareParameter('MemoryLimit', Validate::POSITIVE_INTEGER, array('configuration', 'php56', 'MemoryLimit'));
    $this->declareParameter('PostMaxSize', Validate::POSITIVE_INTEGER, array('configuration', 'php56', 'PostMaxSize'));
    $this->declareParameter('UploadMaxFilesize', Validate::POSITIVE_INTEGER, array('configuration', 'php56', 'UploadMaxFilesize'));
    $this->declareParameter('MaxFileUploads', Validate::POSITIVE_INTEGER , array('configuration', 'php56', 'UploadMaxFilesize'));
    $this->declareParameter('MaxInputTime',  $inputtime , array('configuration', 'php56', 'MaxExecutionTime'));
    
        parent::initialize();
    }

   public function validate(\Nethgui\Controller\ValidationReportInterface $report)
    {
        if ( ! $this->getRequest()->isMutation()) {
            return;
        }

        elseif  ($this->parameters['MemoryLimit'] < $this->parameters['PostMaxSize']) {
            $report->addValidationErrorMessage($this, 'Php56MemoryLimit', 'MemoryLimitLabelMustBeSuperiorThanPostMaxSize');
        }
        elseif  ($this->parameters['PostMaxSize'] < $this->parameters['UploadMaxFilesize']) {
            $report->addValidationErrorMessage($this, 'Php56PostMaxSize', 'PostMaxSizeMustBeSuperiorThanUpMaxFileSize');
        }

        parent::validate($report);
    }

    public function prepareView(\Nethgui\View\ViewInterface $view)
    {
        parent::prepareView($view);
       $view['MaxExecutionTimeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '30' => $view->translate('${0} seconds', array(30)),
                '60' => $view->translate('${0} seconds', array(60)),
                '120' => $view->translate('${0} seconds', array(120)),
                '180' => $view->translate('${0} seconds', array(180)),
                '240' => $view->translate('${0} seconds', array(240)),
                '300' => $view->translate('${0} seconds', array(300)),
                '360' => $view->translate('${0} seconds', array(360)),
                '420' => $view->translate('${0} seconds', array(420)),
                '480' => $view->translate('${0} seconds', array(480)),
                '540' => $view->translate('${0} seconds', array(540)),
                '600' => $view->translate('${0} seconds', array(600)),
        ));
        
       $view['MaxInputTimeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '60' => $view->translate('${0} seconds', array(60)),
                '120' => $view->translate('${0} seconds', array(120)),
                '180' => $view->translate('${0} seconds', array(180)),
                '240' => $view->translate('${0} seconds', array(240)),
                '300' => $view->translate('${0} seconds', array(300)),
                '360' => $view->translate('${0} seconds', array(360)),
                '420' => $view->translate('${0} seconds', array(420)),
                '480' => $view->translate('${0} seconds', array(480)),
                '540' => $view->translate('${0} seconds', array(540)),
                '600' => $view->translate('${0} seconds', array(600)),
        ));
        
        $view['MemoryLimitDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '32' => $view->translate('${0} MB', array(32)),
                '50' => $view->translate('${0} MB', array(50)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
        ));

        $view['PostMaxSizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '10' => $view->translate('${0} MB', array(10)),
                '20' => $view->translate('${0} MB', array(20)),
                '30' => $view->translate('${0} MB', array(30)),
                '40' => $view->translate('${0} MB', array(40)),
                '50' => $view->translate('${0} MB', array(50)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
       ));

        $view['UploadMaxFilesizeDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '2' => $view->translate('${0} MB', array(2)),
                '5' => $view->translate('${0} MB', array(5)),
                '10' => $view->translate('${0} MB', array(10)),
                '20' => $view->translate('${0} MB', array(20)),
                '30' => $view->translate('${0} MB', array(30)),
                '40' => $view->translate('${0} MB', array(40)),
                '50' => $view->translate('${0} MB', array(50)),
                '75' => $view->translate('${0} MB', array(75)),
                '100' => $view->translate('${0} MB', array(100)),
                '125' => $view->translate('${0} MB', array(125)),
                '150' => $view->translate('${0} MB', array(150)),
                '175' => $view->translate('${0} MB', array(175)),
                '200' => $view->translate('${0} MB', array(200)),
                '250' => $view->translate('${0} MB', array(250)),
                '300' => $view->translate('${0} MB', array(300)),
                '400' => $view->translate('${0} MB', array(400)),
                '500' => $view->translate('${0} MB', array(500)),
                '600' => $view->translate('${0} MB', array(600)),
                '700' => $view->translate('${0} MB', array(700)),
                '800' => $view->translate('${0} MB', array(800)),
                '900' => $view->translate('${0} MB', array(900)),
                '1000' => $view->translate('${0} MB', array(1000)),
                '1100' => $view->translate('${0} MB', array(1100)),
                '1200' => $view->translate('${0} MB', array(1200)),
                '1300' => $view->translate('${0} MB', array(1300)),
                '1400' => $view->translate('${0} MB', array(1400)),
                '1500' => $view->translate('${0} MB', array(1500)),
                '1600' => $view->translate('${0} MB', array(1600)),
                '1700' => $view->translate('${0} MB', array(1700)),
                '1800' => $view->translate('${0} MB', array(1800)),
                '1900' => $view->translate('${0} MB', array(1900)),
                '2000' => $view->translate('${0} MB', array(2000)),
       ));

        $view['MaxFileUploadsDatasource'] = \Nethgui\Renderer\AbstractRenderer::hashToDatasource(array(
                '5' => $view->translate('${0} files', array(5)),
                '10' => $view->translate('${0} files', array(10)),
                '20' => $view->translate('${0} files', array(20)),
                '30' => $view->translate('${0} files', array(30)),
                '40' => $view->translate('${0} files', array(40)),
                '50' => $view->translate('${0} files', array(50)),
                '100' => $view->translate('${0} files', array(100)),
                '200' => $view->translate('${0} files', array(200)),
                '300' => $view->translate('${0} files', array(300)),
                '400' => $view->translate('${0} files', array(400)),
                '500' => $view->translate('${0} files', array(500)),
                '750' => $view->translate('${0} files', array(750)),
                '1000' => $view->translate('${0} files', array(1000)),
                '2000' => $view->translate('${0} files', array(2000)),
                '3000' => $view->translate('${0} files', array(3000)),
                '4000' => $view->translate('${0} files', array(4000)),
                '5000' => $view->translate('${0} files', array(5000)),
        ));
    }

    public function onParametersSaved($changes)
    {
        $this->getPlatform()->signalEvent('nethserver-php-save@post-process');
    }

}

