<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            //General
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new Csa\Bundle\GuzzleBundle\CsaGuzzleBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new MadrakIO\Bundle\EasyAdminBundle\MadrakIOEasyAdminBundle(),

            //Authentication
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),

            //UI
            new MadrakIO\StreamPerk\Bundle\ThemeBundle\StreamPerkThemeBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new Liip\ThemeBundle\LiipThemeBundle(),
            new Knp\Bundle\TimeBundle\KnpTimeBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new FM\BbcodeBundle\FMBbcodeBundle(),
            new Ras\Bundle\FlashAlertBundle\RasFlashAlertBundle(),

            //Monitoring
            new Liip\MonitorBundle\LiipMonitorBundle(),

            //MadrakIO
            new MadrakIO\ExtendableConfigurationBundle\MadrakIOExtendableConfigurationBundle(),
            new MadrakIO\ExtendablePermissionsBundle\MadrakIOExtendablePermissionsBundle(),

            //StreamPerk
            new MadrakIO\StreamPerk\Bundle\CoreBundle\StreamPerkCoreBundle(),
            new MadrakIO\StreamPerk\Bundle\PageBundle\StreamPerkPageBundle(),
            new MadrakIO\StreamPerk\Bundle\UserBundle\StreamPerkUserBundle(),
            new MadrakIO\StreamPerk\Bundle\ServerBundle\StreamPerkServerBundle(),
            new MadrakIO\StreamPerk\Bundle\LandingBundle\StreamPerkLandingBundle(),
            new MadrakIO\StreamPerk\Bundle\PollBundle\StreamPerkPollBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'), true)) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Hautelook\AliceBundle\HautelookAliceBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
