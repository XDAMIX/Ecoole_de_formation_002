# Ecoole_de_formation_002
Un projet de gestion d'école de formation : interface utilisateur conviviale pour informations, inscriptions, localisation, et gestion administrative efficace des formations, enseignants, étudiants, et site web.

LOGO
-----------------
logo+coleur blanc


alPaccino---Pages Traitées:
---------------------------
informations
présentation






BUGS DE SITE COTé ADMINISTRATEUR:
--------------------------------------------------------------------------------------------------
*messages alert sont en anglais -> changer vers le français
*garder le menu vertical collapsed si son état est collapsed (petit just les icones qui apparaits)

-informations -> il manque les messages de sweet alert 
-informations -> il manque la suppression de réseau social

-présentation de l'école -> il manque l'affichage croisé


-affichage des pré-inscriptions
-lorsqu'on modifie la pré-inscription quand ont clique sur enregistrer/annuler elle renvoie vers le site clients
-lorsqu'on valide la pré-inscription quand ont clique sur enregistrer/annuler elle renvoie vers le site clients

-ajouter le transfer de la table pré-inscription vers la table etudiants
-ajouter un étudiant -> la requette donne erreure (il manque le champ formation)




A AJOUTER A LA FIN INSCRIPTION
-------------------------------
ajouter un champs 'valide' de type 'boolean' => lorsqu'ont valide l'inscription => 'true'
pour calculer plutard combien il ya l'argent aujourd'huit avec le teste => valide=true,sum_montant