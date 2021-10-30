<?php

namespace GoldbachAlgorithms\Mask;

use GoldbachAlgorithms\Mask\Constants;

/**
 * Class to mask predefined or custom values
 */
class Mask
{
    /**
     * Add a phone mask
     *
     * @param string $value
     *
     * @return string
     */
    public function phone(string $value): string
    {
        return $this
                    ->transform(
                        Constants::PHONE,
                        $value
                    );
    }

    /**
     * Add a cep mask
     *
     * @param string $value
     *
     * @return string
     */
    public function cep(string $value): string
    {
        return $this
                    ->transform(
                        Constants::CEP,
                        $value
                    );
    }

    /**
     * Add a cpf mask
     *
     * @param string $value
     *
     * @return string
     */
    public function cpf(string $value): string
    {
        return $this
                    ->transform(
                        Constants::CPF,
                        $value
                    );
    }

    /**
     * Add a cnpj mask
     *
     * @param string $value
     *
     * @return string
     */
    public function cnpj(string $value): string
    {
        return $this
                    ->transform(
                        Constants::CNPJ,
                        $value
                    );
    }

    /**
     * Add a rg mask
     *
     * @param string $value
     *
     * @return string
     */
    public function rg(string $value): string
    {
        return $this
                    ->transform(
                        Constants::RG,
                        $value
                    );
    }

    /**
     * Add a credit card mask hiding central characters
     *
     * @param string $value
     *
     * @return string
     */
    public function creditCard(string $value): string
    {
        return $this
                    ->transform(
                        Constants::CREDIT_CARD,
                        $value
                    );
    }

    /**
     * Add a custom mask.
     * Set the characters you want to replace with #
     *
     * @param string $value
     * @param string $mask
     *
     * @return string
     */
    public function custom(
        string $value,
        string $mask
    ): string {
        $format = Constants::CUSTOM;
        return $this->transform($format, $value, $mask);
    }

    /**
     * Remove special characters
     *
     * @param string $value
     *
     * @return string
     */
    public function clear(string $value): string
    {
        
        $value = preg_replace(
            '/[\@\.\;\-\?\/\|\*\_\~\!\$\&\(\)\{\}\:\=\+\^\´\`\"\'\," "]+/',
            '',
            $value
        );

        $value = str_replace('[','', $value);
        $value = str_replace(']','', $value);
        
        return $value;
    }

    /**
     * Transfom value with the mask
     *
     * @param string $format
     * @param $value
     * @param $mask = null
     *
     * @return string
     */
    private function transform(
        string $format,
        $value,
        $mask = null
    ): string {
        $this->validate($value);
        $mask = $this->getMask($format, $value, $mask);
        $value = $this->clear($value);
        $value = $this->autocomplete($format, $value);
        $value = $this->do($value, $mask);
        return $value;
    }

    /**
     * Execute replace process
     *
     * @param string $value
     * @param string $mask
     *
     * @return string
     */
    private function do(
        string $value,
        string $mask
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

    /**
     * Auto complete validate
     *
     * @param string $format
     * @param string $value
     *
     * @return string
     */
    private function autocomplete(
        string $format,
        string $value
    ): string {
        if (in_array($format, Constants::AUTO_COMPLETE)) {
            $length = Constants::LENGTH[$format];
            $value = $this->addZeros($value, $length);
        }
        return $value;
    }

    /**
     * Add zero to the left
     *
     * @param string $value
     * @param int $length
     *
     * @return string
     */
    private function addZeros(
        string $value,
        int $length
    ): string {
        return str_pad(
            $value,
            $length,
            "0",
            STR_PAD_LEFT
        );
    }

    /**
     * Validate value
     *
     * @param $value
     *
     * @return bool
     */
    private function validate($value): bool
    {
        if (is_null($value)) {
            $this->error(Constants::ERROR['NULL']);
        }
        if (is_string($value)) {
            return true;
        }
        if (is_int($value)) {
            return true;
        }
        if (is_double($value)) {
            return true;
        }
        $this->error(Constants::ERROR['INVALID']);
    }

    /**
     * Get the mask format
     *
     * @param string $format
     * @param string $value
     * @param ?string $mask
     *
     * @return string
     */
    private function getMask(
        string $format,
        string $value,
        ?string $mask
    ): string {
        if (!is_null($mask)) {
            return $mask;
        }

        if ($format == Constants::PHONE) {
            if (strlen($value) > Constants::LENGTH[Constants::PHONE]) {
                $format = Constants::CELL_PHONE;
            }
        }
        $mask = Constants::MASK[$format];
        return $mask;
    }

    /**
     * Error method
     *
     * @param string $message
     */
    private function error(string $message)
    {
        throw new \Exception(
            'Goldbach Algorithms: '.$message
        );
    }
}