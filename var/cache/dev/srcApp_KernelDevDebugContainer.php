<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWYg23Wk\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWYg23Wk/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerWYg23Wk.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerWYg23Wk\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerWYg23Wk\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'WYg23Wk',
    'container.build_id' => '14577bf5',
    'container.build_time' => 1604582315,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWYg23Wk');
