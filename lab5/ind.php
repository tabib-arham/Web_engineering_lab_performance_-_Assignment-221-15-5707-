<?php
$str = "This is a demo lab";
$str = strtolower($str);

$vowels = "aeiou";
$positions = [];

for ($i = 0; $i < strlen($str); $i++) {
    if (strpos($vowels, $str[$i]) !== false) {
        $str[$i] = 'L';
        $positions[] = $i;
    }
}

echo "Modified string: $str<br>";
echo "Vowel positions: " . implode(", ", $positions);
?>
