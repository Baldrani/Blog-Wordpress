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
Quand vous éditez quoi que ce soit, **FAITE UNE BRANCHE PLS** comme ca on garde un repo clean et on se marche pas dessus ;).


PS
--
Il se peut que vous devier configurer votre clef SSH, regarder `Settings > SSH` sur Github
