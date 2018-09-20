<?php

namespace PaulPlentyBadges\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Template_Manager;

class TemplateRegistration implements SubscriberInterface
{
    /**
     * @var Enlight_Template_Manager
     */
    private $templateManager;

    /**
     * @var string
     */
    private $pluginBaseDirectory;

    /**
     * @param Enlight_Template_Manager $templateManager
     * @param string $pluginBaseDirectory
     */
    public function __construct(Enlight_Template_Manager $templateManager, $pluginBaseDirectory)
    {
        $this->templateManager = $templateManager;
        $this->pluginBaseDirectory = $pluginBaseDirectory;
    }

    /**
     * Use the early "Enlight_Controller_Action_PreDispatch" event to register the template directory of the plugin.
     *
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'onPreDispatch'
        ];
    }

    public function onPreDispatch()
    {
        $this->templateManager->addTemplateDir($this->pluginBaseDirectory . '/Resources/views');
    }
}