<?php

namespace PaulPlentyBadges\Subscriber;

use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Frontend implements SubscriberInterface
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
    public static function getSubscribedEvents(): array
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onFrontendPostDispatch',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onFrontendPostDispatch(\Enlight_Event_EventArgs $args)
    {
        
        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulPlentyBadges', $shop);
        
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_plent_badges.plugin_dir') . '/Resources/views');
        
        // get plugin settings
        $paulPlentyFreeActive = $config['paulPlentyFreeActive'];
        $paulPlentyFreeNr = $config['paulPlentyFreeNr'];
	    $paulPlentyFreeText = $config['paulPlentyFreeText'];
	    
        // aggign to frontend
        $view->assign('paulPlentyFreeActive', $paulPlentyFreeActive);
        $view->assign('paulPlentyFreeNr', $paulPlentyFreeNr);
	    $view->assign('paulPlentyFreeText', $paulPlentyFreeText);

    }
}
