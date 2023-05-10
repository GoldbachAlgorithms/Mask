# Gold Mask

[<img src="https://badgen.net/badge/Powered%20by/Goldbach/red" />](https://github.com/Goldbach07/)
[<img src="https://badgen.net/badge/Developed%20for/PHP/blue" />](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Goldbach Algorithms Mask (fondly nicknamed Gold Mask) is a PHP library developed for Symfony for apply a mask to values.

## Installation

Use the composer to install:

```bash
composer require goldbach-algorithms/mask
```

## Usage
It is possible to mask a string to one of the default settings or create a customization from the custom() method.

```php
# add use Mask
use GoldbachAlgorithms\Mask\Mask;

# create a new mask
$mask = new Mask();

# returns '89566-410'
$mask->cep('89566410');

# returns '198.298.398-98'
$mask->cpf('19829839898');

# returns '03.635.359/0001-23'
$mask->cnpj('3635359000123');

# returns '12.345.678-9'
$mask->rg('123456789');

# returns '4321.****.****.1234'
$mask->creditCard('4321544534421234');

# returns '(11) 3227-3158'
$mask->phone('1132273158');

# returns '(21) 99943-2343'
$mask->phone('21999432343');

# returns '18/03/1690'
$mask->custom('18031690','##/##/####');


```

## License
[MIT](https://choosealicense.com/licenses/mit/)

Copyright © 2023 [Goldbach Algorithms](https://github.com/GoldbachAlgorithms/Mask/blob/main/LICENSE)
