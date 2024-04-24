<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Formulaire  diner gala</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script>
        function checkout1() {



              CinetPay.setConfig({
                apikey: document.getElementById('ml1').value, //   YOUR APIKEY
                site_id: document.getElementById('ml2').value, //YOUR_SITE_ID
                notify_url: 'https://topdigitalevel.site/formulaire_programme/notify.php?elment='+document.getElementById('leidtraite').value,
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: +document.getElementById('montanttraite').value,
                currency: 'XOF',
                channels: 'ALL',
                description: 'Paiement de participation',   
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:document.getElementById('nomtraite').value,//Le nom du client
                customer_surname:"",//Le prenom du client
                customer_email: document.getElementById('mailtraite').value,//l'email du client
                customer_phone_number: document.getElementById('teltraite').value,//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "ABIDJAN",// La ville du client
                customer_country : "CI",// le code ISO du pays
                customer_state : "CI",// le code ISO l'�tat
                customer_zip_code : "99326", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                	endingStatus("NO");
                } else if (data.status == "ACCEPTED") {
                	endingStatus("OK");
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });


            
        }
    </script>
    <script>
        
    </script>
</head>
 </head>

    <body>
    <input type="text" value="<?php echo $_GET["xidasdesfddfdf"];?>" id="leidtraite" style="display: none">
      <input type="text" value="" id="montanttraite" style="display: none">
     <input type="text" value="" id="nomtraite" style="display: none">
     <input type="text" value="" id="teltraite" style="display: none">
     <input type="text" value="" id="mailtraite" style="display: none">
        <input type="text" value="" id="ml1" style="display: none">
     <input type="text" value="" id="ml2" style="display: none"> 
        <div class="sdk">
              <img src="img/gifmail.gif" height=150 width=150 >
           
        </div>
    </body>
     <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
   <script>

   function endingStatus(status){
if(status.includes("NO")){
	alert("Une erreur s'est produite lors du paiement");
}else{
	   var  idenreg=document.getElementById("leidtraite").value;
	   	
	   			 var fd = new FormData();
	   			    
	   			    fd.append("idenreg",idenreg);
	   			   $.ajax({
	   			       url: 'paymentSuccess.php',
	   			       type: 'post',
	   			       data: fd,
	   			       contentType: false,
	   			       processData: false,
	   			       success: function(content){
	   			    	window.open("formulaire_du_gala.html?xidasdesfddfdf="+idenreg)
	   			       }
	   			   });  


}

	   
   }
   
     function redirectpayment(){

   	 var  idenreg=document.getElementById("leidtraite").value;
   	 var sMail;
	 	 var sContant;
	 	 var idenreg;
	 	 var sNom;
	 	 var sContact;
   			 var fd = new FormData();
   			    
   			    fd.append("idenreg", idenreg);
   			   $.ajax({
              url: 'getParticipant.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(content){
   			  var arT=content.split("|");
   			 	sMail=arT[2];
   			 	sContant=arT[1];
   			 	idenreg=arT[0];
   			 	sNom=arT[3];
   				sMontant=arT[4];
   				sPOI=arT[7];
   				sAs=arT[8];
   			 document.getElementById('montanttraite').value=sMontant;
   			 document.getElementById('nomtraite').value=sNom;
   			 document.getElementById('teltraite').value=sContant;
   			 document.getElementById('mailtraite').value=sMail;
   			 document.getElementById('ml1').value=sPOI;
   			 document.getElementById('ml2').value=sAs;
   			
   			 checkout1();

   			 document.getElementById('ml1').value="";
   			 document.getElementById('ml2').value="";
   			       }
   			   });  




   			
   			
   		
    }
    redirectpayment();

     </script>
</html>  