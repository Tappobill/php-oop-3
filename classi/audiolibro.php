<?php

include_once __DIR__ . '/prodotto.php';

class audioLibro extends prodotto
{
    public $durata;
    public $piattaforma;
    public $link;

    public function __construct(
        String $nome,
        String $autore,
        Float $prezzo,
        Generi $generi,
        Bool $pubblicato,
        String $immagine,

        Int $durata,        
        String $link
    ) {
        $this->durata = $durata;        
        $this->link = $link;
        parent::__construct($nome, $autore, $prezzo, $generi, $pubblicato, $immagine);
    }
}
?>
