<?php

namespace Drupal\user_info\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;



class user_info_controller extends ControllerBase {

  protected $current_user;


   public function __construct(AccountProxy $current_user)

  {
     $this->current_user = $current_user;
  }




  public static function create(ContainerInterface $container)
  {

    $current_user = $container->get('current_user');

    return new static($current_user);
  }



   public function whoami ()
   {
     return [
       '#title' => $this->current_user->getDisplayName()
     ];
   }


}
