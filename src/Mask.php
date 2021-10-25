<?php

namespace GoldbachAlgorithms\Mask;

use GoldbachAlgorithms\Mask\Constants;

class Mask
{
    const FORMAT = [
        "CEP" => "CEP",
        "CPF" => "CPF"
    ];
    
    const CODE = [
        "CEP" => "#####-###",
        "CPF" => "###.###.###-##"
    ];
    
    public function transform(
        string $mask,
        string $value
    ) {
        $value = $this->clear($value);
        $value = $this->rewrite($mask, $value);
        $value = $this->doIt(self::CODE[$mask], $value);
        
        return $value;
    }

    public function doIt(
        string $mask,
        string $value
    ): string {
        $masked = '';

        $k = 0;
            
        for ($i = 0; $i <= strlen($mask)-1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($value[$k])) {
                    $masked .= $value[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $masked .= $mask[$i];
                }
            }
        }

        return $masked;
    }

    public function rewrite(
        string $mask,
        string $value
    ):string {
        return str_pad($value, Constants::LENGTH[self::FORMAT[$mask]], "0", STR_PAD_LEFT);
    }

    public function clear(
        string $unmask
    ):string {
        $unmasked = preg_replace('/[\@\.\;\-\," "]+/', '', $unmask);
        
        return $unmasked;
    }
}
