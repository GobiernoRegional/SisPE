<?php
	$request="https://www.googleapis.com/youtube/v3/";	
			$request.="search?part=snippet";
			$request.="&key=AIzaSyB14YzIxXx44u8IOVqMw3bzfCu3l7KUA6M";
			$request.="&channelId=UCQrm8GNsXxeBtH9pK0kHahQ";
			$request.="&type=video";
			$request.="&maxResults=9";

			// echo $request;
			$str_datos = file_get_contents( $request );
			$resultados = json_decode($str_datos,true);
			print_r($resultados);
?>