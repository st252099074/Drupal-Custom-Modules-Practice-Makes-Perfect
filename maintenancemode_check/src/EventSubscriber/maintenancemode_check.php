<?php

namespace Drupal\maintenancemode_check\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\Messenger\MessengerTrait;
use Symfony\Component\HttpKernel\KernelEvents;


class maintenancemode_check implements EventSubscriberInterface
{
  use StringTranslationTrait;
  use MessengerTrait;

  public function applies(RouteMatchInterface $route_match){

  }

  public function exempt(AccountInterface $account){

  }



  public static function getSubscribedEvents()
  {
    return [
      KernelEvents::REQUEST => 'checkModeStatus',
    ];
  }


  public function checkModeStatus()
  {

    \Drupal::logger('maintenancemode_check')->notice(\Drupal::state()->get('system.maintenance_mode'));
    \Drupal::state();

  }
}


