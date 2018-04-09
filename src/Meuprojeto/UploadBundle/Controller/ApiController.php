<?php

namespace Meuprojeto\UploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Meuprojeto\UploadBundle\Entity\Files;
use Meuprojeto\UploadBundle\Form\FilesType;
 

class ApiController extends Controller
{
    
	//GET
    public function getAction($id){
    	$em = $this->getDoctrine()->getManager();
    	//select * from files table;
    	$file = $em->getRepository('MeuprojetoUploadBundle:Files')->find($id);

    	$file_upload = $file->getUrl();
    	//carrega o xml do arquivo na pasta uploads/xml
    	$file_upload = simplexml_load_file($this->getParameter('file_upload')."\\".$file_upload);
    	$xml = $file_upload; 
    	
     	$json_str = json_encode($xml);
     	
		$response = new Response($json_str);
		$response->setStatusCode(200);

		return $response;

    }
 

   
}
