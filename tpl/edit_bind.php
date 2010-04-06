<p>This bind</p>
<?=$_GET['item']?>
<form><input type="text" id="color" name="color" value="#123456" /></form>
<div id="colorpicker"></div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#colorpicker').farbtastic('#color');
  });
</script>
