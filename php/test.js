

$(document).ready(function($) {


	function charger(){

    setTimeout( function(){
        // on lance une requête AJAX
        $.ajax({
            async: true,
            url: "chat_msg.php",
            type : "POST",
            data : 'charger=' + "",
            dataType: "text",
           success : function(retour, statut){
            varr = JSON.parse(retour);


            $('#messages').text(' ');

            for (let i = 0; i < varr.length; i++) {

            	$('#messages').append(varr[i] + '<br>');
  
            }

           	

           }
        });

        charger(); // on relance la fonction

    }, 800); 

    }

      



	$("#envoi_msg").click(function() {

  

    val = $('#msg').val();


    if(val != ""){
    

       $.ajax({

            async: true,
            url: "chat_msg.php",
            type : "POST",
            data : 'msg=' + val,
            dataType: "text",
           success : function(retour, statut){
    
           	

           },

           error : function(resultat, statut, erreur){

           }

        });

    }



       });

	    charger();

    

	});





