<?php
namespace PaulPlentyBadges\Subscriber;
use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CollectConfig implements SubscriberInterface
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
            'Enlight_Controller_Action_PreDispatch_Widgets' => 'onPostDispatch',
            'Enlight_Controller_Action_PreDispatch_Frontend' => 'onPostDispatch'
        ];
    }
    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onPostDispatch(\Enlight_Event_EventArgs $args)
    {

        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->get('subject');
        $view = $controller->View();
        $view->addTemplateDir($this->pluginDirectory . '/Resources/views');

        $config = $this->container->get('shopware.plugin.config_reader')->getByPluginName('PaulPlentyBadges', $shop);

        $view->assign('paulPlentyFreeActive', $config['paulPlentyFreeActive']);
        $view->assign('paulPlentyFreeNr', $config['paulPlentyFreeNr']);
        $view->assign('PaulPlentyBadgesRibonActive', $config['PaulPlentyBadgesRibonActive']);
        $view->assign('PaulPlentyBadgesRibonPosition', $config['PaulPlentyBadgesRibonPosition']);
        $view->assign('PaulPlentyBadgesRibonColor', $config['PaulPlentyBadgesRibonColor']);
        $view->assign('PaulPlentyBadgesRibonTextColor', $config['PaulPlentyBadgesRibonTextColor']);
        $view->assign('PaulPlentyBadgesListingBackground', $config['PaulPlentyBadgesListingBackground']);
        $view->assign('PaulPlentyBadgesListingText', $config['PaulPlentyBadgesListingText']);
    }
}