<?php
	//load config
	require_once dirname(__FILE__).'../../config.php';
	//load security check
	//include _ROOT_PATH.'/app/security/check.php';
	//załaduj Smarty
	require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
	
	function getParams(&$liczKredyt,&$kwota,&$ileLat,&$oprocentowanie,&$debug) 
	{
		$liczKredyt = isset($_REQUEST['liczKredyt']) ? $_REQUEST['liczKredyt'] : null;
		$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
		$ileLat = isset($_REQUEST['ileLat']) ? $_REQUEST['ileLat'] : null;
		$oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
		$debug = isset($_REQUEST['debug']) ? $_REQUEST['debug'] : null;
	}


	function validate(&$liczKredyt, &$kwota, &$ileLat,&$oprocentowanie,&$messages)
	{
		if(!isset($liczKredyt))
		{
			return false;
		}

		if(!(isset($liczKredyt) && isset($kwota) && isset($ileLat) && isset($oprocentowanie)))
		{
			return false;
		}

		if($liczKredyt == "tak" && !(isset($kwota) && isset($ileLat) && isset($oprocentowanie)))
		{
			$messages [] = 'Błędne informacje do kredytu. Brak jednego z parametrów.';
		}

		if($liczKredyt == "tak")
		{
			if ($kwota == "") $messages[] = 'Nie podano kwoty kredytu';
			if ($ileLat == "") $messages[] = 'Nie podano długości kredytu w latach';
			if ($oprocentowanie == "") $messages [] = 'Nie podano oprocentowania kredytu';
		}

		//nie walidujemy dalej gdy nie ma parametrów.
		if(count($messages) != 0) return false;

		if($liczKredyt == "tak" && !(is_numeric($kwota) && is_numeric($ileLat) && is_numeric($oprocentowanie)))
		{
			$messages [] = 'Wartości w kredycie nie są liczbami całkowitymi.';
		}

		if(count($messages) != 0) return false;
			else return true;
	}

	function process(&$liczKredyt,&$kwota,&$ileLat,&$oprocentowanie,&$rataKredytu,&$calkowityKoszt)
	{
			//Część kredytowa
			$kwota = intval($kwota);
			$oprocentowanie = floatval($oprocentowanie);
			$ileLat = floatval($ileLat);

			//wartosci pomocnicze do wzoru
			$q = 1+(1/12)*($oprocentowanie/100);
			$mies = $ileLat*12;

			if($oprocentowanie != 0)
			{
				$rataKredytu = ($kwota*pow($q,$mies)*($q - 1))/(pow($q,$mies) - 1);
				$calkowityKoszt = number_format($rataKredytu*$mies,2,',',' ');
				$rataKredytu = number_format($rataKredytu,2,',',' ');
			}
			else 
			{
				$rataKredytu = $kwota/$mies;
				$calkowityKoszt = $kwota;
			}
	}

	$liczKredyt = null;
	$kwota = null;
	$ileLat = null;
	$oprocentowanie = null;
	$rataKredytu = null;
	$calkowityKoszt = null;
	$messages = array();

	//INIT
	getParams($liczKredyt,$kwota,$ileLat,$oprocentowanie,$debug);
	if(validate($liczKredyt,$kwota,$ileLat,$oprocentowanie,$messages)) process($liczKredyt,$kwota,$ileLat,$oprocentowanie,$rataKredytu,$calkowityKoszt);

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('heading',"Kalkulator kredytowy");
$smarty->assign('title',"PHPage :: Kalkulator kredytowy");

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('kwota',$kwota);
$smarty->assign('ileLat',$ileLat);
$smarty->assign('oprocentowanie',$oprocentowanie);
$smarty->assign('rataKredytu',$rataKredytu);
$smarty->assign('calkowityKoszt',$calkowityKoszt);
$smarty->assign('q',$q);
$smarty->assign('mies',$mies);
$smarty->assign('liczKredyt',$liczKredyt);
$smarty->assign('messages',$messages);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/credit_view.html');