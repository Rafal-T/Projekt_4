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
        class Osoba {

            private $pesel;
            private $imie;
            private $nazwisko;

            function __construct() {
                $this->pesel = '99010136985';
                $this->imie = 'Jan';
                $this->nazwisko = 'Kowalski';
            }

            function osoba() {
                echo $this->imie . ' ' . $this->nazwisko . ' ' . $this->pesel . '<br/>';
            }

        }
        
        class Student extends Osoba {
            private $ocena;
            
            function __construct($pesel, $imie, $nazwisko, $ocena) {
                $this->pesel = $pesel;
                $this->imie = $imie;
                $this->nazwisko = $nazwisko;
                $this->ocena= $ocena;
            }
            
            function student() {
                echo $this->imie . ' ' . $this->nazwisko . ' ' . $this->pesel . ' Ocena: ' . $this->ocena . '<br/>';
            }
            
            function __destruct() {
		echo "Zniszczono klase student";
	}
            
        }
        ?>
        <div>
            <p>Tworzenie Osoba</p>
            <?
            $jan = new Osoba;
            $jan->osoba();
            ?>
            <p>Serializacja:</p>
            <?
            $serialization = serialize($jan);
            echo $serialization . '</br> <p> Deserializacja do "obiekt" i wywołanie funkcji "osoba" z klasy osoba: </p>';
            $obiekt = unserialize($serialization);
            $obiekt->osoba();
            ?>
            
            <p>Tworzenie Student</p>
             <?
            $pawel = new Student('98040478912','Paweł', 'Ziółko', "4.5");
            $pawel->student(); 
            ?>
             <p>Serializacja:</p>
            <?
            $serialization2 = serialize($pawel);
            echo $serialization2 . '</br> <p> Deserializacja do "obiekt2" i wywołanie funkcji "student" z klasy student: </p>';
            $obiekt2 = unserialize($serialization2);
            $obiekt2->student();
            ?>
        </div>

    </body>
</html>