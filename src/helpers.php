<?php
function check_hasDefaultTeamCode()
{
  if(function_exists('getDefaultTeamCode')) {
      return getDefaultTeamCode();
  }else{
      config('hive-community.defaultTeamCode');
  }
}

function check_getMainTeamReference()
{
  if(function_exists('getMainTeamReference')) {
      return getMainTeamReference();
  }else{
      config('hive-community.mainTeamReference');
  }
}

function check_getDefaultTeamReference()
{
  if(function_exists('getDefaultTeamReference')) {
      return getDefaultTeamReference();
  }else{
      config('hive-community.defaultTeamReference');
  }
}
