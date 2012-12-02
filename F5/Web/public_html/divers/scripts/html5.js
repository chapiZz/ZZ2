


// Verification de la version de firefox pour avertir l'utilisateur

if(/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
	var ff_version = new Number(RegExp.$1);
	
	if(ff_version < 5)
	{	
		alert(" Ce site est développé en Html5 et Css3. Votre navigateur étant obsoléte, l'affichage de ce site risque d'être altéré");
	}
}


