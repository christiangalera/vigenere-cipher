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

function vigenere_decrypt($cipherText, $key) {
  $keyLength = strlen($key);
  $cipherText = strtoupper($cipherText);
  $key = strtoupper($key);
  $text = '';

  for ($i = 0; $i < strlen($cipherText); $i++) {
    $char = $cipherText[$i];
    if(ctype_alpha($char)) {
      $offset = ord($key[$i % $keyLength]) - 65;
      $text .= chr(((ord($char) - 65 - $offset + 26) % 26) + 65);
    } else {
      $text .= $char;
    }
  }
  return $text;
}

const key = 'php';
const message = 'hello world';

$encryptedMessage = vigenere_encrypt(message, key);

$decryptedMessage = vigenere_decrypt($encryptedMessage, key);
echo "encrypted message: $encryptedMessage
decrypted message: $decryptedMessage \n";


