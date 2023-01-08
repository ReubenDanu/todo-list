<?php 
function divide($x, $y) {
    if ($y == 0) {
        throw new Exception('Division by zero');
    }
    return $x / $y;
}

try {
    $result = divide(10, 0);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}


if("ikan" == "test"){
    echo "yes";
}
echo "no \n";

$test_array = array(
    array(2,2,2,2),
    array("testing")

);

$first_item = $test_array[0][0];
$second_item = $test_array[1][0];

var_dump($test_array, $first_item, $second_item);
$query = "SELECT CURRENT_USER();";
$query .= "SELECT Name FROM City ORDER BY ID LIMIT 20, 5";
var_dump($query);
?>