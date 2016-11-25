Comment importer le projet
--

* Partir de son wordpress dans son dossier root sur le serveur
**Dans une fenêtre bash**
* `rm -rf wp-content`
* `git clone git@github.com:Baldrani/Blog-Wordpress.git`
* `cd Blog-Wordpress`
* `mv * ../`
* `cd ..`
* `rm -rf Blog-Wordpress`

Ca devrait être bon.

Bonne pratique : 
--
Quand vous éditez quoi que ce soit, **FAITE UNE BRANCHE PLS** comme ça on garde un repo clean et on se marche pas dessus ;).

PS
--
Il se peut que vous deviez configurer votre clef SSH, regardez `Settings > SSH` sur Github


**RÉPARTITION DES TÂCHES**
--

Douae : 

Guillaume : 

Maël :
* Plugin France

Sylvain : 

Reste à attribuer/faire : 
* Wireframe : Catégorie + Article
* Chat du jour
* Slider chat à adopter en france (dernière annonce)
* Script génération Json chat au hasard + google image + nom aléatoire.
* Widget Twitter chat à adopter
* Widget Top 5 chat
* Possibilité de liker les chats (1 like max par personne ofc)
* Widget Dernier chat adopté
