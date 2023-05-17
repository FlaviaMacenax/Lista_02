<?php
    $msg = '';
    $erro = 0;
    $botao = '';
    $numero = "";
    $res = '';




    if(isset($_POST["calcular"])){
        $botao = $_POST["calcular"];




        if($erro == 0 && isset($_POST["numero"]) && !empty($_POST["numero"])){
            $numero = $_POST["numero"];
        }else{
            $erro = 1;
            $msg = "Digite um valor válido.";
        }
    }


    function numeroR($num) {
        if ($numero <= 0 || $numero > 50) {
            return $numero;
        }
   
        $n = (int)$numero;
        $y = '';
   
        if (($n / 50) >= 1) {
            $y .= 'L';
            $n -= 50;
        }
        if (($n / 40) >= 1) {
            $y .= 'XL';
            $n -= 40;
        }
   
        while (($n / 10) >= 1) {
            $y .= 'X';
            $n -= 10;
        }
        if (($n / 9) >= 1) {
            $y .= 'IX';
            $n -= 9;
        }
        if (($n / 5) >= 1) {
            $y .= 'V';
            $n -= 5;
        }
        if (($n / 4) >= 1) {
            $y .= 'IV';
            $n -= 4;
        }
   
        while ($n >= 1) {
            $y .= 'I';
            $n -= 1;
        }
   
        return $y;
    }


    $res = numeroR($numero);


?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Números</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>




    </style>
</head>
<body>
<form action="ListaExerc2_3.php" method="post">
    <div>
    <table>
        <?php if ($erro != 0) {?>
            <tr>
                <td colspan="2" class="mensagem">Mensagens: <?php echo $msg; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><h1>Números </h1></td>
        </tr>
        <tr>
            <td><label for="lb4" >Digite um número: </td>
            <td><input type="number" name="num" value="<?php echo $numero ?>"> </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="calcular" class="botao"> </td>
        </tr>
        <tr>
            <td colspan="2"  class="resultado"><label for="lb5" >Resultado: <?php echo $res?> </td>
        </tr>
    </table>
    </div>
</form>




</body>
</html>