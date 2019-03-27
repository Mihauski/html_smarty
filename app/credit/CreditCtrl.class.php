<?php
//load Smarty
    require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
    //load class which is generating error messages/infos
    require_once $conf->root_path.'/lib/Messages.class.php';
    //load class generating form
    require_once $conf->root_path.'/app/credit/CreditForm.class.php';
    //load class generating result
    require_once $conf->root_path.'/app/calc/CreditResult.class.php';

    /***********************************/
    /*   Cretit Calculator Controller  */
    /***********************************/

class CreditCtrl 
{
    private $msgs;
    private $form;
    private $result;

    public function __construct() 
    {
        $this->msgs = new Messages();
        $this->form = new CreditForm();
        $this->result = new CreditResult();
    }

    public function getParams() 
	{
        $this->form->liczKredyt = isset($_REQUEST['liczKredyt']) ? $_REQUEST['liczKredyt'] : null;
        $this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
        $this->form->ileLat = isset($_REQUEST['ileLat']) ? $_REQUEST['ileLat'] : null;
        $this->form->oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
	}

	public function validate()
	{
		if(!isset($this->form->liczKredyt))
		{
			return false;
		}

		if(!(isset($this->form->liczKredyt) && isset($this->form->kwota) && isset($this->form->ileLat) && isset($this->form->oprocentowanie)))
		{
			return false;
		}

		if($this->form->liczKredyt == "tak" && !(isset($this->form->kwota) && isset($this->form->ileLat) && isset($this->form->oprocentowanie)))
		{
			$this->msgs->addError('Błędne informacje do kredytu. Brak jednego z parametrów.');
		}

		if($this->form->liczKredyt == "tak")
		{
			if ($this->form->kwota == "") $this->msgs->addError('Nie podano kwoty kredytu');
			if ($this->form->ileLat == "") $this->msgs->addError('Nie podano długości kredytu w latach');
			if ($this->form->oprocentowanie == "") $this->msgs->addError('Nie podano oprocentowania kredytu');
		}

		//no sense of further validation if errors.
		if(!$this->msgs->isError()) return false;

		if($this->form->liczKredyt == "tak" && !(is_numeric($this->form->kwota) && is_numeric($this->form->ileLat) && is_numeric($this->form->oprocentowanie)))
		{
			$this->msgs->addError('Wartości w kredycie nie są liczbami całkowitymi.');
		}
		return !$this->msgs->isError();
	}

	public function process()
	{
        $this->getParams();

        if($this->validete())
        {
            $this->form->kwota = intval($this->form->kwota);
            $this->form->oprocentowanie = floatval($this->form->oprocentowanie);
            $this->form->ileLat = floatval($this->form->ileLat);
            $this->msgs->addInfo('Dane poprawne');
        }
			//wartosci pomocnicze do wzoru
			$q = 1+(1/12)*($this->form->oprocentowanie/100);
			$mies = $this->form->ileLat*12;

			if($this->form->oprocentowanie != 0)
			{
				$this->form->rataKredytu = ($this->form->kwota*pow($q,$mies)*($q - 1))/(pow($q,$mies) - 1);
				$this->result->calkowityKoszt = number_format($this->form->rataKredytu*$mies,2,',',' ');
				$this->result->rataKredytu = number_format($this->form->rataKredytu,2,',',' ');
			}
            else
			{
				$this->result->rataKredytu = $this->form->kwota/$mies;
				$this->result->calkowityKoszt = $this->form->kwota;
            }
            $this->msgs->addInfo('Obliczenia wykonane.');

            $this->generateView();
    }
    
    public function generateView() 
    {
        //fetching field "outside" the class with GLOBAL keyword
        global $conf;
            
        //SMARTY init
        $smarty = new Smarty();
        $smarty->assign('conf',$conf);
        
        $smarty->assign('heading',"Kalkulator kredytowy");
        $smarty->assign('title',"PHPage :: Kalkulator arytmetyczny");
        
        
        $smarty->assign('form',$this->form);
        $smarty->assign('result',$this->result);
        $smarty->assign('messages',$this->msgs);
        
        $smarty->display($conf->root_path.'/app/credit/credit.html');
    }

}
?>