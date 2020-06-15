<?		    
//habilitar allow_url_fopen no php
//DESCOBRIR ID DO CANAL: https://www.youtube.com/account_advanced

$channel_id = 'coloque aqui o id do canal';
//mostrar 3 vídeos
$qtd_videos = 3;
//largura
$width = 100; 
//altura
$height = 220;

$xml=simplexml_load_file("http://www.youtube.com/feeds/videos.xml?channel_id=".$channel_id);

$i=1;
foreach($xml->entry as $e){
	$attributes = $e->link->attributes();
	$link = $attributes["href"];
	$cod = str_replace("http://www.youtube.com/watch?v=", "", $link);
	$cod = str_replace("https://www.youtube.com/watch?v=", "", $link);
	?>
	<div class="video">
		<iframe id="ytplayer" type="text/html" width="<?=$width?>" height="<?=$height?>" src="https://www.youtube.com/embed/<?=$cod?>?rel=0" frameborder="0" allowfullscreen></iframe>
	</div>
<?
	if($i==$qtd_videos)
		break;

	$i++;
}
?>