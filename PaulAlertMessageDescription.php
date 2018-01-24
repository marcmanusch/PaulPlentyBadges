<?php

namespace PaulAlertMessageDescription;

use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Components\Plugin;

class PaulAlertMessageDescription extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_alert_message_description.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
?>
