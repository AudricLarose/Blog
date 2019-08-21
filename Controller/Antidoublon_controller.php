<?php
namespace controller ;

class Antidoublon_controller
{
    public function antidoublons($x, $y)
    {
        $data= new \model\Affichage();
        $recherche= $data->spot($x);
        if (isset($recherche)) {
            foreach ($recherche as $recherches) {
                if (in_array($y, $recherches)) {
                    return true;
                    exit();
                }
            }
        }
    }
}
