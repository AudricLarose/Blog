<?php
function sessionactive() {
    if (isset($_SESSION['admin'])) {
        if ($_SESSION['admin']=='ok') {
            $session='ok';
            return $session;
        }
    }
}