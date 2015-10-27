<?php

define("__APP__", "../App/");
define("__CORE__", "../Core/");

include __CORE__."Application.php";
include __APP__."Controller/BaseController.php";

$app = new Application();

//include "Config/route.php";

return $app;

?>