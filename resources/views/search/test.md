_Michaël Lebeau_

_04/12/17_

# Bug Tracker

## Introduction

En tant que développeur, nous sommes amenés à réaliser des projets pour des clients.

Une fois ces demandes terminées et avant la phase de livraison, nous devons effectuer les phases de retour client qui sont le moment de récolter les multiples bugs à résoudre, surtout dans des langages typés tel Java ou Ruby.

Ainsi, le management du retour client se gère le plus souvent par mail/téléphone dans des petites entreprises mais dès que l&#39;on passe dans des structures un peu plus importantes (&gt;10 personnes) ou avec de multiples projets simultanés, il est nécessaire d&#39;avoir un Bug Tracker afin de ne pas se perdre dans les mails et les demandes clients afin de pouvoir partager l&#39;information entre tous les membres de l&#39;équipe facilement.

## Le marché

Les Bug Tracker sur le marché sont assez nombreux mais les vrais hits se comptent sur les doigts de la main :

- BugZilla &amp; Mantis BT : Gratuit
- HP Quality Center : Période d&#39;essai
- Jira Software : Période d&#39;essai mais optimisé pour les équipes agile. _(Celui choisi par mon entreprise)_


Trello : Gratuit pour les petites équipes

Les outils intégrés aux bug trackers sont multiples : recherche avancée, formats différents &amp; export, rapports planifiés, détection de doublon, …

Selon les outils, ils s&#39;installent soit en poste par poste comme un logiciel avec une base de donnée individuelle ou commune ou alors il s&#39;agit d&#39;un site web installé sur un serveur commun.

Pour que le client y ait accès, en mode logiciel, le leur devra utiliser la base de donnée de l&#39;entreprise (ou du poste) et vous devez donc prévoir une adresse IP à attribuer qui sort de votre entreprise.

Dans le cas d&#39;un site web, une fois installé sur le serveur, il faut y attribuer une adresse IP et l&#39;envoyer au client (ou nom de domaine associé).

## Le WorkFlow

| Développement =&gt; | Retour Client =&gt; | Bug : Ouverture d&#39;un ticket  =&gt; | Ping pong d&#39;explications entre client et développeurs =&gt; | Résolution d&#39;un ticket : attribution à un membre de l&#39;équipe =&gt; | Vérification =&gt; |
| --- | --- | --- | --- | --- | --- |

et on recommence jusqu&#39;à la fermeture du ticket.

## Avantages

La principale qualité du workflow lors des tickets clients c&#39;est de définir si le ticket est bien un bug à résoudre dans l&#39;existant ou dans l&#39;application demandée et non pas une demande d&#39;évolution qui n&#39;est pas prévue à la base par contrat et qui évite d&#39;allonger les phases de développement de manière inutile.

L&#39;outil de recherche avancée ou de détection de doublon permet d&#39;accélérer ces phases de debug.

En terme de management de projet, ce système de bug ticket ainsi que leur génération dans des tableaux Scrum avec des échéances permettent une optimisation des méthodes agiles en entreprise.

De façon générale, le système de bug tracking est le plus utile dès lors que l&#39;interlocuteur principal du client est un chef de projet qui permet de mieux détailler les tickets dans le bug tracker et de faire le ping pong entre développeurs et clients pour optimiser les temps de développement.

## Conclusion

La gestion empirique du rapport au client via le téléphone/mail est possible dans des très petites entreprises mais dès lors que les commandes s&#39;accumulent et les problèmes aussi, un système de ticket est obligatoire.

Cela vaut pour les développeurs mais également pour tout corps de métier : graphistes, intégrateurs, etc ..

Ils pourront se tenir au bug tracker avec une gestion des demandes de l&#39;utilisateurs et des erreurs commises au cours de la livraison. Ces systèmes s&#39;intègrent dans des organisations pouvant associer une gestion de code source (git), une intégration continue (jenkins), des outils de gestion de planning de projets, ...

## References

[1] [https://fr.wikipedia.org/wiki/Logiciel\_de\_suivi\_de\_probl%C3%A8mes](https://fr.wikipedia.org/wiki/Logiciel_de_suivi_de_probl%C3%A8mes)

[2] [https://www.atlassian.com/software/jira](https://www.atlassian.com/software/jira)

[3] [https://blog.testingdigital.com/bug-tracker-8-outils-a-connaitre-100](https://blog.testingdigital.com/bug-tracker-8-outils-a-connaitre-100)

[4] [https://www.bugzilla.org/](https://www.bugzilla.org/)

[5] [https://blog.trello.com/how-to-transform-trello-into-a-powerful-bug-tracker-with-the-marker-power-up](https://blog.trello.com/how-to-transform-trello-into-a-powerful-bug-tracker-with-the-marker-power-up)