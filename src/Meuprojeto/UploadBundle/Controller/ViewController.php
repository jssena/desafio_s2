<?php

namespace Meuprojeto\UploadBundle\Controller;

use Unirest as Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\Request;

use Meuprojeto\UploadBundle\Entity\Files;
use Meuprojeto\UploadBundle\Form\FilesType;

 
class ViewController extends Controller
{
     

    public function viewAction($id){
    	
        $headers = array('Accept' => 'text/json');
         
        //$Unirest = new Unirest();
        $response = Request::get("http://localhost/desafio/meu_projeto/web/app_dev.php/api/file/".$id,$headers);

        
        $jsonLista = json_decode($response->raw_body, true);

        if(is_array($jsonLista)){
            $array = $jsonLista;
            $json_array  = $this->abreTabela();
            $json_array .= $this->criaHeader($array);
            $json_array .= $this->criaLinha($array);
            $json_array .= $this->fechaTabela();    
            
            
        }else{
            $json_array = "<div class='alert  alert-warning'><i class='glyphicon glyphicon-warning-sign'></i> Error xml file</div>";
        }
        

        return $this->render('MeuprojetoUploadBundle:Default:view.html.twig', array(
            'list' => $json_array 
        ));

    }

    private function abreTabela(){
        $show ="<table class='table table-striped table-hover panel panel-info'>";
        return $show;
    }
    private function fechaTabela(){
        $show ="</table>";
        return $show;
    }

    private function criaHeader($json){
         
        $show="<tr>";

        $name = key($json);        
        foreach($json[$name][0]  as  $key => $value){
 
            $show .= "<th>".$key."</th>"."\n";
        }
        $show .="</tr>";
        
        return $show;
    }
    private function criaLinha($json){
        
        $show="<tr>";
        $name = key($json); 
        foreach($json[$name]  as  $key => $value){

                
            if(is_array($value)){
                $show .= '<tr>';    
                
                foreach($value   as  $key2 => $value2){

                    if(is_array($value2)){
                       
                        foreach($value2  as   $value3){
                            if(is_array($value3)){
                                $show .= '<td>';
                                foreach($value3  as   $value4){
                                    if(is_array($value4)){
                                        foreach($value4  as   $value5){
                                            if(is_array($value5)){
                                                foreach($value5  as   $value6){
                                                    $show .= "<div class='list-group-item'>".$value6."</div>";
                                                }

                                            }else{
                                                $show .= "<div class='list-group-item'>".$value5.'</div>';
                                            }
                                            
                                        }
                                    }else{
                                        $show .= '<div class="list-group-item">'.$value4.'</div>';        
                                    }
                                }
                                $show .= '</td>';
                            }else{
                                $show .= '<td>'.$value3.'</td>';
                            }   
                        }
                       
                    }else{
                        $show .= '<td>'.$value2.'</td>';
                    }
                    
                }
                $show .= '</tr>';
            }else{
                $show .= '<td>'.$value.'</td>';
            }
        }
        $show .= "</tr>";
             
        return $show;
          
        
        
   }

     
 

   
}
