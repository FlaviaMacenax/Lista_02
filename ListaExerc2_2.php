<?php
    $msg = '';
    $erro = 0;
    $botao = '';
    $n='';
    $fat='';
    $r = '';
    $res = '';
    $p='';
    $c='';

    

    if(isset($_POST["calcular"])){
        $botao = $_POST["calcular"];

        // validação de campo
        if($erro == 0 && isset($_POST["n"]) && !empty($_POST["n"])){
            $n = $_POST["n"];}

        else{
            $erro = 1;
            $msg = "Digite um número válido.";}

            if($erro == 0 && isset($_POST["p"]) && !empty($_POST["p"])){
                $p = $_POST["p"];}

            else{
                $erro = 1;
               $msg = "Digite um número válido.";}
 
        if($erro == 0){
            

            if($_POST["tipo"] == "t2"){
                $r = arranjo($n, $p);
               }

               $res = " " .  prettify_numbers( $r, 2 );;
            
               if($_POST["tipo"] == "t3"){
                $r = combinacao($n, $p);
               }
               
               $res = " " .  prettify_numbers( $r, 2 );;
 }}
                
    
  // criando função fatorial
function fatorial($fat){
        if ($fat < 0 )
            return 'Nao e possivel calcular fatorial de numero negativo ou decimal.';
        if ($fat == 0 || $fat == 1)
            return 1;
        return $fat * fatorial($fat - 1);
    }
      // criando função arranjo
    function arranjo($n, $p){
      return  $r= fatorial($n)/ (fatorial($n-$p));
    }
      // criando função combinação
    function combinacao($n, $p){
        return  $r= fatorial($n)/ (fatorial($p)*fatorial($n-$p));
      }
        // função para lidar com números muito grandes
      function prettify_numbers ( $r = '0', $decimals = 2, $int_only = false ) {
      
        $r = (string)$r;
        
        // O símbolo
        $simbol = null;
    
        // yotta: 1000000000000000000000000
        if ( $r > '99999999999999999999999' ) {
            $r = bcdiv( $r, '1000000000000000000000000', $decimals);
            $simbol = 'Y';
        } 
        
        // Zetta: 1000000000000000000000
        elseif ( $r > '999999999999999999999' ) {
            $r = bcdiv( $r, '1000000000000000000000', $decimals);
            $simbol = 'Z';
        }
        
        // Exa : 1000000000000000000
        elseif ( $r > '999999999999999999' ) {
            $r = bcdiv( $r, '1000000000000000000', $decimals);
            $simbol = 'E';
        }
    
        // Peta : 1000000000000000
        elseif ( $r > '999999999999999' ) {
            $r = bcdiv( $r, '1000000000000000', $decimals);
            $simbol = 'P';
        }
    
        // Tera : 1000000000000
        elseif ( $r > '999999999999' ) {
            $r = bcdiv( $r, '1000000000000', $decimals);
            $simbol = 'T';
        }
    
        // Tera : 1000000000
        elseif ( $r > '999999999' ) {
            $r = bcdiv( $r, '1000000000', $decimals);
            $simbol = 'G';
        }
    
        // Mega : 1000000
        elseif ( $r > '999999' ) {
            $r = bcdiv( $r, '1000000', $decimals);
            $simbol = 'M';
        }
    
        // Kilo : 1000
        elseif ( $r > '999' ) {
            $r = bcdiv( $r, '1000', $decimals);
            $simbol = 'k';
        }
        
        // Retorna apenas o número inteiro
        if ( $int_only ) return (int)$r . $simbol;
    
        // Retorna o número e o símbolo
        return $r . $simbol;
    }
    


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cálculo da Média do IFRN</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='funcao.css'>
   
    <style>

    </style>
</head>
<body>
<form action="ExercLista2_2.php" method="post">
    <div class="main">
    <table>
        <!-- Se o erro for difente de 0 (caso tenha erro) exibir uma mensagem-->
        <?php if ($erro != 0) {?>
            <tr>
                <td colspan="2" class="mensagem">Mensagens: <?php echo $msg; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><h1>Cálculo de Probabilidade</h1></td>
        </tr>
        <tr>
            <td colspan="2" class="tmedia">
                <input type="radio" name="tipo" value="t2" checked> Arranjo<br>
                <input type="radio" name="tipo" value="t3"> Combinação<br>
            </td>
        </tr>
        <tr>
            <td><label for="lb1" >Elementos: </td>
            <td><input type="number" name="n" value="<?php echo $n ?>"> </td>
        </tr>
        <tr>
            <td><label for="lb1" >Agrupamentos: </td>
            <td><input type="number" name="p" value="<?php echo $p ?>"> </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="calcular" class="botao"> </td>
        </tr>
        <tr>
            <td colspan="2"  class="resultado"><label for="lb5" >Resultado: <?php echo $res ?> </td>
        </tr>
    </table>
    </div>
</form>

</body>
</html> 