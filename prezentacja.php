<!DOCTYPE html>
<html>
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
        <META NAME="Author" CONTENT="Rafał Teodorowski">
        <META NAME="Description" CONTENT="Logowanie, loguj">
        <META NAME="Keywords" CONTENT="Rafał, Teodorowski, informatyka, programowanie, internetowe, politechnika, warszawska">
        <link rel="stylesheet" href="../style/menu.css" type="text/css" media="all" />	
        <title>sprawdz</title>
    </head>
    <body>

        <?php
        if ($handle = opendir('./pliki/')) {
            $licz = -2;
            $thelist .= "<table>
  <tr>
    <th>Lp.</th>
    <th>Nazwa</th>
    <th>Typ</th> 
    <th>Rozmiar</th>
  </tr>";
            while (false !== ($file = readdir($handle))) {
                $licz++;
                // echo "./pliki/$file";
                $wynik = filesize("./pliki/$file");
                $typ = filetype("./pliki/$file");

                if ($file != "." && $file != "..") {
                    //    $thelist .= "<li>$licz. <a href=\"pliki/$file\" download=\"$file\">$file</a> <b>TYP:</b> $typ    <b>ROZMIAR:</b> $wynik bit�w </li>";

                    $thelist .= "<tr>
                                        <td>$licz.</td>
                                        <td><a href=\"pliki/$file\" download=\"$file\">$file</a></td>
                                        <td>$typ</td>
                                        <td>$wynik bitów</td>
                                    </tr>";
                }
            }
            $thelist .= "</table>";
            closedir($handle);
        }

        ?>

        <h1>Lista plików:</h1>
        <ul><?php echo $thelist; ?></ul>
    </body>
</html>