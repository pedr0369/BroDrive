<?php

function dataPtBr($datas){
	$data = explode("-", $datas);
	return "{$data[2]}/{$data[1]}/{$data[0]}";
}