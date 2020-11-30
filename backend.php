<?php include 'config.php'; ?>
<?php



if(isset($_POST['form'])){



    $val_id = $_POST["val_id"];

    $cars = "SELECT new_cars, used_cars FROM modele Where id= '$val_id' ";
$result_cars = mysqli_query($conn, $cars);

while($row = mysqli_fetch_array($result_cars)) 
{
    
    $new_cars = "".$row["new_cars"]." " ;
    $used_cars = "".$row["used_cars"]." " ;

    
    echo "<div class='row car_result'>
    <div ><b>$new_cars</b> Samochody nowe &nbsp; &nbsp; > </div>
    <div ><b>$used_cars</b> Samochody używane &nbsp;  &nbsp;> </div>
    <div>";
    
}
}

?>