<?php
echo $view->header()->setAttribute('template', $T('HttpdAdjustableValues_Title'));

echo $view->panel()

        ->insert($view->radioButton('PhpVersion', 'default'))
        ->insert($view->radioButton('PhpVersion', 'php54'))
        ->insert($view->radioButton('PhpVersion', 'php55'))
        ->insert($view->radioButton('PhpVersion', 'php56'))
;
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
?>
