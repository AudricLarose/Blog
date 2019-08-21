<?php
namespace controller;

require './Model/model.php';
require './Model/Commande.php';
class Lancement_session_controller 
{
    public function session_go()
    {
        session_start();
    }
}
