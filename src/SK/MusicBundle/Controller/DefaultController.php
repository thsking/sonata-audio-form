<?php

namespace SK\MusicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SK\MusicBundle\Form\SongType;
use SK\MusicBundle\Form\AudioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $req)
    {

        $em = $this->getDoctrine()->getManager();

        // $songs = $em->getRepository('SKMusicBundle:Audio');

        $songsForm = $this->createForm(SongType::class);

        if($req->isMethod('POST'))
        {
            
            $songCreated = $songsForm->handleRequest($req);
            $songCreated = $songCreated->getData();


            $audios = $songCreated->getAudios();

            if($songsForm->isValid())
            {

                $em->persist($songCreated);

                foreach($audios as $key => $value){
                    $audios[$key]->setSong($songCreated);
                    $em->persist($audios[$key]);
                }

                $em->flush();

                echo 'Elemnt created';


            }

        }

        return $this->render('SKMusicBundle:Default:index.html.twig', array(
            'audioForm' => $songsForm->createView()
        ));

    }
    /*public function indexAction(Request $req)
    {
    		$em = $this->getDoctrine()->getManager();
    		
    		$audio = $em->getRepository('SKMusicBundle:Audio');

    		$audios = $audio->findAll();

    		// var_dump($audios);

    		$audioForm = $this->createForm(AudioType::class);

				if($req->isMethod('POST'))
				{
					$audioCreated = $audioForm->handleRequest($req);
					$audioCreated = $audioForm->getData();
                    var_dump($audioCreated);

					if($audioForm->isValid())
					{
						$em->persist($audioCreated);
						$em->flush();
						return new Response('Audio Created');
					}
				}

        return $this->render('SKMusicBundle:Default:index.html.twig', array(
        	'audioForm' => $audioForm->createView(),
        	'audios' => $audios
        ));
    }*/
}

