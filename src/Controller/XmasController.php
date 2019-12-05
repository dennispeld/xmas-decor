<?php

namespace App\Controller;

use App\Helper\DrawHelper;
use App\Helper\ShapeHelper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class XmasController extends AbstractController
{
    /**
     * @Route("/xmas/{shapeName}/{shapeSize}", defaults={"shapeSize" = 0}, name="xmas_shape")
     * @param $shapeName
     * @param $shapeSize
     * @return Response
     * @throws Exception
     */
    public function getXmasShape($shapeName, $shapeSize): Response
    {
        $shape = ShapeHelper::getShape($shapeName);
        $sizes = array_keys(ShapeHelper::SIZE);
        $shapeSize = strtoupper($shapeSize);

        if (!$shape) {
            $drawing = "The shape '$shapeName' doesn't exist";
        } else {
            $drawing = implode("\r\n", DrawHelper::draw($shape, $shapeSize));
            $drawing = str_replace(' ', '&ensp;&nbsp;', $drawing);
        }

        if (!$shapeSize || !in_array($shapeSize, $sizes, true)) {
            $shapeSize = 'randomly selected';
        }

        return $this->render('xmas/shape.html.twig', [
            'shapeName' => $shapeName,
            'shapeSize' => $shapeSize,
            'shape' => $drawing,
        ]);
    }
}