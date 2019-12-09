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
        if (!in_array($size, ShapeSettings::AVAILABLE_SIZES, false)) {
            $availableSizes = implode(', ', ShapeSettings::AVAILABLE_SIZES);
            $error = "The size '$size' is not allowed. Available sizes: $availableSizes.";

            return $this->render('xmas/error.html.twig', [
                'error' => $error,
            ]);
        }

        $shape = ShapeBuilder::initShape($name, $size);

        if (!$shape) {
            $error = "The shape '$name' doesn't exist";

            return $this->render('xmas/error.html.twig', [
                'error' => $error,
            ]);
        }

        $size = $size ?: 'randomly selected';
        $drawing = implode("\r\n", ShapeDrawer::draw($shape));
        $drawing = str_replace(' ', '&ensp;&nbsp;', $drawing);
        $message = !empty($drawing) ? '' : "The shape '$name' doesn't have the pattern for this size.";

        return $this->render('xmas/shape.html.twig', [
            'shape' => $name,
            'size' => $size,
            'drawing' => $drawing,
            'message' => $message,
        ]);
    }
}