<!DOCTYPE>
<html>

<head>
    <title>
        Pari e Dispari
    </title>
</head>

<body style='background-color: rgb(144, 197, 250); text-align: center;'>
    <h1 style='text-align: center; color: blue;'>Gioco del pari e dispari</h1>
    <br>
    <?php
    session_start();
    if (!isset($_SESSION["nome"])) {
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["turno"] = 1;
        $_SESSION["nfiammiferi"]= 13;
    }else{
        $_SESSION["turno"]++;
    }
    echo "
            <p>
            <label>Nome: </label>$_SESSION[nome]
            <br>
            <label>Turno: </label>$_SESSION[turno]
            </p>
        ";
    if($_SESSION["turno"]!=1){
        $crm = 4 - $_POST["val"];
        echo"
        <p>Hai tolto $_POST[val] fiammiferi</p>
        <p>Io tolgo $crm fiammiferi</p>
        ";
        $_SESSION["nfiammiferi"]= $_SESSION["nfiammiferi"]-4;
    }
        for($i =0; $i<$_SESSION["nfiammiferi"]; $i++){
            echo"<img src='fiammiferi.jpg'>";
        }
        echo "
        <p><label>numero di fiammiferi in gioco=</label>$_SESSION[nfiammiferi]</p>
        <br>";
        if($_SESSION["nfiammiferi"]!=1){
        echo"
        <form method='POST' action='gioca.php'>
            <label>Scegli quanti ne vuoi togliere:</label>
            <select name='val'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
            <br>
            <button type='submit'>TOGLI</button>
        </form>
        ";
        }else{
            session_destroy();
            echo"<p>Spiacente, <b>hai perso!</b></p>
            <br>
            <a href='index.html'><button>NUOVA PARTITA</button></a>
            ";
        }
    ?>
</body>

</html>