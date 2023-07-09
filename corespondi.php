<?php
include('naviba.php');

$sel=$connc->getAll('SELECT DISTINCT(`due`) FROM `data` ORDER BY `id` DESC;');

echo $sel;
foreach($sel as $sel)
    {
    echo $sel['due'];
    $sggel=$connc->getOne('SELECT COUNT(`id`) FROM `data` WHERE iot');
    
    echo

    }

?>