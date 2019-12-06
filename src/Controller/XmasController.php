<?php

namespace App\Controller;

use App\Helper\ShapeDrawer;
use App\Helper\ShapeBuilder;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class XmasController extends AbstractController
{
    /**
     * @Route("/xmas/{shape}/{size}", defaults={"size" = 0}, name="xmas_shape")
     * @param $shape
     * @param $size
     * @return Response
     * @throws Exception
     */
    public function getXmasShape($shape, $size): Response
    {
        $pattern = ShapeBuilder::initShapePattern($shape);
        $size = strtoupper($size);
        $sizes = array_keys(ShapeBuilder::SIZE);

        if (!$pattern) {
            $drawing = "The shape '$shape' doesn't exist";
        } else {
            $drawing = implode("\r\n", ShapeDrawer::draw($pattern, $size));
            $drawing = str_replace(' ', '&ensp;&nbsp;', $drawing);
        }

        if (!$size || !in_array($size, $sizes, true)) {
            $size = 'randomly selected';
        }

        return $this->render('xmas/shape.html.twig', [
            'shape' => $shape,
            'size' => $size,
            'drawing' => $drawing,
        ]);
    }
}