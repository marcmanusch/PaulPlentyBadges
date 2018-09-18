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
            'Theme_Inheritance_Template_Directories_Collected' => 'onCollectTemplateDir',
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onCollectTemplateDir(\Enlight_Event_EventArgs $args)
    {


        /** @var $controller \Enlight_Controller_Action */
        /*$controller = $args->getSubject();
        $view = $controller->View();
        $view->addTemplateDir($this->container->getParameter('paul_plenty_badges.plugin_dir') . '/Resources/views');*/

        $dirs = $args->getReturn();
        $dirs[] = $this->pluginDir . '/views';

        $args->setReturn($dirs);

        /*$config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulPlentyBadges', $shop);

        // get plugin settings
        $paulPlentyFreeActive = $config['paulPlentyFreeActive'];
        $paulPlentyFreeNr = $config['paulPlentyFreeNr'];

        // aggign to frontend
        $view->assign('paulPlentyFreeActive', $paulPlentyFreeActive);
        $view->assign('paulPlentyFreeNr', $paulPlentyFreeNr);*/

    }
}
