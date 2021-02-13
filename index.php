<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <h1>test</h1>
    <fieldset>Cal

    first operand: <input type="number" name="numb1">
        <select name="operator" id="">
            <option value="add">Add</option>
            <option value="sub">Subtract</option>
            <option value="mul">Multiple</option>
            <option value="div">Divide</option>
        </select><br>
        second operand: <input type="number" name="numb2"><br>
        <button type="submit">Cal</button>
    </fieldset>
</form>
Result: <h2></h2>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $numb1=$_POST['numb1'];
    $operator=$_POST['operator'];
    $numb2=$_POST['numb2'];

    function add($a,$b){
        global $operator;
        if ($operator==='add'){
            $add=$a+$b;
        }
        return $add;
    }

    function subtract($a,$b){
        global $operator;
        if ($operator==='sub'){
            $sub=$a-$b;
        }
        return $sub;
    }

    function multiply($a,$b){
        global $operator;
        if ($operator==='mul'){
            $mul=$a*$b;
        }
        return $mul;
    }

    function divide($a,$b){
        global $operator;
        if ($b==0){
            throw new Exception('/by zero');
        }elseif ($operator==='div'){
            $div=$a/$b;
        }
        return $div;
    }

    try {
        var_dump(add($numb1,$numb2));
        var_dump(subtract($numb1,$numb2));
        var_dump(multiply($numb1,$numb2));
        var_dump(divide($numb1,0));
    }catch (Exception $e){
        echo $e->getMessage();
    }
}