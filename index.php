<?php
    function result($game){
        $player_one;
        $player_two;
        foreach($game as $row){
            foreach($row as $cell){
                if(preg_match("/[^XO-]+/", $cell)){
                    return "Error!";
                    exit();
                }
                $player_one[] = ($cell == 'X') ? 1 : 0;
                $player_two[] = ($cell == 'O') ? 1 : 0;
            }
        }
        $matchs = array(
            array(1,0,0,0,1,0,0,0,1),
            array(1,0,0,1,0,0,1,0,0),
            array(0,1,0,0,1,0,0,1,0),
            array(0,0,1,0,0,1,0,0,1),
            array(0,0,1,0,1,0,1,0,0),
            array(1,1,1,0,0,0,0,0,0),
            array(0,0,0,1,1,1,0,0,0),
            array(0,0,0,0,0,0,1,1,1)
        );
        foreach($matchs as $m){
            $p1 = 0;
            $p2 = 0;
            for($x = 0; $x < 9; $x++){
                if($player_one[$x] == 1 && $m[$x] == 1){
                    $p1++;
                }
                if($player_two[$x] == 1 && $m[$x] == 1){
                    $p2++;
                }
            }
            if($p1 == 3 && $p2 != 3){
                return "Player 1 Wins!";
                exit();
            }
            if($p1 != 3 && $p2 == 3){
                return "Player 2 Wins!";
                exit();
            }
        }
        return "Draw!";
    }

    $values = $_POST;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tic Tac Toe</title>
</head>
<body>
    <h1>Tic tac toe</h1>
    <form action="" method="post">
        <table cellpadding='10'>
            <tr>
                <td colspan='3'><?=result($_POST)?></td>
            </tr>
            <tr>
                <td><input type="text" name="r1[]" value="<?=($values['r1'][0] == '')?'-':$values['r1'][0]?>"></td>
                <td><input type="text" name="r1[]" value="<?=($values['r1'][1] == '')?'-':$values['r1'][1]?>"></td>
                <td><input type="text" name="r1[]" value="<?=($values['r1'][2] == '')?'-':$values['r1'][2]?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="r2[]" value="<?=($values['r2'][0] == '')?'-':$values['r2'][0]?>"></td>
                <td><input type="text" name="r2[]" value="<?=($values['r2'][1] == '')?'-':$values['r2'][1]?>"></td>
                <td><input type="text" name="r2[]" value="<?=($values['r2'][2] == '')?'-':$values['r2'][2]?>"></td>
            </tr>
            <tr>
                <td><input type="text" name="r3[]" value="<?=($values['r3'][0] == '')?'-':$values['r3'][0]?>"></td>
                <td><input type="text" name="r3[]" value="<?=($values['r3'][1] == '')?'-':$values['r3'][1]?>"></td>
                <td><input type="text" name="r3[]" value="<?=($values['r3'][2] == '')?'-':$values['r3'][2]?>"></td>
            </tr>
            <tr>
                <td colspan='3'><button type="submit">Check the game</button></td>
            </tr>
        </table>
        
    </form>

    <?php var_dump($_POST); ?>
</body>
</html>