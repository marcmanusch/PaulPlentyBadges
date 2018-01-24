<?php

namespace PaulPlentyBadges;

use Shopware\Components\Plugin\Context\InstallContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Components\Plugin;

class PaulPlentyBadges extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('paul_plenty_badges.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
?>
