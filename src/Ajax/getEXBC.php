<?php 
Namespace App\Ajax;

use App\Data\DataCompteAc;
use App\Metier\LogicSession;
require '../../vendor/autoload.php';


 
function t() {
    $logicS = new LogicSession();
        $logicS->initSession();
    $json = array();
        $json["success"] = false;
    $userid = htmlspecialchars($_SESSION["userid"]);
    if(!$userid) {
        return $json;
    }
    $var = new DataCompteAc();
    $data = $var->getAllLineComptesAc($userid);
    if(count($data) <= 1) {
        return $json;
    }
    $json["success"] = true;
    $json["data"] = $data;
    return $json;
}


echo json_encode(t());