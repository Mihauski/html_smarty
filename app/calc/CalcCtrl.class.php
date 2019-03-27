<?php
    //load Smarty
    require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
    //load class which is generating error messages/infos
    require_once $conf->root_path.'/lib/Messages.class.php';
    //load class generating form
    require_once $conf->root_path.'/app/calc/CalcForm.class.php';
    //load class generating result
    require_once $conf->root_path.'/app/calc/CalcResult.class.php';

    /***********************************/
    /* Arithmetic Calculator Controller*/
    /***********************************/

    class CalcCtrl
    {
        //private in-class fields init
        private $msgs;
        private $form;
        private $result;

        //public constructor
        public function __construct()
        {
            //creating required objects to fields
            //THIS informs, that we want assignment to the in-class field, not global one
            //init from corresponding .class.php files, not necessary right now, but a good practice
            $this->msgs = new Messages();
            $this->form = new CalcForm();
            $this->result = new CalcResult();
        }

        /******************************************/
        /* Basic functions from original calc.php */
        /* ...adapted to objective programming... */
        /******************************************/

        public function getParams(){
            //instead of adding to array, we are assigning to the form object
            $this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
            $this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
            $this->form->op = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
        }
        
        /** 
         * Params validation
         * @return true if no errors, otherwise if there are 
         */
        public function validate() {
            // if params set
            if (! (isset ( $this->form->x ) && isset ( $this->form->y ) && isset ( $this->form->op ))) {
                // for the case we called this file directly - not from form
                return false;
            }
            
            // are all the values set?
            if ($this->form->x == "") {
                $this->msgs->addError('Nie podano liczby 1');
            }
            if ($this->form->y == "") {
                $this->msgs->addError('Nie podano liczby 2');
            }
            
            // no point in further check if no params..
            if (! $this->msgs->isError()) {
                
                // are x and y numeric?
                if (! is_numeric ( $this->form->x )) {
                    $this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
                }
                
                if (! is_numeric ( $this->form->y )) {
                    $this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
                }
            }
            
            return ! $this->msgs->isError();
        }
        
        /** 
         * Getting value, validation and processing
         */
        public function process(){
            //calling LOCAL (in-class, $this) function
            $this->getParams();
            
            //if validation is TRUE (ok)
            if ($this->validate()) {
                    
                //convert to integer
                $this->form->x = intval($this->form->x);
                $this->form->y = intval($this->form->y);
                $this->msgs->addInfo('Parametry poprawne.');
                    
                //doing set operation
                switch ($this->form->op) {
                    case 'minus' :
                        $this->result->result = $this->form->x - $this->form->y;
                        $this->result->op_name = '-';
                        break;
                    case 'times' :
                        $this->result->result = $this->form->x * $this->form->y;
                        $this->result->op_name = '*';
                        break;
                    case 'div' :
                        $this->result->result = $this->form->x / $this->form->y;
                        $this->result->op_name = '/';
                        break;
                    default :
                        $this->result->result = $this->form->x + $this->form->y;
                        $this->result->op_name = '+';
                        break;
                }
                //we add info to the msgs field
                $this->msgs->addInfo('Wykonano obliczenia.');
            }
            //generate view function call
            $this->generateView();
        }
        
        
        /**
         * View generator
         */
        public function generateView(){
            //fetching field "outside" the class with GLOBAL keyword
            global $conf;
            
            //SMARTY init
            $smarty = new Smarty();
            $smarty->assign('conf',$conf);
            
            $smarty->assign('heading',"Kalkulator arytmetyczny");
            $smarty->assign('title',"PHPage :: Kalkulator arytmetyczny");
            
            
            $smarty->assign('form',$this->form);
            $smarty->assign('result',$this->result);
            $smarty->assign('messages',$this->msgs);
            
            $smarty->display($conf->root_path.'/app/calc/calc.html');
        }
    }
?>