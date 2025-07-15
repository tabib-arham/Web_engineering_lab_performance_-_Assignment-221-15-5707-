<?php
class stud{
    public $name;
    public $roll;
    private $cgpa;
    public function __construct($name, $roll, $cgpa) {
        $this->name = $name;
        $this->roll = $roll;
        $this->cgpa = $cgpa;
    }
    function setName($name) {
        $this->name = $name;
    }  
    function getName() {
        return $this->name;
    }
}
$s1=new stud("John", 101, 3.5);
$s2=new stud("Doe", 102, 3.8);
echo $s1->getName() . "<br>";
echo $s2->getName() . "<br>";
?>
