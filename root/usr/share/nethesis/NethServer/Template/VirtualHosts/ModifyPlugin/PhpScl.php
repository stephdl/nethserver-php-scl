<?php
/* @var $view \Nethgui\Renderer\Xhtml */

echo $view->fieldsetSwitch('Status', 'enabled', $view::FIELDSETSWITCH_CHECKBOX)->setAttribute('uncheckedValue', 'disabled')
    // ->setAttribute('icon-before', 'ui-icon-link')
    ->insert(
        $view->fieldset()->setAttribute('template', $T('PhpVersion_label'))
        ->insert($view->radioButton('PhpVersion', 'default'))
        ->insert($view->radioButton('PhpVersion', 'php56'))
        ->insert($view->radioButton('PhpVersion', 'php70'))
        ->insert($view->radioButton('PhpVersion', 'php71'))
        ->insert($view->radioButton('PhpVersion', 'php72'))
        ->insert($view->radioButton('PhpVersion', 'php73'))
        ->insert($view->radioButton('PhpVersion', 'php74'))
);
