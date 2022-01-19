<?php

function debug($variable) {
    echo '<pre>'.print_r($variable,true).'</pre>';
}

//A revoir
function popup($message) {
    echo "<script>alert('$message');</script>";
}
