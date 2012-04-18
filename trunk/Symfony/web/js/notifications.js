$(document).ready(function(){
	setInterval(chargerNews,5000);
	
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


var dernier_id;
function setId(id){
    dernier_id = id;
}

function chargerNews(){
	
    jQuery.ajax({
        url: 'http://localhost/ProjetAnnee/web/app_dev.php/notification/'+dernier_id+'/last',
        success: function(data){
            if(data!=''){
            	
            	if(!dernier_id)
            		{
            			$('#news-box').html(data);
            			
	            		if($('#news-box').children().size() == 0)
	            		{
	            			$('#news-box').html("<br><br><br>Aucune actualité pour le moment !");
	            		}	
            		}
            	else
            		{
	            		$(data).prependTo('#news-box').hide().animate({'height':'toggle','opacity':'toggle'},2000);
	                    	
	                    if($('#news-box').children().size() > 6 )
	                    	{
	                    		$('#news-box li:last-child').animate({'height':'toggle','opacity':'toggle'},2000,function()
	                    				{
	                    					$(this).remove();
	                    				});
	                    	}
	            		
            		}
                
                
            }
            else
            	if($('#news-box').children().size() == 0)
        		{
        			$('#news-box').html("<br><br><br>Aucune actualité pour le moment !");
        		}	
        }
    });
}
