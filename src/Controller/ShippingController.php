<?php

namespace App\Controller;

use App\DTO\ShippingDTO;
use App\Form\ShippingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShippingController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        $shippingDTO = new ShippingDTO();
        $form = $this->createForm(ShippingType::class, $shippingDTO);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // There should be  a valid AddressDTO
            dd($form->getData());
        }

        return $this->render('shipping/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
