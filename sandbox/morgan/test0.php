<script type="text/javascript">
$(document).ready(function() {
alert()'test');
jQuery(document).ready(function(){              
$("#click").click(function() {
    $("#ccc").slideDown('fast').show();
    $(this).removeClass('bbb').addClass('aaa');
});
$("#click").click(function() {
    $("#ccc").slideDown('fast').hide();
    $(this).removeClass('aaa').addClass('bbb');
});
});
});
</script>
<style>
#ccc{display:none;}
</style>
<div id="click" class="bbb">click</div>
<div id="ccc">hello world</div>