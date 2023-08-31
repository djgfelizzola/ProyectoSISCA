<?php
include("./componentes/navegacion.php");

?>

        <div id="contentWrapper">
        
            <div class="carousel" data-flickity='{ "autoPlay": true }'>
                    
                    <div class="carousel-cell"> <img
                            src="../img/carrusel1.png"
                            alt=""> </div>
                    <div class="carousel-cell"><img
                            src="../img/carrusel2.png"
                            alt=""></div>
                    <div class="carousel-cell"><img
                            src="../img/carrusel3.png"
                            alt=""> </div>
                
                </div>
        
        <br>
        <br>
        	 <div id="headline">
            	<center>
                <h1>Información Institucional</h1>
              </center>
            </div>
            <div id="content">
            	<div id="contentSize">
            		<div class="contentLeft">
                		<h1 style="text-align: center;">Ahora estudiamos desde casa!</h1>
                		<p>Desde el dia mayo 14 nuestros estudiantes empezaron sus clases virtuales desde casa, gracias al apoyo de sus papás sus niños pueden estudiar...</p>
              		</div><!--end of contentLeft-->
               
            		<div class="contentRight">
                		<img src="../img/Noticia1.png"/>
            		</div><!--end of contentRight--> 
 
        		</div><!--End of Content Size-->
                <br><br><br> 
                
                <div style="padding-top: 20%;" id="contentSize">
            		<div class="contentLeft">
                		<h1 style="text-align: center;">Queremos lo mejor para todos 🙌</h1>
                		<p>Nuestras recomendaciones para que te cuides a ti y a tu familia, en esta epoca de pandemia debemos de luchar todos, mira el video ahora mismo! </p>
              		</div><!--end of contentLeft-->
               
            		<div class="contentRight">
                		<iframe width="400" height="300" src="https://www.youtube.com/embed/x1xvTiZpkv0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            		</div><!--end of contentRight--> 
        		</div><!--End of Content Size-->
        	</div><!--End of content div-->	
        </div><!--End of Content Wrapper-->
 
        <?php 
    include("./componentes/footer.php");
   ?>