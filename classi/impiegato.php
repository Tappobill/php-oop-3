<?php

include_once __DIR__ . '/../trait/reparto.php';

class Impiegato
{
    public $nome;
    public $eta;

    use Reparti;

    public function __construct(
        String $nome
    ) {
        $this->nome = $nome;
    }

    public function setEta($_eta)
    {

        if (!is_int($_eta)) {
            throw new Exception("WARNING: $_eta non è un numero!");
        } elseif ($_eta < 0) {
            throw new Exception("WARNING: $_eta è minore di zero!");
        } else {
            $this->eta = $_eta;
        }
    }
}
?>
