<script type="text/javascript" src="{{ asset('js/tarteaucitron/tarteaucitron.js')}}"></script>
<script type="text/javascript">
	tarteaucitron.init({
		"hashtag": "#tarteaucitron", /* Ouverture automatique du panel avec le hashtag */
		"highPrivacy": false, /* désactiver le consentement implicite (en naviguant) ? */
		"orientation": "bottom", /* le bandeau doit être en haut (top) ou en bas (bottom) ? */
		"adblocker": false, /* Afficher un message si un adblocker est détecté */
		"showAlertSmall": false, /* afficher le petit bandeau en bas à droite ? */
		"cookieslist": true, /* Afficher la liste des cookies installés ? */
		"removeCredit": true, /* supprimer le lien vers la source ? */
		//"cookieDomain": ".example.com" /* Nom de domaine sur lequel sera posé le cookie pour les sous-domaines */
	});
	(tarteaucitron.job = tarteaucitron.job || []).push('facebookcomment');
	tarteaucitron.user.gtagUa = 'UA-56116805-1';
	tarteaucitron.user.gtagMore = function() { /* add here your optionnal gtag() */
	};
	(tarteaucitron.job = tarteaucitron.job || []).push('gtag');
	(tarteaucitron.job = tarteaucitron.job || []).push('adsense');
    @if (app()->environment() === 'production')
		tarteaucitron.user.facebookpixelId = '366451307267328';
	tarteaucitron.user.facebookpixelMore = function() { /* add here your optionnal facebook pixel function */
	};
	(tarteaucitron.job = tarteaucitron.job || []).push('facebookpixel');
    @endif
</script>