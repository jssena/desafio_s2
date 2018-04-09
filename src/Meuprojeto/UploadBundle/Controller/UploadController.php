<?php

namespace Meuprojeto\UploadBundle\Controller;

 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Meuprojeto\UploadBundle\Entity\Files;
use Meuprojeto\UploadBundle\Form\FilesType;

 
class UploadController extends Controller
{
    public function indexAction(Request $request)
    {

    	$product = new Files();
        $form = $this->createForm(FilesType::class, $product);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            //$file = $product->getUrl();
             // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $product->getUrl();
			$fileName = $this->get('app.file_uploader')->upload($file);

        	$product->setUrl($fileName);

        	$em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            

           


            return $this->redirect($this->generateUrl('Meuprojeto_upload_index'));
        }


        //mostra os arquivos
        $em1 = $this->getDoctrine()->getManager();
        $files = $em1->getRepository('MeuprojetoUploadBundle:Files')->findAll();

        return $this->render('MeuprojetoUploadBundle:Default:upload.html.twig', array(
            'form' => $form->createView(), 'files' => $files
        ));
       
       
    }

     

     
 

   
}
