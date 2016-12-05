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
* Slider chat à adopter en france (dernière annonce)

Guillaume : 

Maël :
* Plugin France

Sylvain : 

Reste à attribuer/faire : 
* Css global (SASS)
* SEO ?
* Architecture global du site
* Chat du jour
* Script génération Json chat au hasard + google image + nom aléatoire.
* Widget Twitter chat à adopter
* Widget Top 5 chat
* Possibilité de liker les chats (1 like max par personne ofc)
* Widget Dernier chat adopté

**QUESTION : **
--

Est ce qu'on met en place des migrations  pour les databases histoire qu'on ait tous les mêmes.

Autre question : pour le plugin de carte j'ai besoin d'une table **cat** et dedans y'a une donnée c'est **location** qui correspond à la région d'où il provient.

Vous voulez créer une table à part genre **department**  et du coup un join dans **cat** avec **location_id** ? C'est uniquement si département a une utilité ailleurs. En gros est ce qu'un vendeur a un département ou on s'en fou et on se contente du département du chat puisqu'a priori c'est le même. **OU** est-ce que vous voyez une autre utilité/nécessité de faire une table **department** ?
