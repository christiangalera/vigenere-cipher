<?php

function vigenere_encrypt($text, $key) {
  $keyLength = strlen($key);
  $text = strtoupper($text);
  $key = strtoupper($key);
  $cipherText = '';

  for($i = 0; $i < strlen($text); $i++) {
    $char = $text[$i];
    if(ctype_alpha($char)) {
      $offset = ord($key[$i % $keyLength]) - 65;
      $cipherText .= chr(((ord($char) - 65 + $offset) % 26) + 65);
    } else {
      $cipherText .= $char;
    }
  }
  return $cipherText;
}

echo vigenere_encrypt('hello world', 'php');

