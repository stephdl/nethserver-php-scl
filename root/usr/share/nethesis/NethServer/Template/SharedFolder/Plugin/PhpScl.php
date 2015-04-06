<?php
/* @var $view \Nethgui\Renderer\Xhtml */

echo $view->fieldsetSwitch('Status', 'enabled', $view::FIELDSETSWITCH_CHECKBOX)->setAttribute('uncheckedValue', 'disabled')
    // ->setAttribute('icon-before', 'ui-icon-link')
    ->insert(
        $view->fieldset()->setAttribute('template', $T('PhpVersion_label'))
        ->insert($view->radioButton('PhpVersion', 'default'))
        ->insert($view->radioButton('PhpVersion', 'php54'))
        ->insert($view->radioButton('PhpVersion', 'php55'))
        ->insert($view->radioButton('PhpVersion', 'php56'))
);
