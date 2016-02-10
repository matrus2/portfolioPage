<?php
namespace Mtu\PortfolioBundle\EventListener;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;


class MtuExceptionListener{
    
    /**
     * @var Router
     */
    protected $router;
    
    function __construct(Router $router) {
        $this->router = $router;
    }
    
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($event->getException() instanceof NotFoundHttpException) {
            $url = $this->router->generate('mtu_portfolio_index');
            $response = new RedirectResponse($url);
            $event->setResponse($response);
        }
    }
}