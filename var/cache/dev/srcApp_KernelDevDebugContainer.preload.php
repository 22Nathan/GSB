<?php

// This file has been auto-generated by the Symfony Dependency Injection Component
// You can reference it in the "opcache.preload" php.ini setting on PHP >= 7.4 when preloading is desired

use Symfony\Component\DependencyInjection\Dumper\Preloader;

if (in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
    return;
}

require dirname(__DIR__, 3).'/vendor/autoload.php';
require __DIR__.'/ContainerWYg23Wk/srcApp_KernelDevDebugContainer.php';

$classes = [];
$classes[] = 'Symfony\Bundle\FrameworkBundle\FrameworkBundle';
$classes[] = 'Symfony\Bundle\MakerBundle\MakerBundle';
$classes[] = 'Symfony\Bundle\TwigBundle\TwigBundle';
$classes[] = 'Twig\Extra\TwigExtraBundle\TwigExtraBundle';
$classes[] = 'Symfony\Bundle\WebServerBundle\WebServerBundle';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser';
$classes[] = 'Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber';
$classes[] = 'Symfony\Component\DependencyInjection\ServiceLocator';
$classes[] = 'App\Controller\AccueilController';
$classes[] = 'App\Controller\ComptableController';
$classes[] = 'App\Controller\VisiteurController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\RedirectController';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\TemplateController';
$classes[] = 'Symfony\Component\Cache\DoctrineProvider';
$classes[] = 'Symfony\Component\Cache\Adapter\PhpArrayAdapter';
$classes[] = 'Symfony\Bundle\FrameworkBundle\CacheWarmer\AnnotationsCacheWarmer';
$classes[] = 'Doctrine\Common\Annotations\AnnotationReader';
$classes[] = 'Doctrine\Common\Annotations\AnnotationRegistry';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\DefaultValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestAttributeValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\SessionValueResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver\VariadicValueResolver';
$classes[] = 'Symfony\Component\Cache\Adapter\AdapterInterface';
$classes[] = 'Symfony\Component\Cache\Adapter\AbstractAdapter';
$classes[] = 'Symfony\Component\Cache\Adapter\FilesystemAdapter';
$classes[] = 'Symfony\Component\Cache\Marshaller\DefaultMarshaller';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\Psr6CacheClearer';
$classes[] = 'Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer';
$classes[] = 'Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate';
$classes[] = 'Symfony\Component\Config\Resource\SelfCheckingResourceChecker';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\AboutCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\AssetsInstallCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CacheClearCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CachePoolClearCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CachePoolDeleteCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CachePoolListCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CachePoolPruneCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\CacheWarmupCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\ConfigDebugCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\ConfigDumpReferenceCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\ContainerDebugCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\ContainerLintCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\DebugAutowiringCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\EventDispatcherDebugCommand';
$classes[] = 'Symfony\Component\Form\Command\DebugCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\RouterDebugCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\RouterMatchCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsDecryptToLocalCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsEncryptFromLocalCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsGenerateKeysCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsListCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsRemoveCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\SecretsSetCommand';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Command\YamlLintCommand';
$classes[] = 'Symfony\Component\Console\CommandLoader\ContainerCommandLoader';
$classes[] = 'Symfony\Component\Console\EventListener\ErrorListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber';
$classes[] = 'Symfony\Component\DependencyInjection\EnvVarProcessor';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DebugHandlersListener';
$classes[] = 'Symfony\Component\HttpKernel\Debug\FileLinkFormatter';
$classes[] = 'Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ErrorController';
$classes[] = 'Symfony\Bridge\Twig\ErrorRenderer\TwigErrorRenderer';
$classes[] = 'Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer';
$classes[] = 'Symfony\Component\EventDispatcher\EventDispatcher';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ErrorListener';
$classes[] = 'Symfony\Component\Filesystem\Filesystem';
$classes[] = 'Symfony\Component\Form\ChoiceList\Factory\CachingFactoryDecorator';
$classes[] = 'Symfony\Component\Form\ChoiceList\Factory\PropertyAccessDecorator';
$classes[] = 'Symfony\Component\Form\ChoiceList\Factory\DefaultChoiceListFactory';
$classes[] = 'Symfony\Component\Form\FormFactory';
$classes[] = 'Symfony\Component\Form\FormRegistry';
$classes[] = 'Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension';
$classes[] = 'Symfony\Component\Form\ResolvedFormTypeFactory';
$classes[] = 'Symfony\Component\Form\Extension\Core\Type\ChoiceType';
$classes[] = 'Symfony\Component\Form\Extension\Core\Type\FileType';
$classes[] = 'Symfony\Component\Form\Extension\Core\Type\FormType';
$classes[] = 'Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension';
$classes[] = 'Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler';
$classes[] = 'Symfony\Component\Form\Util\ServerParams';
$classes[] = 'Symfony\Component\Form\Extension\Core\Type\TransformationFailureExtension';
$classes[] = 'Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension';
$classes[] = 'Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension';
$classes[] = 'Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer';
$classes[] = 'Symfony\Component\HttpKernel\HttpKernel';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver';
$classes[] = 'Symfony\Component\HttpKernel\Controller\ArgumentResolver';
$classes[] = 'Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory';
$classes[] = 'App\Kernel';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\LocaleListener';
$classes[] = 'Symfony\Component\HttpKernel\Log\Logger';
$classes[] = 'Symfony\Bundle\MakerBundle\Command\MakerCommand';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeAuthenticator';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeCommand';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeController';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeCrud';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeDockerDatabase';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeEntity';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeFixtures';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeForm';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeFunctionalTest';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeMessage';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeMessengerMiddleware';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeMigration';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeRegistrationForm';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeResetPassword';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeSerializerEncoder';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeSerializerNormalizer';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeSubscriber';
$classes[] = 'Symfony\Bundle\MakerBundle\EventRegistry';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeTwigExtension';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeUnitTest';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeUser';
$classes[] = 'Symfony\Bundle\MakerBundle\Security\UserClassBuilder';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeValidator';
$classes[] = 'Symfony\Bundle\MakerBundle\Maker\MakeVoter';
$classes[] = 'Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber';
$classes[] = 'Symfony\Bundle\MakerBundle\Doctrine\DoctrineHelper';
$classes[] = 'Symfony\Bundle\MakerBundle\Doctrine\EntityClassGenerator';
$classes[] = 'Symfony\Bundle\MakerBundle\FileManager';
$classes[] = 'Symfony\Bundle\MakerBundle\Util\AutoloaderUtil';
$classes[] = 'Symfony\Bundle\MakerBundle\Util\ComposerAutoloaderFinder';
$classes[] = 'Symfony\Bundle\MakerBundle\Util\MakerFileLinkFormatter';
$classes[] = 'Symfony\Bundle\MakerBundle\Generator';
$classes[] = 'Symfony\Bundle\MakerBundle\Renderer\FormTypeRenderer';
$classes[] = 'Symfony\Bundle\MakerBundle\Security\SecurityConfigUpdater';
$classes[] = 'Symfony\Component\DependencyInjection\ParameterBag\ContainerBag';
$classes[] = 'Symfony\Component\PropertyAccess\PropertyAccessor';
$classes[] = 'Symfony\Component\Cache\Adapter\ArrayAdapter';
$classes[] = 'Symfony\Component\HttpFoundation\RequestStack';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ResponseListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\Router';
$classes[] = 'Symfony\Component\Config\ResourceCheckerConfigCacheFactory';
$classes[] = 'Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer';
$classes[] = 'Symfony\Component\Routing\RequestContext';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\RouterListener';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader';
$classes[] = 'Symfony\Component\Config\Loader\LoaderResolver';
$classes[] = 'Symfony\Component\Routing\Loader\XmlFileLoader';
$classes[] = 'Symfony\Component\HttpKernel\Config\FileLocator';
$classes[] = 'Symfony\Component\Routing\Loader\YamlFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\PhpFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\GlobFileLoader';
$classes[] = 'Symfony\Component\Routing\Loader\DirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\ContainerLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\LegacyRouteLoaderContainer';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader';
$classes[] = 'Doctrine\Common\Annotations\CachedReader';
$classes[] = 'Doctrine\Common\Cache\ArrayCache';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationDirectoryLoader';
$classes[] = 'Symfony\Component\Routing\Loader\AnnotationFileLoader';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\DotenvVault';
$classes[] = 'Symfony\Bundle\FrameworkBundle\Secrets\SodiumVault';
$classes[] = 'Symfony\Component\DependencyInjection\ContainerInterface';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Session';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage';
$classes[] = 'Symfony\Component\HttpFoundation\Session\Storage\MetadataBag';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\SessionListener';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\StreamedResponseListener';
$classes[] = 'Twig\Environment';
$classes[] = 'Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader';
$classes[] = 'Symfony\Bridge\Twig\Extension\ProfilerExtension';
$classes[] = 'Twig\Profiler\Profile';
$classes[] = 'Symfony\Bridge\Twig\Extension\TranslationExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\AssetExtension';
$classes[] = 'Symfony\Component\Asset\Packages';
$classes[] = 'Symfony\Component\Asset\PathPackage';
$classes[] = 'Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy';
$classes[] = 'Symfony\Component\Asset\Context\RequestStackContext';
$classes[] = 'Symfony\Bridge\Twig\Extension\CodeExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\RoutingExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\YamlExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelExtension';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpFoundationExtension';
$classes[] = 'Symfony\Component\HttpFoundation\UrlHelper';
$classes[] = 'Symfony\Bridge\Twig\Extension\FormExtension';
$classes[] = 'Twig\Extension\DebugExtension';
$classes[] = 'Symfony\Bridge\Twig\AppVariable';
$classes[] = 'Twig\RuntimeLoader\ContainerRuntimeLoader';
$classes[] = 'Twig\Extra\TwigExtraBundle\MissingExtensionSuggestor';
$classes[] = 'Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator';
$classes[] = 'Symfony\Bridge\Twig\Command\DebugCommand';
$classes[] = 'Symfony\Bundle\TwigBundle\Command\LintCommand';
$classes[] = 'Symfony\Component\Form\FormRenderer';
$classes[] = 'Symfony\Bridge\Twig\Form\TwigRendererEngine';
$classes[] = 'Symfony\Bridge\Twig\Extension\HttpKernelRuntime';
$classes[] = 'Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler';
$classes[] = 'Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheWarmer';
$classes[] = 'Symfony\Bundle\TwigBundle\TemplateIterator';
$classes[] = 'Symfony\Component\HttpKernel\EventListener\ValidateRequestListener';
$classes[] = 'Symfony\Bundle\WebServerBundle\Command\ServerRunCommand';
$classes[] = 'Symfony\Bundle\WebServerBundle\Command\ServerStartCommand';
$classes[] = 'Symfony\Bundle\WebServerBundle\Command\ServerStatusCommand';
$classes[] = 'Symfony\Bundle\WebServerBundle\Command\ServerStopCommand';

Preloader::preload($classes);
