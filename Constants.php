<?php 

class Constants
{
    /**
     * 🇧🇷 Configurações de máscaras
     * 🇺🇸 Mask Settings
     * 🇮🇹 Impostazioni delle maschere
     */
    const CEP = '#####-###';
    const CPF = '###.###.###-##';

    /**
     * 🇧🇷 Tamanho exato de cada tipo de informação
     * 🇺🇸 Exact size of each type of information
     * 🇮🇹 Dimensione esatta di ogni tipo di informazione
     */
    const LENGTH = [
        'CEP' => 8,
        'CPF' => 11
    ];
}