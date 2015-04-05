<?php
/* @var $view \Nethgui\Renderer\Xhtml */
//echo $view
//    ->insert(
//        $view->//fieldset()->setAttribute('template', $T('PhpVersion_label'))
//        ->insert($view->radioButton('PhpVersion', 'default'))
//        ->insert($view->radioButton('PhpVersion', 'PHP54'))
//        ->insert($view->radioButton('PhpVersion', 'PHP55'))
//        ->insert($view->radioButton('PhpVersion', 'PHP56'))
//);


echo $view->fieldsetSwitch('Status', 'enabled', $view::FIELDSETSWITCH_CHECKBOX)->setAttribute('uncheckedValue', 'disabled')
    // ->setAttribute('icon-before', 'ui-icon-link')
    ->insert(
        $view->fieldset()->setAttribute('template', $T('PhpVersion_label'))
        ->insert($view->radioButton('PhpVersion', 'default'))
        ->insert($view->radioButton('PhpVersion', 'Php54'))
        ->insert($view->radioButton('PhpVersion', 'Php55'))
        ->insert($view->radioButton('PhpVersion', 'Php56'))
);    
