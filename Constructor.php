<html>
<head>
<title>Constructor</title>
</head>
<body>
<?php
class Fruits{
    public $name;
    public $color;
    public $price;


function __construct($name,$color,$price){
    $this->name = $name;
    $this->color = $color;
    $this->price = $price;
}
function get_name(){
    return $this->name;
}
function get_color(){
    return $this->color;
}
function get_price(){
    return $this->price;
}

}
$apple = new Fruits("Apple", "red" , 60);
$banana = new Fruits("Banana", "yellow" , 80);

echo "Name:" .$apple->get_name();
echo "<br>";
echo "Color:" .$apple->get_color();
echo "<br>";
echo "Price:" .$apple->get_price();
echo "<br>";

echo "Name:" .$banana->get_name();
echo "<br>";
echo "Color:" .$banana->get_color();
echo "<br>";
echo "Price:" .$banana->get_price();





?>
</body>
</html>