<?php

namespace Palmtree\CanonicalUrlBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        $bundleConfig = $container->getParameter('palmtree_canonical_url.config');

        $definition = $container->getDefinition('palmtree_canonical_url.url_generator');
        $definition->addArgument($bundleConfig);

        $definition = $container->getDefinition('palmtree_canonical_url.request_listener');
        $definition->addArgument($bundleConfig);

        $definition = $container->getDefinition('palmtree_canonical_url.exception_listener');
        $definition->addArgument($bundleConfig);
    }
}
