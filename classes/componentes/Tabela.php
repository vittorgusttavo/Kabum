<?php 

        function _tableConstruct($id, $align = 'left', $legenda = null){
            echo '<table>'; 
            if($legenda){
                echo '<caption style="text-align:'.$align.'">'.$legenda.'</caption> ';
            }
        }
        
        function _tableDestruct(){
            echo '</table>';
        }

        function _colunConstruct(){
            echo '<thead>
                  <tr>';
        }
        function _colunDestruct(){
            echo '</tr>
                  </thead>';
        }

        function _colunLine($name, $width){
            echo '<th style="width:'.$width.'">'.$name.'</th>';
        }

        function _bodyConstruct(){
            echo '<body>';
        }
            
        function _bodyDestruct(){
            echo '</body>';
        }

        function _trConstruct(){
            echo '<tr>';
        }

        function _trDestruct(){
            echo '</tr>';
        }

        function _addLine($name = '', $align, $width, $src = '' , $href = ''){
            if($src){
                echo '  <td align='.$align.' style="width:'.$width.'px"><a href="'.$href.'"><img  src="'.$src.'" width="20px" heigth="20px"></a></td>';
            }else{
                echo '  <td align='.$align.' style="width:'.$width.'px">'.$name.'</td>';
            }
        }
?>