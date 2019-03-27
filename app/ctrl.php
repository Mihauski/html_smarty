<?php
/* Main controller script. It's the only one entry point currently, and so it needs to load the config. */
require_once dirname(__FILE__).'/../config.php';

//get the ACTION name ("action" parameter)
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

//As the app is quite simple, switch-controlled approach should be enough
switch ($action) {
	default : // 'calcView'
	    //load the subcontroller definitions
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
		//create and use the object
        $ctrl = new CalcCtrl ();
        //generate the view
		$ctrl->generateView ();
    break;
    
	case 'ArithmeticCalc' :
		include_once $conf->root_path.'/app/calc/CalcCtrl.class.php';
        $ctrl = new CalcCtrl ();
        //the difference is, we are processing the request
		$ctrl->process ();
    break;

    case 'CreditCalcView' :
        include_once $conf->root_path.'/app/credit/CreditCtrl.class.php';
        $ctrl = new CreditCtrl();
        $ctrl->generateView();
    break;

	case 'CreditCalc' :
        include_once $conf->root_path.'/app/credit/CreditCtrl.class.php';
        $ctrl = new CreditCtrl();
        $ctrl->process();
	break;
}