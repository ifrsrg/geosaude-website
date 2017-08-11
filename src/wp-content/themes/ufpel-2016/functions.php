<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
/**
 *  Tema UFPel 2016 para WordPress, Copyright 2013-2016 Universidade Federal de Pelotas
 */

// Carrega opções do tema e define valores padrão
$defaults = array(
	'wpinst_style' => '',		// CSS personalizado
	'wpinst_facebook' => '',	// URL Facebook
	'wpinst_twitter' => '',		// URL Twitter
	'wpinst_gplus' => '',		// URL Google+
	'wpinst_localiza_titulo' => '',
	'wpinst_localiza_campus' => '',
	'wpinst_localiza_linkgmaps' => '',
	'wpinst_localiza_endereco' => '',
	'wpinst_localiza_telefone' => '',
	'wpinst_localiza_email' => '',
	'wpinst_modulos' => 'Imagemdest-2-4:date:s:5:d:c:,Lista-0-Notícias',	// Módulos incluídos por padrão no layout da home
	'wpinst_barra' => 'sim',	// Exibir barra do Governo
	'wpinst_ogimg' => get_bloginfo('template_url').'/imagens/sem-imagem.png',	// Imagem padrão para compartilhamento no Facebook
	'wpinst_ogdesc' => get_bloginfo('description'),		// Descrição padrão para compartilhamento no Facebook
	'und_vinc' => '',			// Unidade de origem
	'color_scheme' => '#7aa740'	// Cor de destaque do site
);

$inst_options = get_option('ufpel_options');
$inst_options = wp_parse_args( $inst_options, $defaults );


// Define largura máxima do conteúdo (usado pelo player de mídia do WP 4.0+)
if ( ! isset( $content_width ) ) {
	$content_width = 740;
}

// CARREGA MÓDULOS

// funcionalidades do backend
include 'lib/scripts-backend.php';
include 'lib/theme-options.php';
include 'lib/theme-customize.php';
include 'lib/theme-update-checker.php';
include 'lib/checa-atualizacao-tema.php';
include 'lib/maisMCE.php';

// tipos de post personalizados
include 'lib/cpt/banners.php';
include 'lib/cpt/links-destacados.php';
include 'lib/cpt/imagem-de-capa.php';

// registra menus personalizados
include 'lib/registra-menus.php';

// funções gerais do frontend
include 'lib/scripts-frontend.php';
include 'lib/configura-thumbnails.php';
include 'lib/fetch-url.php';
include 'lib/paginacao.php';
include 'lib/postlist-functions.php';
include 'lib/carrega-modulos.php';
include 'lib/jetpack-tweaks.php';
include 'lib/custom-logo.php';

// sidebars e widgets
include 'lib/register-sidebars.php';
include 'widgets/slider-widget.php';
include 'widgets/arquivo-widget.php';
include 'widgets/linksdestacados-widget.php';
include 'widgets/imagemcomlink/imagemcomlink.php';
include 'widgets/manchete/manchete.php';


function my_myme_types($mime_types){
    $mime_types['dbf'] = 'application/dbase'; //Adding svg extension
	$mime_types['prj'] = 'application/octet-stream';
    $mime_types['sbn'] = 'application/octet-stream';
	$mime_types['sbx'] = 'application/octet-stream';
	$mime_types['shp'] = 'application/octet-stream';
	$mime_types['xml'] = 'application/xml';
	$mime_types['shx'] = 'application/octet-stream';
	$mime_types['cpg'] = 'application/octet-stream';
	$mime_types['rar'] = 'application/octet-stream';
	$mime_types['aux'] = 'application/octet-stream';
	$mime_types['rmf'] = 'audio/rmf';
	$mime_types['rrd'] = 'application/octet-stream';
	$mime_types['tif'] = 'image/tiff';
	$mime_types['docx'] = 'application/msword';
	$mime_types['tfw'] = 'application/octet-stream';
	$mime_types['ovr'] = 'application/octet-stream';
	$mime_types['idx'] = 'application/octet-stream';
	$mime_types['pdf'] = 'application/pdf'; //Adding photoshop files
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);