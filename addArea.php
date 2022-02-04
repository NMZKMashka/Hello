<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<?php
if(isset($_POST["addArea"])){
    if(!empty($_POST['area']) ) {
        $area = $_POST['area'];
        $query=mysql_query("SELECT * FROM area ");
        $numrows=mysql_num_rows($query);
        if($numrows==0)
        {
            $sql="INSERT INTO area
			(area) 
			VALUES('$area')";
            $result=mysql_query($sql);
            if($result){
                $message = "Успешно создано!";
            } else {
                $message = "Не удалось добавить данную информацию!";
            }
        } else {
            $message = "Этот город уже существует. Выберите другой!";
        }
    } else {
        $message = "Все поля обязательны для заполнения";
    }
}
?>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
<div class="container mregister">
    <div id="login">
        <h1>Добавление</h1>
        <form name="registerform" id="registerform" action="addArea.php" method="post">
            <p>
                <label for="user_login">Город<br />
                    <input type="text" name="area" id="area" class="input" size="32" value=""  /></label>
            </p>
            <p class="submit">
            <center>  <input type="submit" name="addArea" id="addArea" class="button" value="Добавить" /></center>
            </p>
            <a href="panel.php">Вернуться</a>
        </form>

    </div>
</div>
