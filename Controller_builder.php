<?php

class Controller_builder
{
  private $_config;

  public function __construct ()
  {
    $this->_config = json_decode(file_get_contents('configuration.json'), TRUE);
  }

  public function build ()
  {
    //generate files and put it into release folder
    //Copy initialize files into release folder
    //TODO
  }
}
