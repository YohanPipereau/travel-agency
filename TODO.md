# TODO List

## 1. Objectifs

* Il s’agit de réaliser un site Web pour notre agence de voyage permettant de proposer des circuits touristiques.

* Les clients ayant repéré des voyages intéressants peuvent aller en agence ou utiliser le catalogue papier et son formulaire à renvoyer par courrier pour réserver un voyage.

## 2. Principes du site

*  Il doit distinguer les visiteurs anonymes et les utilisateurs authentifiés (les collaborateurs de l’agence)
*  Il doit disposer d’un accés privilégié pour l’administration du site. L’administrateur est un membre prédéfini ayant une vision différente de l’application (il est le seul à pouvoir créer des comptes pour les collaborateurs de l’agence)
*  Le site comprend 3 parties :
        une  partie « Accueil » accessible à tous qui :
            affiche des informations générales : les objectifs du site, son fonctionnement, une rubrique « Actualités » (nouveautés, promotions…) et un lien contact pour joindre l’administrateur. Vous pouvez ajouter toute autre information que vous jugez utile.
            permet une consultation des circuits organisés prochainement
            permet aux collaborateurs de se connecter à l’application (authentification avec un login et un mot de passe)
        une partie « Front Office » consultée par les visiteurs, qui affiche la liste des voyages mis au catalogue, avec le détail de leurs étapes, les dates du voyage, etc.
        une partie « Back Office » réservée aux collaborateurs de l’agence (et à l’administrateur du site) qui affiche des écrans permettant d’ajouter, de modifier et de supprimer des informations : un circuit, ses étapes, une programmation au catalogue…
    Vous ajouterez tous les éléments nécessaires pour faire fonctionner le site au mieux, et de façon classique par rapport à la gestion d’un tel site Web.

## 3. Nos voyages

Dans notre agence, nous gérons les voyages avec les principes suivant :

* un circuit type se déroule dans un pays.
* un circuit est composé d’étapes. Le première étape correspond à la ville de départ. Et la dernière à ville d’arrivée (vers/depuis lesquelles les participants doivent être acheminés par avion, avec un regrouppement à l’arrivée sur la ville de départ, ce qui nous facilite la logistique)
* un circuit a une certaine durée prévue qui correspond à la somme des durées des étapes. Chaque circuit type se déroule plusieurs fois par an.
* les étapes pour un circuit type sont mentionnées au catalogue, et donnent un aperçu aux clients de ce qui les attend. Certaines étapes dans des villes particulièrement riches en visites peuvent durer plusieurs jours. Ces étapes peuvent varier légèrement : ordre ou durée lorsque les circuits se dérouleront effectivement, mais c’est sans importance pour la mise au catalogue sur le site, puisque cette information n’est pas contractuelle (dépendant des contraintes logistiques sur site, force majeure, etc.).
* un circuit type est programmé à différentes dates dans l’année, avec un certain nombre de places disponibles à chaque édition, qui seront réservées par les acheteurs du circuit. Le nombre de places disponibles et le prix peuvent évoluer en fonction de notre politique commerciale et des contraintes locales (vacances, climat, disponibilité de l’hébergement ou du personnel chez les partenaires locaux, etc.).

Par ailleurs, nous avons un système de gestion de relation client sur mainframe qui nous permet de gérer les réservations, la facturation, et le déroulé des circuits, mais ses détails ne vous concernent pas dans le cadre de ce projet.

## 4. Structure

index.html/
    sign-in/
    sign-up/
    contact/
    show-travel/ #list all travels available
    account/ #customer account 
        info/
        travel-basket/
            id1
            id2
    admin/ #admin account
        travel/
            add/
            delete/
                id1
                id2
            edit/
                id1
                id2
