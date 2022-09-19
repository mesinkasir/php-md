<?php include 'header.php';?>
<div class="container">
<?php include 'widget/nav.php';?>
<div class="row mt-3">
<div class="col-md-8 offset-md-2 p-3 p-md-5 card">
 <?php echo renderMarkdown($markdown); ?>
</div>
</div>
</div>
<?php include 'widget/footer.php';?>
