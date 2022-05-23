<?php include ('vues/navbar.php'); ?>
<div class="bg-image"

     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 120vh; background-size: cover;" >
<!-- Début de widget en ligne Calendly -->
<div class="calendly-inline-widget" data-url=<?php echo 'https://calendly.com/dayvin30/itv1h/2021-12-16T14:15:00+01:00?month=2021-12&date=2021-12-16&a3='.$_GET["lieu"] ?> style="min-width:320px;height:630px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Fin de widget en ligne Calendly -->