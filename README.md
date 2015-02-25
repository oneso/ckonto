# cKonto

### Installing via Composer
```
composer require oneso/ckonto
```

### Usage
```php
# set your account key
Ckonto::setKey("demo");

# check bank account number and bank code
$bankCheck = Ckonto::checkBank()
	->setBankCode("1234567890")
	->setAccountNumber("76543210")
	->setSepa(true) // optional
	->check();

# check iban and bic
$ibanCheck = Ckonto::checkIban()
	->setIban("DE07100500006603032331")
	->setBic("BELADEBEXXX") // optional
	->check();

# search
$search = Ckonto::search()
	->setZip("123")         // optional
	->setBankCode("76543")  // optional
	->setName("Postbank")   // optional
	->setLocation('Berlin') // optional
	->setMax(10)            // optional
	->search();
```

For more information read: https://www.ckonto.de/download/cKonto.de_XML_Schnittstelle.pdf
