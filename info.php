<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nevim asi PHP</title>
</head>
<body>
    <?php

    /*
    #1
    echo "Hello World!";
    #2
    phpinfo()
    #3
    date_default_timezone_set('Europe/Prague');
    $currentDateTime = date('j. n. Y G:i');
    echo "Aktuální datum a čas: $currentDateTime";
    #4
    $prsi = true;
    $teplota = 15.5;
    if ($prsi) {
    echo "Dnes prší, doporučuji si vzít nepromokavou bundu, deštník a pláštěnku.";
    } else {
    if ($teplota < 10) {
        echo "Dnes je chladno, doporučuji si vzít teplé oblečení, čepici a rukavice.";
    } elseif ($teplota >= 10 && $teplota < 20) {
        echo "Dnes je příjemně, můžete si vzít mikinu a lehkou bundu.";
    } else {
        echo "Dnes je teplé, stačí tričko a kalhoty.";
    }
    #5
    echo '<h2>Malá násobilka</h2>

    <table border="1">
        <tr>
            <th>*</th>';

    for ($i = 1; $i <= 5; $i++) {
    echo "<th>$i</th>";
    }

    echo '</tr>';

    for ($i = 1; $i <= 5; $i++) {
    echo "<tr>";
    echo "<td>$i</td>";

    for ($j = 1; $j <= 5; $j++) {
        echo "<td>" . ($i * $j) . "</td>";
    }

    echo "</tr>";
    }   

    echo '</table>';
    #6
    $student = array("Adam", "Petr", "Karolina");

    $predmet = array(
        "PV" => "Programové vybavení",
        "WA" => "Webové aplikace",
        "AJ" => "Anglický jazyk"
    );

    $znamka = array(
        "Karolina" => array("WA" => 3),
        "Petr" => array("AJ" => 5, "WA" => 1, "PV" => 1),
        "Adam" => array("AJ" => "N", "PV" => "N", "WA" => "N")
    );

    // Výpis seznamu žáků a jejich známek
    foreach ($student as $zak) {
        echo "<h3>$zak</h3>";
        echo "<ul>";
        
        foreach ($predmet as $kod => $nazev) {
            $znamkaZaka = isset($znamka[$zak][$kod]) ? $znamka[$zak][$kod] : "N";
            echo "<li>$nazev: $znamkaZaka</li>";
        }

        echo "</ul>";
    }

    #7
    
    $browser = $_SERVER['HTTP_USER_AGENT'];
    $httpVersion = $_SERVER['SERVER_PROTOCOL'];
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    echo "<h2>1. Informace o připojení:</h2>";
    echo "<p>Prohlížeč: $browser</p>";
    echo "<p>Verze HTTP protokolu: $httpVersion</p>";
    echo "<p>HTTP metoda: $httpMethod</p>";

    
    if (!empty($_GET)) {
        echo "<h2>2. Zpracování _GET proměnné:</h2>";
        $a = isset($_GET['a']) ? $_GET['a'] : 'N/A';
        $b = isset($_GET['b']) ? $_GET['b'] : 'N/A';
        $c = isset($_GET['c']) ? $_GET['c'] : 'N/A';

        echo "<p>Proměnná 'a': $a</p>";
        echo "<p>Proměnná 'b': $b</p>";
        echo "<p>Proměnná 'c': $c</p>";
    }

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<h2>3. Zpracování _POST proměnné:</h2>";
        $postA = isset($_POST['postA']) ? $_POST['postA'] : 'N/A';
        $postB = isset($_POST['postB']) ? $_POST['postB'] : 'N/A';
        $postC = isset($_POST['postC']) ? $_POST['postC'] : 'N/A';

        echo "<p>Proměnná 'postA': $postA</p>";
        echo "<p>Proměnná 'postB': $postB</p>";
        echo "<p>Proměnná 'postC': $postC</p>";
    }
    echo '<h2>HTML formulář pro odeslání _POST proměnné:</h2>
    <form action="" method="post">
        <label for="postA">Proměnná \'postA\':</label>
        <input type="text" name="postA" id="postA" required><br>

        <label for="postB">Proměnná \'postB\':</label>
        <input type="text" name="postB" id="postB" required><br>

        <label for="postC">Proměnná \'postC\':</label>
        <input type="text" name="postC" id="postC" required><br>

        <input type="submit" value="Odeslat">
    </form>';

    #8

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $datumNarozeni = $_POST["datum_narozeni"];

        
        $validJmenoPrijmeni = preg_match("/^[a-zA-Z]+$/", $jmeno) && preg_match("/^[a-zA-Z]+$/", $prijmeni);
        $validDatum = preg_match("/^\d{4}-\d{2}-\d{2}$/", $datumNarozeni);

        
        $pohlavi = "";
        if (substr($prijmeni, -3) == "ova") {
            $pohlavi = "Žena";
        } elseif (substr($prijmeni, -2) == "y") {
            $pohlavi = "Muž";
        } else {
            $pohlavi = "Nepodařilo se odhadnout";
        }

        
        echo "<h2>Výsledky kontroly:</h2>";
        echo "<p>Jméno a příjmení obsahuje jen znaky anglické abecedy: " . ($validJmenoPrijmeni ? "ANO" : "NE") . "</p>";
        echo "<p>Datum narození je ve správném formátu: " . ($validDatum ? "ANO" : "NE") . "</p>";
        echo "<p>Odhad pohlaví: $pohlavi</p>";
    }
    echo '<h2>Vložte osobní údaje:</h2>
    <form action="" method="post">
        <label for="jmeno">Jméno:</label>
        <input type="text" name="jmeno" id="jmeno" required><br>

        <label for="prijmeni">Příjmení:</label>
        <input type="text" name="prijmeni" id="prijmeni" required><br>

        <label for="datum_narozeni">Datum narození (YYYY-MM-DD):</label>
        <input type="text" name="datum_narozeni" id="datum_narozeni" required><br>

        <input type="submit" value="Odeslat">
    </form>';

    #9

    class Kniha {
    private $nazev;
    private $autori = array();

    public function __construct($nazev, $autori) {
        $this->setNazev($nazev);
        $this->setAutori($autori);
    }

    public function getNazev() {
        return $this->nazev;
    }

    public function setNazev($nazev) {
       
        $this->nazev = $nazev;
    }

    public function getAutori() {
        return $this->autori;
    }

    public function setAutori($autori) {
   
        $this->autori = $autori;
    }

    public function pridatAutora($autor) {
        
        $this->autori[] = $autor;
    }

    public function odebratAutora($autor) {
        
        $index = array_search($autor, $this->autori);
        if ($index !== false) {
            unset($this->autori[$index]);
        }
    }
    }

    class Casopis extends Kniha {
        private $cisloVydani;

        public function __construct($nazev, $autori, $cisloVydani) {
            parent::__construct($nazev, $autori);
            $this->setCisloVydani($cisloVydani);
        }

        public function getCisloVydani() {
            return $this->cisloVydani;
        }

        public function setCisloVydani($cisloVydani) {

            $this->cisloVydani = $cisloVydani;
        }
    }


    $knihy = array(
        new Kniha("Programování v PHP", array("John Doe", "Jane Smith")),
        new Kniha("OOP pro začátečníky", array("Alice Johnson", "Bob Brown"))
    );

    foreach ($knihy as $kniha) {
        echo "Název: " . $kniha->getNazev() . "<br>";
        echo "Autoři: " . implode(", ", $kniha->getAutori()) . "<br>";
        echo "<hr>";
    }


    $casopis = new Casopis("Elektronika pro amatéry", array("Kellner Jan", "Orechan Ivo"), 412);

    echo "Název: " . $casopis->getNazev() . "<br>";
    echo "Autoři: " . implode(", ", $casopis->getAutori()) . "<br>";
    echo "Číslo vydání: " . $casopis->getCisloVydani() . "<br>";
 
    #10

    class Kniha {
        private $nazev;
        private $autori = array();
    
        public function __construct($nazev, $autori) {
            $this->setNazev($nazev);
            $this->setAutori($autori);
        }
    
        public function getNazev() {
            return $this->nazev;
        }
    
        public function setNazev($nazev) {
            // Případné kontroly na název knihy
            $this->nazev = $nazev;
        }
    
        public function getAutori() {
            return $this->autori;
        }
    
        public function setAutori($autori) {
            // Případné kontroly na seznam autorů
            $this->autori = $autori;
        }
    
        public function pridatAutora($autor) {
            // Přidání autora do seznamu autorů
            $this->autori[] = $autor;
        }
    
        public function odebratAutora($autor) {
            // Odebrání autora ze seznamu autorů
            $index = array_search($autor, $this->autori);
            if ($index !== false) {
                unset($this->autori[$index]);
            }
        }
    
        public function __toString() {
            // Magická metoda pro výpis knihy pomocí příkazu print nebo echo
            $autoriText = implode(", ", $this->autori);
            return "<p><cite>{$this->nazev}</cite> od autorů: {$autoriText}.</p>";
        }
    
        public function __get($property) {
            // Magická metoda pro přístup k private proměnné $autori
            if ($property == 'autori') {
                return $this->autori;
            }
        }
    }
    
    class Casopis extends Kniha {
        private $cisloVydani;
    
        public function __construct($nazev, $autori, $cisloVydani) {
            parent::__construct($nazev, $autori);
            $this->setCisloVydani($cisloVydani);
        }
    
        public function getCisloVydani() {
            return $this->cisloVydani;
        }
    
        public function setCisloVydani($cisloVydani) {
            // Případné kontroly na číslo vydání
            $this->cisloVydani = $cisloVydani;
        }
    }
    
   
    $knihy = array(
        new Kniha("Programování v PHP", array("John Doe", "Jane Smith")),
        new Kniha("OOP pro začátečníky", array("Alice Johnson", "Bob Brown"))
    );
    
    foreach ($knihy as $kniha) {
        echo $kniha; // Použití magické metody __toString pro výpis
        echo "<hr>";
    }
    
    
    $casopis = new Casopis("Elektronika pro amatéry", array("Kellner Jan", "Orechan Ivo"), 412);
    
    echo $casopis; // Použití magické metody __toString pro výpis
    echo "<br>";
    
    
    $autoriCasopisu = $casopis->__get('autori');
    echo "Autoři časopisu: " . implode(", ", $autoriCasopisu);
    
    #11

    class ZapornaStranaException extends Exception {
        public function __construct($message = "Strana nemůže být záporná.") {
            parent::__construct($message);
        }
    }
    
    class NulovaStranaException extends Exception {
        public function __construct($message = "Strana nemůže být nula.") {
            parent::__construct($message);
        }
    }
    
    class Obdelnik {
        private $a;
        private $b;
    
        public function __construct($a, $b) {
            $this->setStranaA($a);
            $this->setStranaB($b);
        }
    
        public function getStranaA() {
            return $this->a;
        }
    
        public function setStranaA($a) {
            if ($a <= 0) {
                throw new ZapornaStranaException();
            }
            $this->a = $a;
        }
    
        public function getStranaB() {
            return $this->b;
        }
    
        public function setStranaB($b) {
            if ($b <= 0) {
                throw new ZapornaStranaException();
            }
            $this->b = $b;
        }
    }
    
    try {
         
        $obdelnik = new Obdelnik(-5, 10);
    } catch (ZapornaStranaException $e) {
        echo "Chyba: " . $e->getMessage();
    } catch (NulovaStranaException $e) {
        echo "Chyba: " . $e->getMessage();
    }

    #12

    if (isset($_COOKIE['POCETNAVSTEV'])) {
    
        $pocetNavstev = $_COOKIE['POCETNAVSTEV'] + 1;
        } else {
            // Pokud ne, vytvoří novou cookie s expirací za 10 dní a vloží do ní číslo 0
            $pocetNavstev = 0;
        }
    
        
        setcookie('POCETNAVSTEV', $pocetNavstev, time() + (10 * 24 * 60 * 60), '/');
    
        
        echo "Počet návštěv za posledních 10 dní: " . $pocetNavstev;
    

    #13

    session_start();


    if (isset($_SESSION['POCETNAVSTEV'])) {
   
        $_SESSION['POCETNAVSTEV']++;
    } else {
        
        $_SESSION['POCETNAVSTEV'] = 1;
    }

   
    echo "Počet návštěv na serveru: " . $_SESSION['POCETNAVSTEV'];
   
    #14
       interface IUzivatel {
        public function getJmenoPrijmeni();
        public function getNickname();
        public function getEmail();
        public function isPrihlasen();
        public function getPohlavi();
    }

   
    class NeprihlasenyUzivatel implements IUzivatel {
        public function getJmenoPrijmeni() {
            return "Nepřihlášený Uživatel";
        }

        public function getNickname() {
            return "";
        }

        public function getEmail() {
            return "";
        }

        public function isPrihlasen() {
            return false;
        }

        public function getPohlavi() {
            return "neznámé";
        }
    }

    
    class PrihlasenyUzivatel implements IUzivatel {
        private $jmenoPrijmeni;
        private $nickname;
        private $email;
        private $prihlasen;
        private $pohlavi;

        public function __construct($jmenoPrijmeni, $nickname, $email, $prihlasen, $pohlavi) {
            $this->jmenoPrijmeni = $jmenoPrijmeni;
            $this->nickname = $nickname;
            $this->email = $email;
            $this->prihlasen = $prihlasen;
            $this->pohlavi = $pohlavi;
        }

        public function getJmenoPrijmeni() {
            return $this->jmenoPrijmeni;
        }

        public function getNickname() {
            return $this->nickname;
        }

        public function getEmail() {
            return $this->email;
        }

        public function isPrihlasen() {
            return $this->prihlasen;
        }

        public function getPohlavi() {
            return $this->pohlavi;
        }
    }

    
    function renderUserInfo(IUzivatel $uzivatel) {
        $statusText = $uzivatel->isPrihlasen() ? "Přihlášen" : "Nepřihlášen";
        $statusColor = $uzivatel->isPrihlasen() ? "green" : "red";
        $background = $uzivatel->getPohlavi() === "žena" ? "pink" : ($uzivatel->getPohlavi() === "muž" ? "lightblue" : "white");

        echo "<div style='text-align: right; background-color: {$background}; padding: 10px;'>";
        echo "<p style='color: {$statusColor};'>{$statusText}</p>";
        echo "<p>{$uzivatel->getJmenoPrijmeni()}</p>";
        echo "<p>{$uzivatel->getNickname()}</p>";
        echo "<p>{$uzivatel->getEmail()}</p>";
        echo "</div>";
    }

   
    $uzivatel1 = new NeprihlasenyUzivatel();
    $uzivatel2 = new PrihlasenyUzivatel("John Doe", "johnny", "john@example.com", true, "muž");

    
    renderUserInfo($uzivatel1);
    renderUserInfo($uzivatel2);

    #15
    $host = "localhost"; // Změňte na váš MySQL server
    $dbname = "test"; // Změňte na název vaší databáze
    $username = "root"; // Změňte na váš MySQL login
    $password = "NoveHesloTest"; // Změňte na váše MySQL heslo

    try {
        // Vytvoření připojení pomocí PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        // Nastavení PDO pro získání asociových poleů
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Příprava a provedení SQL příkazu SELECT
        $stmt = $pdo->query("SELECT * FROM test");
        $data = $stmt->fetchAll();

        // Výpis dat na obrazovku
        echo "<h2>Obsah tabulky</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Jméno</th></tr>";

        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>{$row['id_test']}</td>";
            echo "<td>{$row['jmeno']}</td>";
            echo "</tr>";
        }

        echo "</table>";

    } catch (PDOException $e) {
        echo "Chyba při připojení k databázi: " . $e->getMessage();
    }

   
   
    */
    

 


    ?>
</body>
</html>
