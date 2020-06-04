<?php 

        /*
        * Construção do Form
        */
        function _formConstruct($acaoForm, $metodoEnvio, $class='login'){
            echo '<div><form action="'.$acaoForm.'" method="'.$metodoEnvio.'">';
        }

        function _formDestruct(){
            echo '</form></div>';
        }
        /*
        * Contrução do FieldSet
        */
        function _fieldSetContruct($id, $name, $height='auto', $width='auto', $fontStyle='bold', $src=''){
            if($src){
                echo '<fieldset id="'.$id.'" style="width:'.$width.'px; height:'.$height.'px"><legend style="font-weight:'.$fontStyle.'"><img border="0" src="'.$src.'" width="40px" height="40px"></legend>';
            }else{
                echo '<fieldset id= "'.$id.'" style="width:'.$width.'px; height:'.$height.'px"><legend style="font-weight:'.$fontStyle.'">'.$name.'</legend>';
            }
            
        }

        function _fieldSetDestruct(){
            echo '</fieldset>';
        }

        /*
        * Contrução do Input
        */
        function _input($id, $type, $name, $height ,$width, $value = ""){
            echo '<p><label>'.$name.'</label><input id= "'.$id.'" value="'.$value.'" name= "'.$id.'" type="'.$type.'" style="height:'.$height.'px; width:'.$width.'px" ></p>';
        }
        /*
        * Construção do botão
        */
        function _button($id, $type, $name, $height=70, $width=70, $onclick=null){
            echo '<p><label><button id = "'.$id.'" type="'.$type.'" onclick= "'.$onclick.'" style="height:'.$height.'px; width:'.$width.'px">'.$name.'</button></label></p>';
        }


?>