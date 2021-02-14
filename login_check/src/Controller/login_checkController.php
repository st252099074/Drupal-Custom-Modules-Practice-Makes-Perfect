<?php

namespace Drupal\login_check\Controller;

   use Drupal\Core\Controller\ControllerBase;
   use Drupal\Core\Logger\LoggerChannelFactoryInterface;
   use Drupal\user\Access\LoginStatusCheck;
   use Drupal\user\UserData;
   use Symfony\Component\DependencyInjection\ContainerInterface;


   Class login_checkController extends ControllerBase

   {

     private $hello = 'Hello ABBA';
     public $loggerFactoryService;
     public $accessCheckResult;
     public $convertedResult;
     public $userInfo;

    public static function create(ContainerInterface $container)
    {
      $loggerFactory = $container->get('logger.factory');

      $accessCheck = $container->get('access_check.user.login_status');

      $userData = $container->get('user.data');

      return new static($loggerFactory, $accessCheck, $userData);

   }

    public function __construct(LoggerChannelFactoryInterface $loggerFactory, LoginStatusCheck $accessCheck, UserData $userData)
   {
      $this->loggerFactoryService = $loggerFactory;

      $this->accessCheckResult = $accessCheck;

      $this->userInfo = $userData;
     }



     public function helloWorld()
     {

       $convertedResult = $this->accessCheckResult ? 'true' : 'false' ;

       $hello = $this->hello;

       $this->loggerFactoryService->get('default')
         ->debug($convertedResult);

      return [
        '#title' => $hello
       ];

     }
   }




