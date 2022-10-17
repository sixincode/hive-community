<?php

namespace Sixincode\HiveCommunity\Traits;

use Sixincode\HiveHelpers\Traits\FieldsTrait;

trait CollectsUsers
{
      use FieldsTrait;

      public function allUsersArrayRaw()
      {
          $collectedUsers =  explode(self::firstLevelExploder(), $this->users );
          return $collectedUsers;
          // $collectedUsers = [
          //   'render:::myUrl&:&class:::myclass&:&color:::red',
          //   'render:::mySalon&:&class:::myNewwestclass&:&color:::black',
          //   'render:::myShop&:&class:::myOtherclass&:&color:::green',
          // ]
      }

      public function countUsers()
      {
          return count($this->allUsersArrayRaw());
      }

      public function addUser(array $pairValue,$category = 'main', $key=0)
      {
        // if($key > count($this->countAllUsers() + 1) || $key < 0)
        // {
        //   $key = ($this->countAllUsers() + 1);
        // }
        $userArray = [];
        $foreach ($pairValue as $key => $pair) {
          $userArray[] =  $pair_value[0].(self::thirdLevelExploder()).$pair_value[1];
        }
        $userData = implode($userArray);
        $this->users = $this->users.(self::firstLevelExploder()).$userData;
        return $this->userData;
      }

      public function sanitizeSingleUser($userToDisplayRaw)
      {
        // $userToDisplayRaw = [
        //   'render:::myUrl&:&class:::myclass&:&color:::red',
        // ]

        //get one array of raw elements for one user
        $userToDisplayRawPairsvalue = explode(self::secondLevelExploder(), $userToDisplayRaw);
        // [
        //   'render:::myUrl',
        //   'class:::myclass',
        //   'color:::red',
        // ]

        // init single user in empty array form
        $singleUserFinalArray = [];
       // each existing keyValue from user operation
        foreach ($userToDisplayRawPairsvalue as $indexOfElement => $singlePair) {
          $userToDisplayCleanPairsvalue = explode(self::thirdLevelExploder(), $singlePair);
            // [
            //   'render => myUrl',
            // ]
          $singleUserFinalArray[$userToDisplayCleanPairsvalue[0]] = $userToDisplayCleanPairsvalue[1];
            // [
            //   'render' => 'myUrl',
            //   'class' => 'myclass',
            //   'color' => 'red',
            // ]
        }
         return $singleUserFinalArray;
      }

      public function displaySingleUser(int $key = 0)
      {
          //get one array containing all user raw
          $allUsersArrayRaw =  $this->allUsersArrayRaw();
          // $allUsersArrayRaw = [
          //   'render:::myUrl&:&class:::myclass&:&color:::red&&&render:::mySalon&:&class:::myNewwestclass&:&color:::black&&&render:::myShop&:&class:::myOtherclass&:&color:::green',
          // ]

          // if the key of user is > to number of users or key < 0,  set key as first user
          if($key > $this->countAllUsers() || $key < 0)
          {
            return $key = 0;
          }
          //retrive raw user to display from key provided
          $userToDisplayRaw = $allUsersArrayRaw[$key];
          // [
          //   'render:::myUrl&:&class:::myclass&:&color:::red',
          // ]
          $user = $this->sanitizeSingleUser($userToDisplayRaw);
          return $user;
      }

      public function displayAllUsers()
      {
        //get one array containing all user raw
        $allUsersArrayRaw[] =  $this->allUsersArrayRaw();
        // [
        //   'render:::myUrl&:&class:::myclass&:&color:::red',
        //   'render:::mySalon&:&class:::myNewwestclass&:&color:::black',
        //   'render:::myShop&:&class:::myOtherclass&:&color:::green',
        // ]

        // init all users in empty array form
        $allUsersFinalArray = [];

        // each existing user operation
        foreach($allUsersArrayRaw as $key => $singleUserRaw){
            $user = $this->sanitizeSingleUser($singleUserRaw);
            $allUsersFinalArray[[self::sortOrderFieldName()]] =  $user;
        }

        return $allUsersFinalArray;
      }

}
