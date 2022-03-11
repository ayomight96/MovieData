<?php

declare(strict_types=1);

namespace App\Handler;

use App\BasicRenderer\BasicRenderer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Laminas\Diactoros\Response\HtmlResponse;
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

    /**
     * Movies constructor.
     *
     * @param array|\Traversable $movieData
     */
    public function __construct($movieData)
    {
        $this->movieData = $movieData;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $renderer = (new BasicRenderer())(
            $this->movieData
            );
        return new HtmlResponse($renderer);
    }
}
