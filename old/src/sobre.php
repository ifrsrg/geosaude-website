<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Programa Geosaude - Sobre</title>
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/sobrecss.css" rel="stylesheet">
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
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
    <br>
    <div>
            <p>O Ministério da educação – MEC possui um PROGRAMA DE EXTENSÃO UNIVERSITÁRIO denominado PROEXT, que é um instrumento que abrange programas e projetos de extensão universitária, com ênfase na inclusão social nas suas mais diversas dimensões, visando aprofundar ações políticas que venham fortalecer a institucionalização da extensão no âmbito das Instituições Federais, Estaduais e Municipais de Ensino Superior tendo como objetivos de apoiar as instituições no desenvolvimento das ações de extensão, potencializar e ampliar estas ações, aproximar os estudantes com realidades concretas e da troca de saberes acadêmicos e populares e dotar as Instituições de ensino Superiores de condições de gestão de suas atividades acadêmicas de extensão.</p>

      <p>Assim para participar deste programa dos governos, emergiu um movimento de diferentes áreas que compõem um programa chamado “DESENVOLVIMENTO E APLICAÇÃO DE TECNOLOGIA SOCIAL E ASSISTIVA COM O USO DA INFORMÁTICA E DO GEOPROCESSAMENTO”. Este foi composto por três projetos com o objetivo geral de utilizar a informática e internet como ferramentas mediadoras de mudanças da qualidade de vida para os sujeitos participantes do programa, através de suas atividades de inclusão e da responsabilidade social que cabe aos Institutos Federais Educação, Ciência e Tecnologia.</p>

      <p>Foi submetido ao PREXT 2012 em maio de 2011 e ficou classificado, sendo contemplado com fomento de R$150.000,00. No planejamento do programa, maior parte deste recurso era destinado ao projeto Geosaude, por suas especificidades e necessidades de computadores, softwares e outros recursos materias além do numero necessário de bolsistas para executa-lo.</p>

      <p>O Programa Geosaude é a integração dos cursos técnicos em Geoprocessamento e Enfermagem, e do Tecnólogo em Análise e Desenvolvimento de Sistemas (TADS), ambos ofertados pelo Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (Campus Rio Grande). Sua característica é de extensão, e tem como objetivos específicos:</p>

      <ul>
      	<li>Gerar um Sistema de Informações Geográficas com dados relativos aos casos de Hepatite A e Dengue do município do Rio Grande;</li>
      	<li>Habilitar alunos do curso de Geoprocessamento do IFRS – Campus Rio Grande na elaboração de um SIG;</li>
      	<li>Disponibilizar as informações geradas e organizadas na forma de um servidor de mapas estáticos e dinâmicos</li>
      	<li>Capacitar técnicos da Prefeitura Municipal para a utilização da ferramenta SIG no dia a dia da gestão pública;</li>
      	<li>Aproximar os alunos do Curso técnico de Enfermagem das tecnologias digitais aplicadas a profissão e planejar ações de educação em saúde e prevenção dos agravos de doenças previsíveis voltadas as necessidade locais.</li>
      </ul>

      <p>O Geosaude além de sua característica interdisciplinar e multiprofissional também possui parcerias externas com a Secretaria Municipal de Coordenação e Planejamento, Secretaria Municipal da Saúde e Instituto Brasileiro de Geografia e Estatística. Esta aproximação possibilita o desenvolvimento do projeto, visto que os dados trabalhados são gerados pelos registros destes departamentos e os resultados do trabalho realizado no projeto são disponibilizados a estes, contribuindo com seu trabalho. Esta parceria tem gerado demandas impulsionando a busca de mais fomentos para viabilizar atender as necessidades surgidas. O IFRS passou a contribuir com mais recursos aumentando o numero de bolsistas.</p>

      <p>A equipe de trabalho é dividida em quase 30 bolsistas, que possuem suas tarefas divididas por cursos, da seguinte forma: os alunos do curso TADS tem como responsabilidade o suporte à geração e edição do banco de dados, a inserção dos dados cartográficos na web para que as secretarias municipais tenham acesso, a atualização da homepage do Projeto entre outras da área.</p>

      <p>Os alunos do curso Técnico em Geoprocessamento tem a responsabilidade de gerar o banco de dados das ocorrências, os mapas temáticos, pontuando os casos de Dengue e Hepatite A baseados nos dados fornecidos pela Secretaria municipal de saúde, de atualizar o mapa base municipal, participam das capacitações periódicas ofertadas pelo projeto a equipe dos gestores públicos municipais, a fim de que se tornem proficientes na geração de produtos cartográficos, atualização dos dados no SIG e manuseio de softwares e aparelhos receptores de sinal GPS.</p>

      <p>Os alunos do curso Técnico em Enfermagem realizam ações de educação em saúde nas comunidades baseados nos resultados obtidos pelos mapeamentos dos agravos em questão e participam de ações desenvolvidas pela secretaria de saúde na comunidade, instruindo os moradores sobre a prevenção da Dengue e da Hepatite A. O projeto conseguiu atender todas as suas metas antes do período planejado, e as secretarias municipais integrantes continuam gerando novas demandas. Os bolsistas estão atendendo as solicitações sem grandes dificuldades. </p>

      <p>A ampliação e a diversificação das ações desenvolvidas pelo aumento das demandas modificaram as características do projeto, o aderindo um status de programa. Assim surgiu a necessidade de modificar o projeto para edição do ano de 2013, passando de projeto para programa. Com estes fatos tem-se a perspectiva de que o Programa e as parcerias tornem-se contínuo e permanente.</p>
    </div>
    <hr>
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
