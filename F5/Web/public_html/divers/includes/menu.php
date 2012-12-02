	<!-- Code like button -->
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
	
	<header>
		<a href="index.php" class="enteteLink"></a>
	</header>
	
	<!-- Définitions du menu de navigation -->
	<div id="menu">
	
		<nav>
			<ul id="listMenu">
	<?php if($lang =='fr')
	{ ?>

			<li><a href="index.php"> Accueil </a></li>
			<li><a href="projet.php"> Projets </a></li>
			<li><a href="CV.php"> Curriculum vitae </a></li>
			<li><a href="scola.php"> Scolarité </a></li>
			<li><a href="assoc.php"> Association </a></li>
			<li><a href="contact.php"> Contact </a></li>
		

	<?php
		}
		else
		{
		?>
			<li><a href="index.php"> Home </a></li>
			<li><a href="projet.php"> Projects </a></li>
			<li><a href="CV.php"> Curriculum vitae </a></li>
			<li><a href="scola.php"> Education </a></li>
			<li><a href="assoc.php">  </a></li>
			<li><a href="contact.php"> Contact </a></li>
		<?php
		}
		?>
		
			</ul>
		</nav>

	</div>
	<div id="teteCorps">
		<div id="logoMenu">
			<a href="https://plus.google.com/u/0/10491631306260525145"><img src="http://i.pcworld.fr/1223865-google-plus-pages-logo.png" alt="Google+" class="logoSoc"/></a>
			<a href="http://fr.linkedin.com/pub/quentin-chapelle/58/a98/266"><img src="http://blog.hubspot.com/Portals/249/images/linkedin-logo2.jpg" alt="linkedin" class="logoSoc"/></a>
			<a href="https://twitter.com/quentinchap"><img src="images/twitter.png" alt="twitter" class="logoSoc"/></a>
			<a href="https://www.facebook.com/leprogr"><img src="images/fb.png" alt="facebook" class="logoSoc"/></a>
		</div>
	</div>
	<div id="corps">
	<p> 
	<!-- Boutton réseaux sociaux -->

<span class="fb-like" data-href="http://fc.isima.fr/~chapelle" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true" data-action="recommend"></span>
<a href="https://twitter.com/share" class="twitter-share-button" data-via="quentinchap" data-lang="fr">Tweeter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<span class="g-plusone" data-size="medium" vertical-align="middle"></span><br/><br />
</p>
