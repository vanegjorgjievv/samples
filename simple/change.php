<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

        if(isset($_POST['lng'])){
            session_start();
            $_SESSION['lng'] = $_POST['lng'];
            die("OK");
        }
        session_start();
        $arg = $_POST['id'];

        $str1 = "";
        $str2 = "";
        
        $title = "";
        $img1 = "";
        $img2 = "";
        $img3 = "";
        $img4 = "";
        
        $img3_show="display:none;";
        $img4_show="display:none"; 
        
        $description = "";
        $use = "";
        $sizes = "";
        $standards = "";
        
        
        if($_SESSION['lng'] == "MK"){
                $img1_title="Предна страна";
                $img2_title="Задна страна";
                $img3_title="Предна страна";
                $img4_title="Задна страна";

                $description_name = "Опис";
                $use_name = "Примена";
                $sizes_name = "Големини";
                $standards_name = "Стандарди";
        }else{
                $img1_title="Front side";
                $img2_title="Back side";
                $img3_title="Front side";
                $img4_title="Back side";

                $description_name = "Description";
                $use_name = "Use";
                $sizes_name = "Sizes";
                $standards_name = "Standards";
        }

        $str1_var = " <div class='heading1'>##TITLE##</div>
                    <a href='images/##IMG1##_big.jpg' class = 'cloud-zoom' id='zoom1'
                        rel=\"adjustX: 10, adjustY:-4\">
                        <img class=\"images\"  src=\"images/##IMG1##_small.jpg\" />
                    </a>
                    <a href='images/##IMG1##_big.jpg' class='cloud-zoom-gallery' title='##IMG1_TITLE##'
                            rel=\"useZoom: 'zoom1', smallImage: 'images/##IMG1##_small.jpg' \">
                    <img src=\"images/##IMG1##_thumb.jpg\" alt = \"##IMG1_TITLE##\"/></a>
                    <a href='images/##IMG2##_big.jpg' class='cloud-zoom-gallery' title='##IMG2_TITLE##'
                            rel=\"useZoom: 'zoom1', smallImage: 'images/##IMG2##_small.jpg' \">
                    <img src=\"images/##IMG2##_thumb.jpg\" alt = \"##IMG2_TITLE##\"/></a>
                    <a style='##IMG3_SHOW##'  href='images/##IMG3##_big.jpg' class='cloud-zoom-gallery' title='##IMG3_TITLE##'
                            rel=\"useZoom: 'zoom1', smallImage: 'images/##IMG3##_small.jpg' \">
                    <img src=\"images/##IMG3##_thumb.jpg\" alt = \"##IMG3_TITLE##\"/></a>
                    <a style='##IMG4_SHOW##' href='images/##IMG4##_big.jpg' class='cloud-zoom-gallery' title='##IMG4_TITLE##'
                            rel=\"useZoom: 'zoom1', smallImage: 'images/##IMG4##_small.jpg' \">
                    <img src=\"images/##IMG4##_thumb.jpg\" alt = \"##IMG4_TITLE##\"/></a>";
        
        $str2_var = "<p class=\"product_heading\" >##DESCRIPTION_NAME##</p>
                    <p class=\"product_text\" >##DESCRIPTION##</p>
                    <p class=\"product_heading\" >##USE_NAME##</p>
                    <p class=\"product_text\">##USE##</p>
                    <p class=\"product_heading\" >##SIZES_NAME##</p>
                    <p class=\"product_text\" >##SIZES##</p>
                    <p class=\"product_heading\" >##STANDARDS_NAME##</p>
                    <p class=\"product_text\" >##STANDARDS##</p>";

         $replace_arr = array('##TITLE##', '##IMG1##', '##IMG2##', '##IMG3##', '##IMG4##','##IMG1_TITLE##', '##IMG2_TITLE##', '##IMG3_TITLE##', '##IMG4_TITLE##', '##IMG3_SHOW##', '##IMG4_SHOW##');
         $replace_arr2 = array('##DESCRIPTION##', '##USE##', '##SIZES##', '##STANDARDS##', '##DESCRIPTION_NAME##', '##USE_NAME##', '##SIZES_NAME##', '##STANDARDS_NAME##');
        
        switch ($arg)
        {
            case "1":   // PAMUCNA RAKAVICA
                $img1 = "pamucna";
                $img2 = "pamucna2";
                $img3 = "pamucna3";
                $img4 = "pamucna4";
                $img3_show="";
                $img4_show=""; 
                                
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена памучна ракавица";
                     $description = "Изработена од 100%  памучно предиво, без шевови, изработена на 10G или 7G машини. Нуди одлична флексибилност при работењето. Може да се користи од двете страни со што се продолжува нејзиниот век. ";
                     $use = "Ракување и општа работа, за основна заштита на рацете или како подлога";
                     $sizes = "8 и 10";
                     $standards = "Ниво на ризик: <strong>Kат. I</strong>";
                     $img1_title="Предна страна 10G";
                     $img2_title="Задна страна 10G";
                     $img3_title="Предна страна 7G";
                     $img4_title="Задна страна 7G";
                } else {
                     $title = "Knitted cotton glove";
                     $description = "Made from 100% cotton yarn, saemless knit, made on 10G or 7G machines. Excelent flexibility and ambidextrous shape that dubbles it's lifetime.";
                     $use = "General work and handling, for basic hand protection or like underglove";
                     $sizes = "8 and 10";
                     $standards = "Risk level: <strong>Cat. I</strong>";
                     $img1_title="Front side 10G";
                     $img2_title="Back side 10G";
                     $img3_title="Front side 7G";
                     $img4_title="Back side 7G";
                }
            break;
                     
            case "2":    // Poliamidna rakavica Poly Flex
                $img1 = "poliamidna";
                $img2 = "poliamidna2";
                $img3 = "poliamidna3";
                $img4 = "poliamidna4";
                $img3_show="";
                $img4_show=""; 
                                
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена полиамидна ракавица Poly Flex";
                     $description = "Изработена од 100% полиамид, без шевови, во бела или сива боја. Не остава отисоци при работењето. Лесна е и нуди одлична флексибилност и може да се користи од двете страни со што се продолжува нејзиниот век. ";
                     $use = "во автомобилска индустрија при фарбање и склопување на компоненти, при производство на електроника и електронски компоненти";
                     $sizes = "8 и 10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_poly_flex.jpg' >";
                } else {
                     $title = "Knitted polyamide glove Poly Flex";
                     $description = "Made from 100% polyamide yarn, seamless knit in white or grey color. It doesn't leave fingerprints. Vary light with exelant flexibility and ambidextrous shape that dubbles it's lifetime";
                     $use = "The glove is ideal for finishing applications, mechanical assembly lines, electronics industry.";
                     $sizes = "8 and 10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg' >
                     <img class='img3'  src='images/EN388_poly_flex.jpg' >";
                }
            break;
        
            case "3": // Poliamidna Poly One
                $img1 = "poly_one";
                $img2 = "poly_one2";
                $img3 = "poly_one3";
                $img4 = "poly_one4";
                $img3_show="";
                $img4_show=""; 
                                
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена полиамидна ракавица Poly One";
                     $description = "Изработена од 100% полиамид, без шевови, во бела или сива боја. Не остава отисоци при работењето. Потешка е и нуди одлична заштита при работењето, одлична флексибилност и може да се користи од двете страни со што се продолжува нејзиниот век. ";
                     $use = "во автомобилска индустрија при фарбање и полирање";
                     $sizes = "8 и 10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_poly_one.jpg' >";
                } else {
                     $title = "Knitted polyamide glove Poly One";
                     $description = "Made from 100% polyamide yarn, seamless knit in white or black color. It doesn't leave fingerprints. Heavier, with exelant flexibility and exelant hand protection, ambidextrous shape that dubbles it's lifetime.";
                     $use = "The glove is ideal for finishing applications, automotive industry.";
                     $sizes = "8 and 10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_poly_one.jpg' >";
                }
            break;

            case "4":  // po specifikacija
                $img1 = "spec1";
                $img2 = "spec3";
                $img3 = "spec2";
                $img3_show="";
               
               // $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $img1_title=$img2_title=$img3_title="Предна страна";
                     $title = "Плетени ракавици по корисничка спецификација";
                     $description = "Изработуваме ракавици по потреба и спецификација на корисникот од различни материјали и различни големини. ";
                     $use = "Спрема потребите на корисникот";
                     $sizes = "Спрема потребите на корисникот";
                     $standards = "Ниво на ризик: <strong>Kат. I</strong>";
                } else {
                     $img1_title=$img2_title=$img3_title="Front side";
                     $title = "Custom made knitted gloves";
                     $description = "Made according to customers needs and specification, from different materials and in differnet sizes.";
                     $use = "according to customers needs";
                     $sizes = "according to customers needs";
                     $standards = "Risk level: <strong>Cat. I</strong>";
                }
             break;
                    
             case "5":  // pamucna doting
                $img1 = "pamucna_doting";
                $img2 = "pamucna2";
                $img3 = "";
                $img4 = "";
               // $img3_show="";
               // $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена памучна ракавица со ПВЦ точки";
                     $description = "Изработенa од 100%  памучно предиво, без шевови, на која се нанесени ПВЦ точки од едната страна. Овозможува одлична удобност при работа, голема флексибилност и нуди помало пролизгување при ракување. ";
                     $use = "Ракување и општа работа, за основна заштита на рацете и намалено пролизгување";
                     $sizes = "10";
                     $standards = "Ниво на ризик: <strong>Kат. I</strong>";
                } else {
                     $title = "Knitted cotton glove with PVC dots";
                     $description = "Seamless lightweight 100% cotton knitted glove. With PVC dots on the palm to provide elevated levels of grip. Glove designed to protect handled objects from fingerprints. Highly flexible with excellent dexterity for optimum comfort in use.";
                     $use = "Ideal for precise assembly and light duty work requiring accurate handling and better grip.";
                     $sizes = "10";
                     $standards = "Risk level: <strong>Cat. I</strong>";
                }
             break;           

             case "6":  // poliamidna doting
                $img1 = "poliamidna_doting";
                $img2 = "poliamidna2";
                $img3 = "";
                $img4 = "";
                // $img3_show="";
                // $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена полиамидна ракавица со ПВЦ точки";
                     $description = "Издработена од 100% полиамидна подлога, без шевови на која се нанесени ПВЦ точки од едната страна. Овозможува одлична удобност при работа, голема флексибилност и помало пролизгување при ракување. Овозможува висока заштита при манипулација со многу топли или ладни предмети.";
                     $use = "Пекарска индустрија, Ракување со смрзната храна, ракување и составување на остри предмет и предмети што се лизгаат.";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_poly_flex.jpg' >";
                } else {
                     $title = "Knitted polyamide glove with PVC dots";
                     $description = "Seamless lightweight 100% polyamide knitted glove. With PVC dots on the palm to provide elevated levels of grip. Glove designed to protect handled objects from fingerprints. Highly flexible with excellent dexterity for optimum comfort in use. Excelent for handling very hot or cold objects.";
                     $use = "Used in bakeries, handling frozen food, handling and assembly of slightly sharp and slippery objects. ";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_poly_flex.jpg' >";
                }
            break;           
        
            case "7":  // poliamidna gumirana siva i bela
                $img1 = "siva";
                $img2 = "siva2";
                $img3 = "bela";
                $img4 = "bela2";
                $img3_show="";
                $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Плетена полиамидна ракавица со танок слој латекс";
                     $description = "Изработена од 100% полиамидна безшевна подлога на која е нанесен тенок слој од природен латекс на дланката. Изработена во црна или бела варијанта. Празниот надворечен дел овозможува вентилација и дишење на раката во топли услови. Нуди висока заштита при работењето, флексибилност и одличен комфор. ";
                     $use = "Ракување и општа работа со намалено пролизгување и поголема отпорност при влажни услови";
                     $sizes = "10";
                     $standards = "Ниво на ризик: <strong>Kат. I</strong>";
                } else {
                     $title = "Knitted polyamide glove with thin latex coating";
                     $description = "Latex coated seamless nylon liner. Palm coated flat dip with ventilated back to keep hands cool in warm conditions. High degree of flexibility and durability with optimum dexterity. The glove has excellent level of comfort.";
                     $use = "Glove ideal for use in general assembly, engineering applications, joinery, woodworks, carpets installation and steel fixing.";
                     $sizes = "10";
                     $standards = "Risk level: <strong>Cat. I</strong>";
                }
             break;     
                    
            case "8":  // BEST
                $img1 = "best00";
                $img2 = "best01";
                $img3 = "";
                $img4 = "";
                // $img3_show="";
                // $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Латексирана ракавица Бест";
                     $description = "Плетена безшевна 100% памучна подлога умакана во природен латекс. Ваквиот спој овозможува удобност при работењето и висока флексибилност и голема механичка заштита на раката. ";
                     $use = "Градежната индустрија, комунални и општи работи";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_best.jpg' >";
                } else {
                     $title = "Latex dipped glove Best";
                     $description = "Natural rubber latex coating on seamless 100% cotton liner. High degree of flexibility and durability with excellent comfort. Good grip pattern offering excellent wet and dry grip. High mechanical resistance.";
                     $use = "Construction industry, utility works and general work";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_best.jpg' >";
                }
             break;   
               
             case "9":  // BEST dvoslojna
                $img1 = "best";
                $img2 = "best2";
                $img3 = "";
                $img4 = "";
                // $img3_show="";
                // $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Двојно латексрирана ракавица Бест";
                     $description = "Плетена безшевна 100% памучна подлога двојно умакана во природен латекс.  Овозможува удобност при работењето, а двојниот слој од природен латекс ја чини оваа ракавица двојно поотпорна на абење и останати механички ризици. ";
                     $use = "Градежништвото, тешката индустрија, металургијата како и при производството на материјали за гарадежништво.";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_best2.jpg' >";
                } else {
                     $title = "Dubble latex dipped gloves Best";
                     $description = "Double natural rubber latex coating on seamless 100% cotton liner. Good degree of flexibility. The double latex coating gives better mechanical resistance and longer glove life. Good grip pattern offering excellent wet and dry grip.";
                     $use = "Construction industry, heavy industry, metallurgy, making raw materials for construction";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_best2.jpg' >";
                }
             break;   
                    
             case "10":  // dipper
                $img1 = "dipper";
                $img2 = "dipper2";
                $img3 = "dipper3";
                $img4 = "dipper4";
                $img3_show="";
                $img4_show=""; 
                if($_SESSION['lng'] =="MK")  {
                     $title = "Латексирана ракавица Дипер";
                     $description = "Изработена од плетена, 100% памучна подлога без шевовови на која е нанесен природен латекс на дланката. Рапавиот слој од латекс не дозволува пролизгување при работа со суви или влажни предмети. Овозможува добар осет при работењето и е удобна за носење. ";
                     $use = "Градежната индустрија, комунални и општи работи.";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_dipper.jpg' >";
                } else {
                     $title = "Latex dipped glove Dipper";
                     $description = "Industrial protective glove with natural rubber latex palm fit coating. Seamless 100% cotton liner. Wrinkled grip pattern offering excellent wet and dry grip. Open back reduces perspiration build up.";
                     $use = "Construction industry, utility works and general work";
                     $sizes = "10";
                     $standards = "<img class='img1'  src='images/EN420.jpg'  >
                     <img class='img2'  src='images/ce.jpg'  >
                     <img class='img3'  src='images/EN388_dipper.jpg' >";
                }
            break;    

        
            default:  $str1="err";  $str2="err";         
        }   

        $text_arr = array($title, $img1, $img2, $img3, $img4, $img1_title, $img2_title, $img3_title, $img4_title, $img3_show, $img4_show);
        $str1 = str_replace($replace_arr, $text_arr, $str1_var);
               
        $text_arr2 = array($description, $use, $sizes, $standards, $description_name, $use_name, $sizes_name, $standards_name);
        $str2 = str_replace($replace_arr2, $text_arr2, $str2_var);

        $arr = array("image_html"=>$str1,"description_html"=>$str2 );
        echo json_encode($arr); 

}
else
{
  echo "No Access!!!  .!.";
  // not a post request
}
?>