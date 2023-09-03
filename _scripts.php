<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

<script>

    //modal autofocus
    $(document).on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus();
      $(this).find('[autofocus]').select();
    });

	function btnLoader(formObj){
		formObj.disabled = true;
		formObj.innerHTML = "processing ...";
		return true;  
	}

    //customs
    $(document).ready(function() {

        $('#tab1-tab').click(function(){
            $(this).addClass("bordered-btn-active");
            $('#tab2-tab').removeClass("bordered-btn-active");
            $('#tab3-tab').removeClass("bordered-btn-active");
            $('#tab4-tab').removeClass("bordered-btn-active");

            $('#tab1').addClass("show active");
            $('#tab2').removeClass("show active");
            $('#tab3').removeClass("show active");
            $('#tab4').removeClass("show active");
        });

        $('#tab2-tab').click(function(){
            $(this).addClass("bordered-btn-active");
            $('#tab1-tab').removeClass("bordered-btn-active");
            $('#tab3-tab').removeClass("bordered-btn-active");
            $('#tab4-tab').removeClass("bordered-btn-active");

            $('#tab1').removeClass("show active");
            $('#tab2').addClass("show active");
            $('#tab3').removeClass("show active");
            $('#tab4').removeClass("show active");
        });

        $('#tab3-tab').click(function(){
            $(this).addClass("bordered-btn-active");
            $('#tab1-tab').removeClass("bordered-btn-active");
            $('#tab2-tab').removeClass("bordered-btn-active");
            $('#tab4-tab').removeClass("bordered-btn-active");

            $('#tab1').removeClass("show active");
            $('#tab2').removeClass("show active");
            $('#tab3').addClass("show active");
            $('#tab4').removeClass("show active");
        });

        $('#tab4-tab').click(function(){
            $(this).addClass("bordered-btn-active");
            $('#tab1-tab').removeClass("bordered-btn-active");
            $('#tab2-tab').removeClass("bordered-btn-active");
            $('#tab3-tab').removeClass("bordered-btn-active");

            $('#tab1').removeClass("show active");
            $('#tab2').removeClass("show active");
            $('#tab3').removeClass("show active");
            $('#tab4').addClass("show active");
        });

    });

</script>