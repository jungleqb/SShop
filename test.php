<?php 
function tinh($so){
	$x = (string)$so;
	$a = substr($x,0,1);
	$b = substr($x,1,1);
	$c = substr($x,2,1);
	$bb = (int)$b;
	if($so >= 1000 && $so < 10000){
		if($bb > 0){
			return $a.','.$b.'k';
		}
		else{
			return $a.'k';
		}

	}
	elseif($so >= 10000 && $so < 100000){
		return $a.$b.'k'; 
	}
	elseif($so >= 100000 && $so < 1000000){
		return $a.$b.$c.'k';
	}
	elseif($so >= 1000000 && $so < 10000000){
		if($bb > 0){
			return $a.','.$b.'M';
		}
		else{
			return $a.'M';
		}
	}
	else{
		return $so;
	}
}

echo tinh(2122100);
?>