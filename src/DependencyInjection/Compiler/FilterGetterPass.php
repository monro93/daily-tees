<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 22/10/18
 * Time: 20:58
 */

namespace App\DependencyInjection\Compiler;


use App\Service\Filter\FilterGetter\FilterGetterFactory;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class FilterGetterPass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has(FilterGetterFactory::class)) {
            return;
        }

        $definition = $container->getDefinition(FilterGetterFactory::class);

        $taggedServices = $container->findTaggedServiceIds('app.filter_getter');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addFilterGetter', [new Reference($id)]);
        }
    }
}