<?php
// print_r($meniu->as_array('nume','cheie'));

echo "|";
    if($meniu->count()){
        foreach($meniu as $link){
            echo "|";
            echo"
            <a href=\"http://miniapp.dev.rezolvit.ro/cms/".
                    $link->cheie.
                    " \">";
            echo $link->nume;
            echo "&nbsp;";
            echo"
            </a>
            ";
        }       
    }
echo "|";
?>