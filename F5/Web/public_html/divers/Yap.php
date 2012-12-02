<?php include("includes/tete.php"); ?>
		<title> CHAPELLE Quentin F5 : Yap</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	

		<?php include("includes/menu.php"); ?>
	<p>
	<?php if(isset($_GET['maint']))
	{
		?>
		<span class="description"> Description : </span>
		<p>Ce projet fût réalisé pour l'occasion du stage obligatoire du Diplôme Universitaire de Technologie (DUT). 
		La mission fût confier par le Centre d'Investigation Clinique (CIC) rattaché au Centre Hospitalié Universitaire
		Gabriel Montpied à Clermont-Ferrand. Ce stage dura un peu moin de trois mois (dix semaines). Pendant cette période 
		je fis confronté à un environnement qui m'étais jusqu'ici totalement inconnu, le monde de la médecine. Cette immersion 
		dans ce nouveau domaine fût accompagné de contrainte et d'exigence nouvelle qui ont représenté un réelle défit. En effet,
		les médecins, infirmier et techniciens de laboratoire suceptible d'utiliser le logiciel dont j'avais la charge, n'avait
		qu'une connaissance limité de l'informatique. Quand à moi, leur milieux m'était complétement étrangé! Le premier défis 
		que j'eu à affronter fût donc de comprendre les bases de leurs recherche ainsi que leur maniére d'agir pour pouvoir 
		concevoir un logiciel qui leur conviendrais au mieux. Cette étape nécéssita donc un processus de discution, de documentation 
		et d'analyse assez poussé.</p>
	</p>
	<p>
		<a href="PDF/Stage2010IUTYAP.pdf"> Télécharger le rapport en format PDF.</a>
		
		
		
		<!-- Option 2 -->
		<embed src="PDF/Stage2010IUTYAP.pdf" width="830px" height="900px">
		<?php } 
		else
		 { echo "cette page est encore en construction"; } ?>
	</p>
		<?php include("includes/pied.php"); ?>
