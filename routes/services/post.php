<?php

if (isset($_POST)) {
    
    foreach (array_keys($_POST) as $key => $value) {
        echo '<pre>';print_r(($value));echo '</pre>';
    }


    


}