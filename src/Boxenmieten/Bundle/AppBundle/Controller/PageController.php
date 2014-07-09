<?php

namespace PaLogic\Bundle\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PaLogic\Bundle\AppBundle\Entity\Question;
use PaLogic\Bundle\AppBundle\Form\QuestionType;

class PageController extends Controller
{
    /**
    * @Template
    */
    public function indexAction()
    {
        return array();
    }
    
    /**
    * @Template
    */
    public function aboutAction()
    {
        return array();
    }
    
    /**
    * @Template
    */
    public function meAction()
    {
        return array();
    }
    
    /**
    * @Template
    */
    public function infoAction()
    {
        return array();
    }
    
    /**
    * @Template
    */
    public function offersAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $sets = $em->getRepository('PaLogic\BundleAppBundle:Set')->findAll();
        
        return array('sets' => $sets);
    }
    
    /**
    * @Template
    */
    public function contactAction()
    {
        $question = new Question();
        $form = $this->createForm(new QuestionType(), $question);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {

                $message = \Swift_Message::newInstance()
                    ->setSubject('Frage von: ' . $question->getName())
                    ->setFrom('info@PaLogic\Bundle.ch')
                    ->setTo($this->container->getParameter('PaLogic\Bundle_app.emails.contact_email'))
                    ->setBody($this->renderView('PaLogic\BundleAppBundle:Page:contactEmail.txt.twig', array('question' => $question)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashBag()->set('question-notice', 'Deine Anfrage wurde entgegengenommen. Wir nehmen so schnell wie möglich mit dir Kontakt auf!');

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('PaLogic\Bundle_app_contact') . "#frageGestellt");
            }
        }

        return array('form' => $form->createView());
    }
}