<?php

App::uses('AppHelper', 'View/Helper');

class ExibeBr extends AppHelper {
    
        public $iniciais_dias = array(
        '0' => 'DOM',
        '1' => 'SEG',
        '2' => 'TER',
        '3' => 'QUA',
        '4' => 'QUI',
        '5' => 'SEX',
        '6' => 'SAB'
    );

        
        /**
         * Método dataPratica
         * Converte data no formato mysql 2012-03-12
         * @param type $data_sql
         * @return string
         */
    public function dataPratica($data_sql) {

        $hora = date("H:i:s", strtotime($data_sql));
        $iniciais_dia = $this->iniciais_dias[date("w", strtotime($data_sql))];
        
        if ($hora == '00:00:00') {
            $data_formatada = date("d-m-Y ", strtotime($data_sql));
            $data_formatada .= '['. $iniciais_dia . ']' ;
        } else {
            $data_formatada = date("d-m-Y H:i:s ", strtotime($data_sql));
            $data_formatada .= '['. $iniciais_dia . ']' ;
        }


        return $data_formatada;
    }
    
    
}
