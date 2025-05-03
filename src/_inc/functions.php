<?php
function make_file($filename)
{
  if (is_file($filename)) {
    return false;
  }
  fclose(fopen($filename, 'x'));
  return true;
}