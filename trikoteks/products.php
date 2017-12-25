<?php 
    include 'includes/header.php'; 
    
?>

<div id="slider_wrapper_small">
</div>

<div id="content_wrapper">
    <div class="side_menu">
        <div class="side_menu_header side_menu_header_top">
            <span><?=($_SESSION['lng']=="MK")?"Плетени ракавици":"Knitted gloves"?></span>
        </div>
        <ul class="side_menu_items">
                <li>
                    <a id="1" class="current" href="#"><?=($_SESSION['lng']=="MK")?"Памучна":"Cotton"?>
                    <img class="smallimg" src="images/pamucna_nav.png"  >
                    </a>                   
                </li>
                <li>
                    <a id="2" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Полиамидна Poly Flex":"Polyamide Poly Flex"?>
                    <img class="smallimg" src="images/poliamidna_nav.png"  ></a>
                </li> 
                <li>
                    <a id="3" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Полиамидна Poly One":"Polyamide Poly One"?>
                    <img class="smallimg" src="images/poly_one_nav.png"></a>
                </li>
                 <li>
                    <a id="4" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"По спецификација":"By specification"?>
                    <img class="smallimg" src="images/spec1_nav.png">
                    </a>
                </li>
	</ul>
        <div class="side_menu_header">
            <span><?=($_SESSION['lng']=="MK")?"Гумирани ракавици":"Coated gloves"?></span>
        </div>
         <ul class="side_menu_items">
                <li>
                    <a id="5" class="" href="#"><?=($_SESSION['lng']=="MK")?"Памучни дотинг":"Cotton with PVC dots"?>
                     <img class="smallimg" src="images/pamucna_doting_nav.png">
                    </a>
                </li>
                 <li>
                    <a id="6"  class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Полиамидна дотинг":"Polyamide with PVC dots"?>
                    <img class="smallimg" src="images/poliamidna_doting_nav.png">
                    </a>
                </li>
                <li>
                    <a id="7" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Полиамидна гумирана":"Polyamide coated"?>
                    <img class="smallimg" src="images/siva_nav.png">
                    </a>
                </li>
                 <li>
                    <a id="8" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Бест":"Best"?>
                    <img class="smallimg" src="images/best00_nav.png">
                    </a>
                </li>
                <li>
                    <a id="9" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Бест двослојна":"Best double layer"?>
                    <img class="smallimg" src="images/best_nav.png">
                    </a>
                </li>
                <li>
                    <a id="10" class="" href="/business/ftp-alternative/"><?=($_SESSION['lng']=="MK")?"Дипер":"Dipper"?>
                    <img class="smallimg" src="images/dipper_nav.png">
                    </a>
                </li>
	</ul>
        <div class="side_menu_header side_menu_header_bottom">
             &nbsp;
        </div>
    </div>
    
    <div id="main" class="fade">
   <?  if($_SESSION['lng'] == "MK")  {  ?>
       <div class="heading1">Плетена памучна ракавица</div>
   <? }else{ ?>
       <div class="heading1">Knitted cotton glove</div>
   <? } ?>
      
            <a href='images/pamucna_big.jpg' class = 'cloud-zoom' id='zoom1'
                rel="adjustX: 10, adjustY:-4">
                <img class="images"  src="images/pamucna_small.jpg" alt='' title="Optional title display" />
            </a>

            <a href='images/pamucna_big.jpg' class='cloud-zoom-gallery' title='<?=($_SESSION['lng']=="MK")?"Предна страна":"Front side"?> 10G'
                    rel="useZoom: 'zoom1', smallImage: 'images/pamucna_small.jpg' ">
            <img src="images/pamucna_thumb.jpg" alt = "Pamucna"/></a>

            <a href='images/pamucna2_big.jpg' class='cloud-zoom-gallery' title='<?=($_SESSION['lng']=="MK")?"Задна страна":"Back side"?> 10G'
                    rel="useZoom: 'zoom1', smallImage: 'images/pamucna2_small.jpg' ">
            <img src="images/pamucna2_thumb.jpg" alt = "Pamucna"/></a>

            <a href='images/pamucna3_big.jpg' class='cloud-zoom-gallery' title='<?=($_SESSION['lng']=="MK")?"Предна страна":"Front side"?> 7G'
                    rel="useZoom: 'zoom1', smallImage: 'images/pamucna3_small.jpg' ">
            <img src="images/pamucna3_thumb.jpg" alt = "Pamucna"/></a>

            <a href='images/pamucna4_big.jpg' class='cloud-zoom-gallery' title='<?=($_SESSION['lng']=="MK")?"Задна страна":"Back side"?> 7G'
                    rel="useZoom: 'zoom1', smallImage: 'images/pamucna4_small.jpg' ">
            <img src="images/pamucna4_thumb.jpg" alt = "Pamucna"/></a>

    </div>
    <div id="description" class="fade">
        <?  if($_SESSION['lng'] == "MK")  {  ?>
        
            <p class="product_heading">Опис</p>
            <p class="product_text">Изработена од 100%  памучно предиво, без шевови, изработена на 10G или 7G машини. Нуди одлична флексибилност при работењето и може да се користи од двете страни со што се продолжува нејзиниот век. </p>
            <p class="product_heading">Примена</p>
            <p class="product_text">Ракување и општа работа, за основна заштита на рацете или како подлога</p>
            <p class="product_heading">Големини</p>
            <p class="product_text">8 и 10</p>
            <p class="product_heading">Стандарди</p>
            <p class="product_text">Ниво на ризик: <strong>Kат. I</strong></p>
        
        <? } else {  ?>
        
            <p class="product_heading">Description</p>
            <p class="product_text">Made from 100% cotton yarn, seamless knit, made on 10G or 7G machines. Excelent flexibility and ambidextrous shape that dubbles it's lifetime.</p>
            <p class="product_heading">Use</p>
            <p class="product_text">General work and handling, for basic hand protection or like underglove</p>
            <p class="product_heading">Sizes</p>
            <p class="product_text">8 and 10</p>
            <p class="product_heading">Standards</p>
            <p class="product_text">Risk level: <strong>Cat. I</strong></p>
        <? } ?>
        
    </div>
    
</div>
<script>
    $( ".side_menu_items li a" ).click(function() {
        var id = $(this).attr('id');
        $.post( "change.php", { id: id}, function( data ) {
            $( ".fade" ).fadeOut(200, function(){
                $( "#main" ).html(data.image_html);
                $( "#description" ).html(data.description_html);
                $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            });
            $( ".fade" ).fadeIn(200);
            $('.side_menu_items li a').attr('class','');
            $('#'+id).attr('class','current');            
        }, "json");
        return false;
    });
    
    function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
    });
    }
    
    $( document ).ready(function() {
        preload([
            'images/pamucna_small.jpg',
            'images/poliamidna_small.jpg',
            'images/poly_one_small.jpg',
            'images/spec1_small.jpg',
            'images/spec1_thumb.jpg',
            'images/pamucna_doting_small.jpg',
            'images/poliamidna_doting_small.jpg',
            'images/siva_small.jpg',
            'images/best00_small.jpg',
            'images/best_small.jpg',
            'images/dipper_small.jpg'
        ]);
    });
    
</script>

<?php 
    include 'includes/footer.php'; 
?>