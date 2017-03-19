<?php

$hash_hardcoded = strtolower("21CFB9A84F12F0DFE5088A91D31081E23341F68889A448FE28224A2DB61C7C13E8D17E4AA9255C90C58673399BC74595EAF98541738E6133147F960FC28B3ED1");

$data = "nemanja";

$hashed_data = strtolower(hash('sha512', $data));

if($hash_hardcoded == $hashed_data){
	echo "Identičan hash!<br>";
}
else{
	echo "Različit hash!<br>";
}

echo "-------------------------------------------<br>";
echo "hash_hardcoded: " . $hash_hardcoded . "<br>";
echo "hashed_data: " . $hashed_data;

?>
