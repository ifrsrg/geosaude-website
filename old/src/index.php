<?php
require_once("restrita/persistencia/noticiaDAO.php");
$noticiaDAO = new NoticiaDAO();
$noticias = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$noticiasCarousel = $noticiaDAO->selecionaNovas(3);
	$noticias = $noticiaDAO->selecionaTodos(); 
} 
else if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	header('location: noticias.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Programa Geosaude</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/indexcss.css" rel="stylesheet">
	<?php if ($_SESSION['logged_in']) : ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/froala_editor.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/froala_style.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/code_view.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/colors.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/emoticons.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/image_manager.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/image.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/line_breaker.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/quick_insert.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/table.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/file.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/char_counter.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/video.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/emoticons.css">
		<link rel="stylesheet" href="froala_editor_2.3.5/css/plugins/fullscreen.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
	<?php endif ?>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Programa Geosaude</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="sobre.php">Sobre</a></li>
					<li><a href="contato.php">Contato</a></li>
					<li><a href="#mapas">Mapas</a></li>
					<li><a href="downloads.php">Downloads</a></li>
					<li><a href="fotos.php">Fotos</a></li>
					<li><a href="noticias.php">Noticias</a></li>
				</ul>
				<li class="dropdown nav navbar-nav navbar-right">
					<button class="btn btn-default navbar-btn" data-toggle="dropdown">Entrar</button>
					<div class="dropdown-menu" style="padding: 10px; background: #ddd">
						<form action="" role="form">
							<div class="form-group">
								<label for="user">Usuario</label>
								<input type="text" class="form-control" id="user" placeholder="Usuario" />
								<label for="password">Senha</label>
								<input type="password" class="form-control" id="password" placeholder="Senha" />
							</div>
							<button type="submit" class="btn btn-default">Entrar</button>
						</form>
					</div>
				</div>
			</li>
		</div>
	</div>
</nav>

<div class="container" id="edit">

	<div class="page-header">
		<h1>Programa Geosaude - IFRS</h1>
		<p class="lead">Coordenadora Carol Larrousa</p>
	</div>

	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<?php while ($noticia = $noticiasCarousel->fetch()): ?>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide" src="" alt="Primeiro slide">
				<div class="container">
					<div class="carousel-caption">
						<h1><?= $noticia->titulo ?></h1>
						<p><?= $noticia->descricao ?></p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Leia</a></p>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile ?>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
<hr>
<div class="container">
	<div class="row">
		<?php
		include 'listanoticia.php';
		?>
	</div>
</div>
<hr>
<footer class="footer">
	<div class="container">
		<p class="text-muted">©Copyright Geosaude 2016</p>
	</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<?php if ($_SESSION['logged_in']) : ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/froala_editor.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/align.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/code_beautifier.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/code_view.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/colors.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/emoticons.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/draggable.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/font_size.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/font_family.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/image.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/image_manager.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/line_breaker.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/quick_insert.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/link.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/lists.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/paragraph_format.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/paragraph_style.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/video.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/table.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/url.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/emoticons.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/file.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/entities.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/inline_style.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/save.min.js"></script>
	<script type="text/javascript" src="froala_editor_2.3.5/js/plugins/fullscreen.min.js"></script>
	<script>
		$(function(){
			$('#edit').froalaEditor({
				toolbarInline: true,
				toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'color', 'emoticons', '-', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', '-', 'insertImage', 'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo'],
				toolbarButtonsXS: null,
				toolbarButtonsSM: null,
				toolbarButtonsMD: null
			})
		});
	</script>
<?php endif ?>
</body>
</html>