<?php
function check_getDefaultTeamCode()
{
  if(function_exists('getDefaultTeamCode')) {
      return getDefaultTeamCode();
  }else{
      return config('hive-community.defaultTeamCode');
  }
}

function check_getDefaultCommunityCode()
{
  if(function_exists('getDefaultCommunityCode')) {
      return getDefaultCommunityCode();
  }else{
      return config('hive-community.defaultCommunityCode');
  }
}

function check_getMainTeamReference()
{
  if(function_exists('getMainTeamReference')) {
      return getMainTeamReference();
  }else{
      return config('hive-community.mainTeamReference');
  }
}

function check_getMainCommunityReference()
{
  if(function_exists('getMainCommunityReference')) {
      return getMainCommunityReference();
  }else{
      return config('hive-community.mainCommunityReference');
  }
}

function check_getDefaultTeamReference()
{
  if(function_exists('getDefaultTeamReference')) {
      return getDefaultTeamReference();
  }else{
      return config('hive-community.defaultTeamReference');
  }
}

function check_getDefaultCommunityReference()
{
  if(function_exists('getDefaultCommunityReference')) {
      return getDefaultCommunityReference();
  }else{
      return config('hive-community.defaultCommunityReference');
  }
}
