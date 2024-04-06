<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cliente;
use App\Form\ClienteType;

class ClienteController extends AbstractController
{
    private $entityManager;

    // Inyecta el EntityManager en el constructor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/cliente', name: 'cliente')]
    public function index(Request $request ): Response
    {
        $cliente = new Cliente();
        $form = $this->createForm(ClienteType::class, $cliente);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($cliente);
            $this->entityManager->flush();
            $this->addFlash('exito', 'Cliente registrado con éxito');
            return $this->redirectToRoute('login');
        }

        return $this->render('cliente/index.html.twig', [
            'controller_name' => 'Hola Mundo',
            'form' => $form->createView(),
        ]);
    }
}