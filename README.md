# cKonto

### Installing via Composer
```
composer require oneso/ckonto
```

### Usage
```php
# Set your account key
Ckonto::setKey("demo");

# Check bank account number and bank code
$bankCheck = Ckonto::checkBank(
    AccountNumber::fromNumber("76543210"),
    BankCode::fromCode("1234567890"),
    Sepa::getDefault()
)->check();

# Check iban and bic
$ibanCheck = Ckonto::checkIban(
    Iban::fromIban("DE07100500006603032331"),
    Bic::fromBic("BELADEBEXXX"),
    Sepa::getDefault()
)->check();

# Search
$search = Ckonto::search(
    BankCode::fromCode("1234567890"),
    Location::fromCity("Berlin"),
    Name::fromName("Postbank"),
    Zip::fromZip("123"),
    Max::getEmpty()
)->search();
```

For more information read: https://www.ckonto.de/download/cKonto.de_XML_Schnittstelle.pdf
