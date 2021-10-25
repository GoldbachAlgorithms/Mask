# GoldMask

Goldbach Algorithms Mask (fondly nicknamed GoldMask) is a PHP library developed for Symfony for apply a mask to strings.

## Installation

Use the composer to install:

```bash
composer require goldbach-algorithms/aig
```

## Usage

```php
# add use Mask
use GoldbachAlgorithms\Mask\Mask;

# create a new mask
$mask = new Mask();

# returns '11025-140'
$mask->transform(Mask::CEP, '11025140');

# returns '198.298.398-98'
$mask->transform(Mask::CPF, '19829839898');

```

## License
[MIT](https://choosealicense.com/licenses/mit/)