<?php
echo $view->header()->setAttribute('template', $T('HttpdAdjustableValues_Title'));

echo $view->panel()

        ->insert($view->radioButton('PhpVersion', 'default'))
        ->insert($view->radioButton('PhpVersion', 'php56'))
        ->insert($view->radioButton('PhpVersion', 'php70'))
        ->insert($view->radioButton('PhpVersion', 'php71'))
;
echo $view->buttonList($view::BUTTON_SUBMIT | $view::BUTTON_HELP);
?>
