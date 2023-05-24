<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'tournoi' => [
        'title'          => 'Tournois',
        'title_singular' => 'Tournoi',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'nom_tournoi'           => 'Nom Tournoi',
            'nom_tournoi_helper'    => ' ',
            'date_de_debut'         => 'Date De Debut',
            'date_de_debut_helper'  => ' ',
            'date_de_fin'           => 'Date De Fin',
            'date_de_fin_helper'    => ' ',
            'nombre_equipes'        => 'Nombre Equipes',
            'nombre_equipes_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'equipe' => [
        'title'          => 'Equipes',
        'title_singular' => 'Equipe',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'nom_equipe'        => 'Nom Equipe',
            'nom_equipe_helper' => ' ',
            'nom_coach'         => 'Nom Coach',
            'nom_coach_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'joueur' => [
        'title'          => 'Joueurs',
        'title_singular' => 'Joueur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'nom_joueur'               => 'Nom Joueur',
            'nom_joueur_helper'        => ' ',
            'prenom'                   => 'Prenom',
            'prenom_helper'            => ' ',
            'date_de_naissance'        => 'Date De Naissance',
            'date_de_naissance_helper' => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'dossard'                  => 'Dossard',
            'dossard_helper'           => ' ',
            'poste'                    => 'Poste',
            'poste_helper'             => ' ',
            'age'                      => 'Age',
            'age_helper'               => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'nom_equipe'               => 'Nom Equipe',
            'nom_equipe_helper'        => ' ',
        ],
    ],
    'rencontre' => [
        'title'          => 'Rencontre',
        'title_singular' => 'Rencontre',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'equipe_1'             => 'Equipe 1',
            'equipe_1_helper'      => ' ',
            'equipe_2'             => 'Equipe 2',
            'equipe_2_helper'      => ' ',
            'date_et_heure'        => 'Date Et Heure',
            'date_et_heure_helper' => ' ',
            'resultat_1'           => 'Resultat 1',
            'resultat_1_helper'    => ' ',
            'resultat_2'           => 'Resultat 2',
            'resultat_2_helper'    => ' ',
            'arbitre'              => 'Arbitre',
            'arbitre_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],

];
