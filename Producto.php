<?php

    class Producto {
        public static function getproducto($id) {
            return "<br/>Se ejecutó getproducto: {$id} <br/>";
        }

        public static function postproducto($obj) {
            return "<br/>Se ejecutó postproducto con los datos: " . json_encode($obj) . "<br/>";
        }

        public static function putproducto($obj) {
            return "<br/>Se ejecutó putproducto con los datos: " . json_encode($obj) . "<br/>";
        }

        public static function deleteproducto($id) {
            return "<br/>Se ejecutó deleteproducto con ID: {$id} <br/>";
        }

        public $var = 'a default value';

        public function displayVar() {
            echo $this->var;
        }
    }

?>

















