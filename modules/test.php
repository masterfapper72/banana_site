<?php 
$userInput = readline("Enter birth year: \n");
if ($userInput < (date("Y") - 18)) {
    echo "You good for a beer\n";
} else {
    echo "Come back when you older!\n";
}
?>