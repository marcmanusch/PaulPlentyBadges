<?php

namespace PaulPlentyBadges\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class TemplateRegistration implements SubscriberInterface
{
    /** @var  ContainerInterface */
    private $container;

    /**
     * Frontend contructor.
     * @param ContainerInterface $container
     **/
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Widgets' => 'registerFrontend',
            'Enlight_Controller_Action_PreDispatch_Frontend' => 'registerFrontend',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function registerFrontend(\Enlight_Event_EventArgs $args)
    {
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_plenty_badges.plugin_dir') . '/Resources/views');
    }
}