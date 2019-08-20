<?php
require './Model/model.php';
require './Model/Commande.php';
namespace model;

class Lancement_session_controller 
{
    public function session_go()
    {
        session_start();
    }
}
