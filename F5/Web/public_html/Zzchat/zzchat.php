
<?php
 

include("includes/tete.php"); 


// ====================  Title =============================================
	if($lang == 'fr')
	{				
		echo "Accueil ZzChat";
	}
	else
	{		
		echo "Home ZzChat";		 
	}		
include("includes/entete.php"); 

//==================== Check if the user is log===============================
if(isset($_SESSION['pseudo']))
{
?>
	<!-- Script to manage the message display -->
	<script type="text/javascript">

		
	$(function() {
		// send new message without refresh
		$('#writeform').on('submit',function() {
			 var message = $('#writeMess').val();
			$.post("includes/writeMess.php",{"writeMess":message},function() {
				refreshChat();
			});
			refreshChat();
			$('#writeMess').val('');
			return false;	
		});

		// Refresh chat frame
		function refreshChat() {
			$.post('includes/scanMessList.php',function(content){
			$('#listMess').html(content);
			var mondiv=document.getElementById("listMess");
			mondiv.scrollTop=mondiv.scrollHeight;
			});
		
			setTimeout(refreshChat, 5000);
		}

		// Refrash Users frame
		function refreshUsers() {
			$.post('includes/scanUserList.php',function(content){$('#listUser').html(content);});
			setTimeout(refreshUsers, 5000);
		}

		refreshUsers();
		refreshChat();
	});

	</script>
			
			<h1>ZzChat</h1>
			<p class="titleUser"> Utilisateur Connecté : </p>
			<!-- User display -->
			<div id="listUser"></div>
			<!-- Message display -->
			<div id="listMess"></div>
			<div id="chat">

			<p><img src="images/italic.png" alt="italic" title="button italic" class="icone" id="italic"/>
			<img src="images/underline.png" alt="italic" title="button italic" class="icone" id="underline"/>
			<img src="images/bold.png" alt="italic" title="button italic" class="icone" id="bold"/></p>
			<!-- Message field -->
			<form id="writeform" method="post" action="#" >
				<p><input type="text" name="writeMess" id="writeMess"/> </p>
				<p><input type="submit" value="Envoyer" id="button" class="validMess"/></p>
			</form>
		</div>
		<script type="text/javascript">
		// A MODIFIER POUR GARDER LE FOCUS AU CENTRE http://www.siteduzero.com/tutoriel-3-34703-insertion-de-balises-dans-une-zone-de-texte.html
		$('#italic').click(function()
		{ 
		   $('#writeMess').val($('#writeMess').val()+'[i][/i]');
		})
		
		$('#bold').click(function()
		{ 
		   $('#writeMess').val($('#writeMess').val()+'[b][/b]');
		})
		
		$('#underline').click(function()
		{ 
		   $('#writeMess').val($('#writeMess').val()+'[u][/u]'); 
		})
		</script>
	<?php 
}
else
{
?>

	<p>
	<?php
		if($lang == 'fr')
		{				
			echo "Vous n'êtes pas autorisez à accéder a cette page. Veuillez vous <a href='index.php'>identifier</a>";
		}
		else
		{		
			echo "You cannot acces at this page. You must be logon <a href='index.php'>identifier</a>";		 
		}
	?>		
	</p>
	
<?php
}
?>



<?php include("includes/footer.php"); ?>
