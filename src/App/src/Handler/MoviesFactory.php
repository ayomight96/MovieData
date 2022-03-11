<?php

declare(strict_types=1);

namespace App\Handler;

use Mezzio\Template\TemplateRendererInterface;
use Psr\Container\ContainerInterface;

class MoviesFactory
{
    /**
     * @param ContainerInterface $container
     * @return Movies
     */
    public function __invoke(ContainerInterface $container): Movies
    {
        $movieData = $container->has('MovieData')
            ? $container->get('MovieData')
            : null;
        return new Movies($movieData);
    }
}
