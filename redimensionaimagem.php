<?php
$imagem							= $_GET['imagem'];
$width							= $_GET['width'];
$height							= $_GET['height'];
$extensao						= strrchr($imagem, ".");
	
switch($extensao){
	case ".png":
	$funcao_cria_imagem		= "imagecreatefrompng";
	$funcao_salva_imagem	= "imagepng";
	$funcao_formato			= "image/png";
	break;

	case ".gif":
	$funcao_cria_imagem		= "imagecreatefromgif";
	$funcao_salva_imagem	= "imagegif";
	$funcao_formato			= "image/gif";
	break;

	case ".jpg":
	$funcao_cria_imagem		= "imagecreatefromjpeg";
	$funcao_salva_imagem	= "imagejpeg";
	$funcao_formato			= "image/jpeg";
	break;
	
	case ".jpeg":
	$funcao_cria_imagem		= "imagecreatefromjpeg";
	$funcao_salva_imagem	= "imagejpeg";
	$funcao_formato			= "image/jpeg";
	break;

	default:
	return "Erro. Tipo de arquivo não aceito";
	break;
}
	$imagem_original			= $funcao_cria_imagem($imagem);

list($largura_antiga, $altura_antiga) = getimagesize($imagem);

$ratio_orig						= $largura_antiga/$altura_antiga;
if ($width/$height > $ratio_orig) {
	$width						= $height*$ratio_orig;
} else {
	$height						= $width/$ratio_orig;
}

$imagem_tmp					= imagecreatetruecolor($width, $height);

imagecopyresampled($imagem_tmp, $imagem_original, 0, 0, 0, 0, $width, $height, $largura_antiga, $altura_antiga);

header('Content-Type: $funcao_formato');
imagejpeg($imagem_tmp, null, 70);
?>