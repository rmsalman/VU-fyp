<script src="assets/js/bootstrap.min.js"></script>

 <script>
$('a[data-target="#myModa2"]').click(function(){
  $('#myModa2').show();
$('#myModa2').addClass('in');
});

$('a[data-target="#myModal"]').click(function(){
  $('#myModal').show();
$('#myModal').addClass('in');
});


$('[data-dismiss="modal"]').click(function(){
  $('.modal').hide();
  $('.modal').removeClass('in');
});
</script>