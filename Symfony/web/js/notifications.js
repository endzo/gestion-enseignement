$(document).ready(function(){
	
	$('#destinataire').keyup(function(key)
			  {
			    if (this.value.length >= 3 || this.value == '')
			    {
			      $('#loader').show();
			      $('#jobs').load(
			        $(this).parents('form').attr('action'),
			        { query: this.value + '*' },
			        function() { $('#loader').hide(); }
			      );
			    }
			  });
	
	
	
	
	
	
	
	
	
	
	
	
	
	var alert = 1;
    /*$('#notif-box').hide();*/
	$('#notifcontent').hide();
	$('#msgcontent').hide();
	$('#alerte-content').hide();
	$('#forumcontent').hide();
	$('#courscontent').hide();
	
	$('#alerte-notif').click(
		function()
		{
			$('#alertnotif').fadeTo("slow", 0.33);
			$('#notifcontent').slideUp('slow');
			$('#msgcontent').slideUp('slow');
			$('#alerte-content').slideToggle('slow');
			$('#nbr-alerte').html('');
			$('#nbr-alerte').removeClass('warningbox');
			
			
		});
		
	$('#notifnotif').click(
		function()
		{
			$('#notifnotif').fadeTo("slow", 0.33);
			$('#alertcontent').slideUp('slow');
			$('#msgcontent').slideUp('slow');
			$('#notifcontent').slideToggle('slow');
			$('#nbr-notif').html('');
			$('#nbr-notif').removeClass('nbr');
		});
		
	$('#msgnotif').click(
		function()
		{
			$('#msgnotif').fadeTo("slow", 0.33);
			$('#alertcontent').slideUp('slow');
			$('#notifcontent').slideUp('slow');
			$('#msgcontent').slideToggle('slow');
			$('#nbr-msg').html('');
			$('#nbr-msg').removeClass('nbr');
		});
		
	$('#forum').click(
		function()
		{
			$('#courscontent').slideUp('slow');
			$('#forumcontent').slideDown('slow');
		});
		
	$('#cours').click(
		function()
		{
			$('#forumcontent').slideUp('slow');
			$('#courscontent').slideDown('slow');
		});
		
	function timer()
	{
		var dt=new Date();	
		
		
		//alert(dt.getSeconds());
		if(dt.getSeconds() == 30 || dt.getSeconds() == 11 || dt.getSeconds() == 13 || dt.getSeconds() == 14 || dt.getSeconds() == 2)
		{
			$('#alertnotif').fadeTo("slow", 1);
			$('#alertnbr').html('3');
			$('#alertnbr').addClass('nbr');
			$('#alertnbr').effect("bounce", { times:3 }, 300);
		}	
			
		$('#conversation').load('index.html.twig');
		setTimeout(timer, 1000);
	}
  	timer();

});
