# FlyBuys validator

Validates flybuys numbers.

## Installation

	$ composer require heyday/flybuys-validator:~1.0

## Usage

Input can be either a `string` or an `array`, but it must contain only numeric chars.

```php
Flybuys\validate("6014359000000928")
```