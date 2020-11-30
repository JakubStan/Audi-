<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Audi Polska | Przewaga Dzięki Technice</title>
</head>

<body>
<div class="abc">1234</div>
<?php include 'menu/menu.php'; ?>

<?php include 'home-part-section/slider/slider.php' ?>


<section id="car-for-bay">

    <div class="container-fluid">
	    <div class="row">

            <div class="title"><h4>Dostępne u delerów</h4></div>

            <div class= "models">
            <p>Model</p>
            <?php
            $sql = 'SELECT * FROM modele';
            $myresult = mysqli_query($conn, $sql);
            echo "<select type='text' name='motherboard' id='form' >";
				while($row = mysqli_fetch_array($myresult)) 
				{
                    echo "<option  value=".$row["id"]." >" . $row['name'] . "</option>";
                 
				}
            echo "</select>";
            ?>
            </div>
              
            <div id='result'>
            <?php
            $cars = "SELECT new_cars, used_cars FROM modele Where id= '1' ";
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
            ?>
            </div>
                                   
        </div>
    </div>

</section> 



<div class="container-fluid">
	<div class="row">
		<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
      <div class="MultiCarousel-inner">
             
          <script>
                         
            $.getJSON('cars/cars copy 2.json', function(json) { 
            $.each(json, function(key, value) {
              
            $(".MultiCarousel-inner").append(
            "<div class='item' onClick='load_models(this.id)'  id='" + value.id + "'  ><div class='pad15'  ><img class='car-img-" + value.id + "' id='" + value.id + "' src='" + value.img + "'><div><h4 class='name'>" + value.name + "</h4></div></div><input type='hidden' class='imput-car" + value.id + "' value='" + value.img_alt + "' ></div>",
            );
            });
            });
           
          </script>
               
</div>
            <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
        </div>
	</div>

	</div>
</div>

<section id='models' class='cars-models'>
  <div class='close-btn'></div>
  <div class='car-name'></div>
  <div class='models-cars'></div>
</section>
 

<?php include 'home-part-section/advertisement/advertisement.php' ?>
<?php include 'home-part-section/customer area/customer area.php' ?>
<?php include 'home-part-section/dealers/dealers.php' ?>
<?php include 'home-part-section/audi-in-social/audi-in-social.php' ?>
<?php include 'footer/footer.php'; ?>

</body>
</html>


<script type="text/javascript">

  function load_models(clicked_id)
  {
      var path = clicked_id;
      
      var img_alt = document.getElementsByClassName('imput-car'+path )[0].value;
   
      $('.car-img-'+path ).attr("src", img_alt);
      
      $.getJSON('cars/models/'+path+'.json', function(json) { 
            $.each(json, function(key, value) {
            $(".models-cars").append(
              "<div class='item'><div><img class='model-img' src='" + value.img + "'></div><div><h5>" + value.name + "</h5></div></div>"
              
            );
            
            });
            $(".car-name").append(
              "<h2>" +path+ "</h2>",
            );

            $(".close-btn").append(
              "<button>x</button>",
            );
           
            });
     }

</script>



<script>
$(document).ready(function() {
    $( "#form" ).change(function() {
        $.ajax({
                url: 'backend.php',
                type: 'post',
            
                data: {form: $(this).val(),
                    val_id:val_id= $('#form').val(),
                },
                success: function(result){
                    
                
                    $("#result").html(result);
                    
                }
            });
    });
});
</script>   




