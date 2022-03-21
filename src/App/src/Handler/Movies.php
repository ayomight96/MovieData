<?php

declare(strict_types=1);

namespace App\Handler;

use App\BasicRenderer\BasicRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
;

/**
 * Class Movies
 * @package App\Handler
 */

class Movies implements RequestHandlerInterface
{
    /**
     * @var array|\Traversable
     */
    private $movieData;

    /**@var RouterInterface */
    private $router;

    /**@var TemplateRendererInterface */
    private $template;

    /**
     * Movies constructor.
     * @param $movieData
     * @param RouterInterface $router
     * @param TemplateRendererInterface $template
     */
    public function __construct(
        $movieData,
        RouterInterface $router,
        TemplateRendererInterface $template
        )
    {
        $this->movieData = $movieData;
        $this->router = $router;
        $this->template = $template;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $data = [
            'movies' => $this->movieData
        ];

        $html = $this->template->render(
            'app::movies',
            $data
        );
  
        return new HtmlResponse($html);
    }
}
