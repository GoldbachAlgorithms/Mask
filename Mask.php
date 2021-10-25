<?php

namespace GoldbachAlgorithms;

class Mask
{
    const CEP = '#####-###';

    public function transform(
        string $mask,
        string $value
    ){
        $value = $this->rewrite($mask, $value);

        $maskared = '';

        $k = 0;
            
        for($i = 0; $i <= strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($value[$k])){
                    $maskared .= $value[$k++];
                }                
            } 
            else
            {
                if(isset($mask[$i]))
                {
                    $maskared .= $mask[$i];
                }
            }
        }
        
        return $maskared;
           
    }

    public function rewrite(
        $mask,
        $value
    )
    {
        if($mask == self::CEP){
            $value = str_replace('-','',$value);
            return str_pad($value, 8, "0", STR_PAD_LEFT);
        }
    }

    public function clear(
        string $unmask
    ){
        return $unmask;
    }
}