</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="js/plugins/morris/raphael.min.js"></script>
<script src="js/plugins/morris/morris.min.js"></script>
<script src="js/plugins/morris/morris-data.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    //Esconde preloader
    $(window).load(function(){
        $('#preloader').fadeOut(1500);//1500 é a duração do efeito (1.5 seg)
        $('#conteudo').fadeIn(1500);//1500 é a duração do efeito (1.5 seg)
        $('#conteudo').style.display = 'block';
    });

});
</script>

</body>

</html>
