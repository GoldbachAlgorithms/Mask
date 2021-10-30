<?php 

namespace GoldbachAlgorithms\Mask;

class Constants
{
    /* Supported types */
    const CEP = "CEP";
    const CPF = "CPF";
    const CNPJ = "CNPJ";
    const DATE = "DATE";
    const RG = "RG";
    const PHONE = "PHONE";
    const CELL_PHONE = "CELL_PHONE";
    const CUSTOM = "CUSTOM";
    const CREDIT_CARD = "CREDIT_CARD";
    
    /**
     * Masks of any supported type
     *
     * @const LENGHT
     */
    const MASK = [
        "CEP" => "#####-###",
        "CPF" => "###.###.###-##",
        "CNPJ" => "##.###.###/####-##",
        "DATE" => "##/##/####",
        "RG" => "##.###.###-#",
        "PHONE" => "(##) ####-####",
        "CELL_PHONE" => "(##) #####-####",
        "CREDIT_CARD" => "####.****.****.####"
    ];

    /**
     * Define auto complete type (with zero to the left)
     *
     * @const LENGHT
     */
    const AUTO_COMPLETE = [
        "CEP",
        "CPF",
        "CNPJ",
        "RG"
    ];

    /**
     * Exact size of each type of information
     *
     * @const LENGHT
     */
    const LENGTH = [
        'CEP' => 8,
        'CPF' => 11,
        'CNPJ' => 14,
        'RG' => 9,
        'PHONE' => 10
    ];

    /**
     * Define mask class errors
     *
     * @const ERROR
     */
    const ERROR = [
        'NULL' => 'The value entered is null.',
        'INVALID' => 'Not supported type entered.'
    ];

}