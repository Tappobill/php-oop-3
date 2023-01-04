<?php

include_once __DIR__ . '/classi/generi.php';
include_once __DIR__ . '/classi/libro.php';
include_once __DIR__ . '/classi/impiegato.php';
include_once __DIR__ . '/classi/audiolibro.php';
include_once __DIR__ . '/classi/cd.php';
include_once __DIR__ . '/classi/dvd.php';


$generi = [
    'giallo'=> new Generi('Giallo', '<i class="fa-solid fa-book"></i>'),
    'horror'=> new Generi('Horror', '<i class="fa-solid fa-book"></i>'),
    'fantasy'=> new Generi('Fantasy', '<i class="fa-solid fa-book"></i>'),
    'autobiografia'=> new Generi('Autobiografia', '<i class="fa-solid fa-book"></i>'),
    'azioneCd'=> new Generi('Azione', '<i class="fa-solid fa-compact-disc"></i>'),
    'comicoCd'=> new Generi('Comico', '<i class="fa-solid fa-compact-disc"></i>'),
    'fantasyCd'=> new Generi('Fantasy', '<i class="fa-solid fa-compact-disc"></i>'),
];


$prodotti = [
    new Libro('Nulla ti cancella', 'Michel Bussi', 15.68, $generi['giallo'], true, 'https://www.ibs.it/images/9788833574264_0_536_0_75.jpg', 250, 'flessibile'),
    new audioLibro('Lungo cammino verso la libertà ', 'Nelson Mandela', 23.40, $generi['autobiografia'], true, 'https://it.gariwo.net/i2/202104020626_s-l1600.jpg', 120, 'https://it.gariwo.net/i2/202104020626_s-l1600.jpg'),
    new Cd('Il cavaliere oscuro', 'Christofer Nolan', 12, $generi['azioneCd'], true, 'https://m.media-amazon.com/images/I/51zgvBvfp8L.jpg', 160, 'https://m.media-amazon.com/images/I/51zgvBvfp8L.jpg'),
    new Dvd('Batman - Il ritorno', 'Tim Burton', 15, $generi['azioneCd'], true, 'https://pad.mymovies.it/filmclub/2002/08/244/locandina.jpg', 126, 'https://pad.mymovies.it/filmclub/2002/08/244/locandina.jpg')
];




$impiegati = [
    $impiegato1 = new Impiegato('Paolo Rossi'),
    $impiegato2 = new Impiegato('Marco Rossi'),
    $impiegato3 = new Impiegato('Stefano Piccolo'),
    $impiegato4 = new Impiegato('Melania Esposito')
];


$impiegato1->reparto = 'Cd';
$impiegato2->reparto = 'Dvd';
$impiegato3->reparto = 'Libro';
$impiegato4->reparto = 'Audiolibro';
$impiegato1->vendite = 43;
$impiegato2->vendite = 30;
$impiegato3->vendite = 25;
$impiegato4->vendite = 101;

try {
    $impiegato1->setEta(21);
    $impiegato2->setEta(25);
    $impiegato3->setEta(28);
    $impiegato4->setEta(20);
} catch (Exception $e) {
    echo 'Si è verificato un errore: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row ">
            <?php foreach ($prodotti as $elements) : ?>
                <div class="col-4 g-4">
                    <div class="card-columns-fluid">
                        <div class="card  bg-light" style="width: 22rem; ">
                            <img class="card-img-top" src=" <?php echo $elements->immagine; ?> " alt="Card image cap">

                            <div class="card-body">
                                <h5 class="card-title"><b><?php echo $elements->nome ?></b></h5>
                                <p class="card-text"><b> € <?php echo $elements->prezzo ?></b></p>
                                <p class="card-text"><?php echo $elements->generi->icon ?></p>
                                <p class="card-text"><?php echo $elements->generi->name ?></p>
                                <p class="card-text"><?php echo $elements->autore ?></p>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Vedi dettagli
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">
                                                <?php if (isset($elements->pagine)) {
                                                    echo "Pagine: $elements->pagine";
                                                } elseif (isset($elements->durata)) {
                                                    echo "Durata: $elements->durata";
                                                } ?></a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">
                                                <?php if (isset($elements->copertina)) {
                                                    echo "Pagine: $elements->copertina";
                                                } elseif (isset($elements->piattaforma)) {
                                                    echo "Durata: $elements->piattaforma";
                                                }
                                                ?>
                                            </a></li>
                                        <li><a class="dropdown-item" href="<?php if (isset($elements->link)) {
                                                                                echo $elements->link;
                                                                            } ?>">
                                                <?php if (isset($elements->link)) {
                                                    echo "Link";
                                                } ?>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jscript/main.js"></script>
</body>

</html>