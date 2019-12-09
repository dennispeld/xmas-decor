<?php

namespace App\Controller;

use App\Helper\ShapeDrawer;
use App\Helper\ShapeBuilder;
use App\Shapes\ShapeSettings;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class XmasController extends AbstractController
{
    /**
     * @Route("/xmas/{name}/{size}", defaults={"size" = 0}, name="xmas_shape")
     * @param string $name
     * @param string|null $size
     * @return Response
     * @throws Exception
     */
    public function getXmasShape($name, $size): Response
    {
        $drawing = '';
        $error = '';

        $shape = ShapeBuilder::initShape($name, $size);

        if (!$shape) {
            $error = "The shape '$name' doesn't exist";
        } else {
            $drawing = implode("\r\n", ShapeDrawer::draw($shape));
            $drawing = str_replace(' ', '&ensp;&nbsp;', $drawing);
        }

        if (!$size || !in_array($size, ShapeSettings::AVAILABLE_SIZES, false)) {
            $size = 'randomly selected';
        }

        if (empty($drawing)) {
            $error = "The shape '$name' doesn't have the pattern for the selected size.";
        }

        return $this->render('xmas/shape.html.twig', [
            'shape' => $name,
            'size' => $size,
            'drawing' => $drawing,
            'error' => $error,
        ]);
    }
}