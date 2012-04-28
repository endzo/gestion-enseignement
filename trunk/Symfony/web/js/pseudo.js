var userId;
	function setUserId(id)
	{
		userId = id;
	}
	

$(document).ready(function(){

	
	jQuery.ajax({
	    url: '/ProjetAnnee/web/app_dev.php/user/'+userId+'/edit_pseudo',
	    success: function(data){
	    	if(data != '')
	    		{
	    			$('#form-pseudo').html(data);
	    		}
	    	else
	    		{
	    			$('#form-pseudo').html('<div class="alert alert-danger">impossible de charger le formulaire veuillez contacter l Admin du site !!</div>');
	    		}
	    }
	});
	
	
	$('body').append('<div id="fade"></div>');
	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

});