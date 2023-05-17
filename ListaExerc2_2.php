<?php
    $msg = '';
    $erro = 0;
    $botao = '';
    $num = 1;
    $fat='';
    $media = '';
    $res = '';
    $p='';
    $a= '';
    

    if(isset($_POST["calcular"])){
        $botao = $_POST["calcular"];

        // validação de campo
        if($erro == 0 && isset($_POST["fatorial"]) && !empty($_POST["fatorial"])){
            $fat = $_POST["fatorial"];
        }else{
            $erro = 1;
            $msg = "Digite um número válido.";}
            if(isset($_POST["p"]) && !empty($_POST["p"])){
                $p = $_POST["p"];}
           // }else{
                //$erro = 1;
               // $msg = "Digite um número válido.";}
 
        if($erro == 0){ //se não houver erro executa a operação de media aritimetica
            
            // se o tipo da media for o media1, a função mediaAritimetica como parametro das notas sera chamada
            //media1 servirar de valor para o radio
           if($_POST["tipoMedia"] == "media1"){
             $num = fatorial($num, $fat);
            }
            
            $res = "O valor da média é " . $num;

            if($_POST["tipoMedia"] == "media2"){
                $num = fatorial($num, $fat);
                $media = arranjo($num, $fat, $p);
               }
               
               $res = "O valor da média é " . $media;
 }
}
// declarando a função mediaAritimetica
//não entendo o pq da declaracao da função aparecer dps da execução da função, considerando que os codigos são lidos em ordem. 
//suponho que seja executada de modo independente, o lugar onde ela se encontra no cod n faz diferença
// Caso seja fatorial de 0

// Calculando o fatorial


function fatorial($num, $fat){
  while ($fat>1){
  $num=$num*$fat;
    $fat--;
  }
echo  "resultado " .$num;
    }

    function arranjo($num,$p,$fat){

        $media= (fatorial($num, $fat))/($fat-$p);
      
        return $media;
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
<form action="ListaExerc2_2.php" method="post">
    <div class="main">
    <table>
        <!-- Se o erro for difente de 0 (caso tenha erro) exibir uma mensagem-->
        <?php if ($erro != 0) {?>
            <tr>
                <td colspan="2" class="mensagem">Mensagens: <?php echo $msg; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2"><h1>Cálculo das Médias</h1></td>
        </tr>
        <tr>
            <td colspan="2" class="tmedia">
                <input type="radio" name="tipoMedia" value="media1" checked> Fatorial<br><!--Corresponde a media aritimetica que é relacionada com a logica em php atraves do value-->
                <input type="radio" name="tipoMedia" value="media2"> Arranjo<br><!--Corresponde a media ponderada que é relacionada com a logica em php atraves do value-->
                <input type="radio" name="tipoMedia" value="media3"> Combinação<br><!--Corresponde a media harmonica que é relacionada com a logica em php atraves do value-->

            </td>
        </tr>
        <tr>
            <td><label for="lb1" >Nota 1: </td>
            <td><input type="number" name="fatorial" value="<?php echo $fat ?>"> </td>
        </tr>
        <tr>
            <td><label for="lb1" >Informe o número de agrupamentos: </td>
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