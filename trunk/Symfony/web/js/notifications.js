$(document).ready(function(){
	setInterval(chargerNews,5000);
	setInterval(incomingMessages,5000);	
	
	
	$('#news-content').scrollToFixed({
        marginTop: $('userToolBar').outerHeight() + 10,
        limit: $('#footer').offset().top - $('#news-content').outerHeight() - 10,
        zIndex: 999
    });
	
	
	
	$('#champs').keyup(function(key)
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
	$('#msg-content').hide();
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
		
		
	$('#msg-notif').click(
		function()
		{
			$('#msg-notif').fadeTo("slow", 0.33);
			$('#alerte-content').slideUp('slow');
			$('#notifcontent').slideUp('slow');
			$('#msg-content').slideToggle('slow');
			$('#nbr-msg').html('');
			$('#nbr-msg').removeClass('warningbox');
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
        url: '/ProjetAnnee/web/app_dev.php/notification/'+dernier_id+'/last',
        success: function(data){
            if(data!=''){
            	
            	if(!dernier_id)
            		{
            			$('#news-box').html(data).hide().slideDown('slow');
            			
	            		if($('#news-box').children().size() == 0)
	            		{
	            			$('#news-box').html("<br><br>Aucune actualité pour le moment !");
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



function incomingMessages()
{	
	jQuery.ajax({
	    url: '/ProjetAnnee/web/app_dev.php/nouveaux_messages',
	    success: function(data){
	    	$('#msg-box').html(data);
	    	var nbr = $('#msg-box').children().size();
	    	//alert(data);
	    	if(nbr == 0)
	    		{
	    			$('#msg-box').html("<div class='alert alert-danger'>Pas de nouveaux messages !</div>");
	        		$('#nbr-msg').html('');
	    			$('#nbr-msg').removeClass('warningbox');
	    		}
	    	else
	    		{
	    			$('#msg-notif').fadeTo("slow", 1);
	    			$('#nbr-msg').html(nbr);
	    			$('#nbr-msg').addClass('warningbox');
	    		}
	    	
	    }
	});
	
}

