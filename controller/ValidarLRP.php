<?php
    
    /**
     * Validation 
     *
     * Semplice classe PHP per la validazione.
     *
     * @author Davide Cesarano <davide.cesarano@unipegaso.it>
     * @copyright (c) 2016, Davide Cesarano
     * @license https://github.com/davidecesarano/Validation/blob/master/LICENSE MIT License
     * @link https://github.com/davidecesarano/Validation
     */
     
    class Validation {

        
        /**
         * @var array $patterns
         */
        public $patterns = array(
            'uri'           => '[A-Za-z0-9-\/_?&=]+',
            'url'           => '[A-Za-z0-9-:.\/_?&=#]+',
            'alpha'         => '[\p{L}]+',
            'words'         => '[\p{L}\s]+',
            'alphanum'      => '[\p{L}0-9]+',
            'int'           => '[0-9]+',
            'float'         => '[0-9\.,]+',
            'tel'           => '[0-9+\s()-]+',
            'text'          => /*'[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',*//*'[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$',*/'[ A-Za-z0-9_~\-!@#\$%\^&\?\*\.\(*\)]',
            'file'          => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
            'folder'        => '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
            'address'       => '[\p{L}0-9\s.,()°-]+',
            'date_dmy'      => '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
            'date_ymd'      => '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
            'email'         => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
        );
        
        /**
         * @var array $errors
         */
        public $errors = array();
        
        /**
         * Nome del campo
         * 
         * @param string $name
         * @return this
         */
        public function name($name){
            
            $this->name = $name;
            return $this;
        
        }
        
        /**
         * Valore del campo
         * 
         * @param mixed $value
         * @return this
         */
        public function value($value){
            
            $this->value = $value;
            return $this;
        
        }
        
        /**
         * Pattern da applicare al riconoscimento
         * dell'espressione regolare
         * 
         * @param string $name nome del pattern
         * @return this
         */
        public function pattern($name){
            
            if($name == 'array'){
                
                if(!is_array($this->value)){
                    $this->errors[] = 'Formato campo '.$this->name.' non valido.';
                }
            
            }else{
            
                $regex = '/^('.$this->patterns[$name].')$/u';
                if($this->value != '' && !preg_match($regex, $this->value)){
                    $this->errors[] = 'Formato campo '.$this->name.' no valido.';
                }
                
            }
            return $this;
            
        }

        public function patternX2($name){
            
            if($name == 'array'){
                
                if(!is_array($this->value)){
                    $this->errors[] = 'Formato campo '.$this->name.' non valido.';
                }
            
            }else{
            
                $regex = $this->patterns[$name];
                if($this->value != '' && !preg_match($regex, $this->value)){
                    $this->errors[] = 'Formato campo '.$this->name.' no valido.';
                }
                
            }
            return $this;
            
        }
        
        /**
         * Pattern personalizzata
         * 
         * @param string $pattern
         * @return this
         */
        public function customPattern($pattern){
            
            $regex = '/^('.$pattern.')$/u';
            if($this->value != '' && !preg_match($regex, $this->value)){
                $this->errors[] = 'Formato campo '.$this->name.' no valido.';
            }
            return $this;
            
        }
        
        /**
         * Campo obbligatorio
         * 
         * @return this
         */
        public function required(){
            
            if($this->value == '' || $this->value == null){
                $this->errors[] = 'Campo '.$this->name.' obligatorio.';
            }            
            return $this;
            
        }
        /**
         * Campi validati
         * 
         * @return boolean
         */
        public function isSuccess(){
            if(empty($this->errors)) return true;
        }
        
        /**
         * Errori della validazione
         * 
         * @return array $this->errors
         */
        public function getErrors(){
            if(!$this->isSuccess()) return $this->errors;
        }
        
        /**
         * Visualizza errori in formato Html
         * 
         * @return string $html
         */
        public function displayErrors(){
            
            $html = '<ul>';
                foreach($this->getErrors() as $error){
                    $html .= '<li>'.$error.'</li>';
                }
            $html .= '</ul>';
            
            return $html;
            
        }
        
        public function birthdateformat(){
            if(!DateTime::createFromFormat('Y-m-d',$this->value)){
                $this->errors[] = 'Formato de campo Fecha no valido.';
            }
            return $this;
            //$dt->format('Y-m-d');
            //return true;
        }
        /**
         * Verifica se il valore è
         * un numero intero
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_int($value){
            if(filter_var($value, FILTER_VALIDATE_INT)) return true;
        }
        
        public function valide_email($value){
            if(filter_var($value,FILTER_VALIDATE_EMAIL)){
                return true;
            }else{
                $this->errors[] = 'Formato de campo '.$this->name.' no valido.';
            }
        }
        /**
         * Verifica se il valore è
         * un numero float
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_float($value){
            if(filter_var($value, FILTER_VALIDATE_FLOAT)) return true;
        }
        
        /**
         * Verifica se il valore è
         * una lettera dell'alfabeto
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_alpha($value){
            if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")))) return true;
        }
        
        /**
         * Verifica se il valore è
         * una lettera o un numero
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_alphanum($value){
            if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))) return true;
        }
        
        /**
         * Verifica se il valore è
         * un url
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_url($value){
            if(filter_var($value, FILTER_VALIDATE_URL)) return true;
        }
        
        /**
         * Verifica se il valore è
         * true o false
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_bool($value){
            if(is_bool(filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE))) return true;
        }
        
        /**
         * Verifica se il valore è
         * un'e-mail
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_email($value){
            if(filter_var($value, FILTER_VALIDATE_EMAIL)) return true;
        }
        
    }
?>