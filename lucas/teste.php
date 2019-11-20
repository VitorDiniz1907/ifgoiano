<?php

for($i= 0; $i <=1000; $i++){
    $resultado_final = strtoupper(bin2hex(random_bytes(4)));
    echo "<br>";
    echo $resultado_final;
    echo "<br>";
}


?>