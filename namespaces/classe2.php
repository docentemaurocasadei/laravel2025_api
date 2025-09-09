<?php 

namespace Classe2;

class Classe1 {
    public function metodo(int|null $param) {
        return "Hello from Classe2 with param: " . $param;
    }
}