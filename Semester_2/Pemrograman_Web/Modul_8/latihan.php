<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Modul 8</title>
</head>
<body>
    <!-- tag <?php ?> untuk kode php dalam html -->
    <?php
        echo 'Kode PHP di sini';
    ?>
    <p>Dokumen HTML</p>
    <?php
        echo 'Kode PHP di sini';
    ?>
    
    <!-- penyingkatan tag php dalam satu baris -->
    <p>Kode <?php echo "PHP";?> di HTML</p>

    <!-- deklarasi dan inisialisasi variabel menggunakan $ -->
    <?php
        $bil = 3;
        echo $bil;
        echo '<br />';
    ?>

    <!-- echo hanya untuk sekedar mencetak output ke browser
        print_r untuk mencetak nilai variabel tanpa menampilkan tipe data
        var_dump untuk mencetak nilai variabel dengan menampilkan tipe data -->
    <?php
        $bil = 3;
        var_dump($bil);
        echo '<br />';
        print_r($bil);
        echo '<br />';
    ?>
    
    <!-- 3 bertipe data int
        "" bertipe data String(0) ""
        null bertipe data NULL -->
    <?php
        $bil = 3;
        var_dump($bil);
        echo '<br />';
        $var = "";
        var_dump($var);
        echo '<br />';
        $var = null;
        var_dump($var);
        echo '<br />';
    ?>

    <!-- menguji tipe data suatu variabel -->
    <?php
        $bil = 3;
        var_dump(is_int($bil));
        echo '<br />';
        $var = "";
        var_dump(is_string($var));
        echo '<br />';
    ?>

    <!-- casting tipe -->
    <?php
        $str = '123abc';
        $bil = (int) $str;
        echo gettype($str);
        echo '<br />';
        echo gettype($bil);
        echo '<br />';
    ?>

    <!-- if, else if, dan else pada php -->
    <?php
        $a = 10;
        $b = 5;

        if ($a > $b) {
            echo '$a lebih besar dari $b';
        } else if ($a == $b){
            echo '$a sama dengan $b';
        } else {
            echo '$a lebih kecil dari $b';
        }
        echo '<br />';
    ?>

    <!-- switch case pada php -->
    <?php
        $i = 0;
        
        if ($i == 0) {
            echo '$i sama dengan 0';
        } else if ($i == 1) {
            echo '$i sama dengan 1';
        } else if ($i == 2) {
            echo '$i sama dengan 2';
        }
        echo '<br />';

        switch ($i) {
            case 0:
                echo 'i equals 0';
                break;
            case 1:
                echo 'i equals 1';
                break;
            case 2:
                echo 'i equals 2';
                break;
        }
        echo '<br />';
    ?>

    <!-- perulangan while pada php -->
    <?php
        $i = 0;
        while ($i < 10) {
            echo $i;
            $i++;
        }
        echo '<br />';
    ?>

    <!-- perulangan do while pada php -->
    <?php
        $i = 0;
        do {
            echo $i;
            $i++;
        } while ($i < 10);
        echo '<br />';
    ?>

    <!-- perulangan for pada php -->
    <?php
        for ($i = 0; $i < 10; $i++) {
            echo $i;
        }
        echo '<br />';
    ?>

    <!-- perulangan foreach pada php -->
    <?php
        $arr = array(1, 2, 3, 4);
        foreach ($arr as $value) {
            echo $value;
        }
        echo '<br />';
    ?>

    <!-- fungsi pada php -->
    <?php
        function do_print() {
            echo time();
        }
        do_print();
        echo '<br />';

        function do_sum($a, $b) {
            return ($a + $b);
        }
        echo do_sum(2, 3);
        echo '<br />';
    ?>

    <!-- fungsi dengan nilai opsional ketika dipanggil -->
    <?php
        function print_text($text, $bold = true) {
            echo $bold ? "<b>" .$text. "</b>" : $text;
        }
        print_text("Hello World");
        echo '<br />';
        print_text("Hello World", false);
    ?>
</body>
</html>