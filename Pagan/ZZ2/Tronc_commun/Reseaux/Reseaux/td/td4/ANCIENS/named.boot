;	MC Vialatte	13/12/94

;	repertoire ou se trouvent la base de donnees pour le domaine
directory	/etc/namedb

;	nom du domaine
domain		univ-bpclermont.fr

;	custsv est serveur primaire pour lui-meme
;primary		0.0.127.in-addr.arpa	named.local

;	custsv est serveur secondaire pour univ-bpclermont.fr
;	et il recupere les infos a partir du fichier
;		ubp.db de 103	pour univ-bpclermont.fr
;		ubp.rev de 103	pour 192.54.142.*
;		ubp51.rev	pour 193.54.51.*

;secondary	univ-bpclermont.fr	192.54.142.103	ubp.db
;secondary	142.54.192.in-addr.arpa	192.54.142.103	ubp.rev
secondary     	univ-bpclermont.fr		195.221.122.100 ubp.db
secondary	122.221.195.in-addr.arpa 	195.221.122.100 ubp.rev
secondary	51.54.193.in-addr.arpa	 	195.221.122.100	ubp51.rev

;	custsv a un cache pour le domaine local, dans le fichier named.ca
cache		.			named.ca

