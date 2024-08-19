<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Barcode</title>
    <style>
    * {
        padding: 0;
        margin: 0;
    }

    @media print {
        @page {
            margin: 20px 5px
        }
    }

    .halaman {
        column-count: 3;
        column-gap: 0;
        width: 22cm;
    }


    .kotak {
        display: inline-block;
        margin: 5px;
        border: 2px solid black;
        width: 6cm;
        height: 2cm;
        padding: 10px;
        text-align: center;

    }

    .brc {
        margin-top: 10px;
        width: 70%;
        height: 1cm;
    }

    .garis {
        border-bottom: 1px solid black;
    }
    </style>
</head>

<body>
    <div class="halaman">
        <?php 
        if (isset($barang) && is_object($barang)) : 
            for ($i = 0; $i < $jumlah; $i++) : 
        ?>
        <div class="kotak">
            <p><?= htmlspecialchars($barang->namaBarang, ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="garis"></div>
            <img class="brc" src="/barcode/<?= htmlspecialchars($barang->fileBarcode, ENT_QUOTES, 'UTF-8'); ?>"
                alt="Barcode">
        </div>
        <?php 
            endfor;
        endif; 
        ?>
    </div>
</body>


</html>