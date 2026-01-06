Модуль "Страница 404" для Битрикс
===

Модуль добавляет поддержку красивую страницы 404 для 1С-Битрикс. Выбор из множества готовых шаблонов или добавь свой шаблон.

[Модуль в Маркетплейс Битрикс](http://marketplace.1c-bitrix.ru/solutions/dev2fun.notfound/#tab-install-link)

## Чем полезен модуль

* Добавляет автоматический вывод страницы с 404-ой ошибкой
* Есть несколько 404-х шаблонов в коробке
* Есть поддержка кастомных шаблонов
* Лёгкое управление
* Из коробки идет 12 шаблонов для 404 страницы

## Как установить

1. установить модуль из Маркетплейс Битрикс
2. установить модуль через composer
3. установить модуль из github

### 1 способ. Как установить модуль из Маркетплейс Битрикс
* перейти на страницу модуля [в маркетлейсе битрикса](https://marketplace.1c-bitrix.ru/solutions/dev2fun.notfound/)
* перейти на страницу настроек модуля
* поставить галку на активность, выбрать нужный шаблон и сохранить

### 2 способ. Как установить модуль через composer
* Добавить в файл `composer.json` настройки для `extra`
  * Рекомендуется устанавливать внутри папки `bitrix`. Для этого используйте файл `bitrix/composer.json` и добавьте
```json
  "extra": {
    "installer-paths": {
      "modules/{$name}/": ["type:bitrix-module"]
    }
  }
```
  * Для установки внутри `local` добавьте в файл `local/composer.json`
```json
  "extra": {
    "installer-paths": {
      "modules/{$name}/": ["type:bitrix-module"]
    }
  }
```
* Установить модуль через composer: `composer require dev2fun.notfound`
* Установить в админке сайта
  * Перейти в админку сайта и пройти по пути `Marketplace -> Установленные решения`
  * Найти в списке модуль `Страница 404 с множеством шаблонов (dev2fun.notfound)`
  * Установить модуль
* Активировать модуль на странице настроек модуля

### 3 способ. Как установить модуль из github
* Скачать файлы модуля из github
* Загрузить файлы на сайт в папку `bitrix/modules/dev2fun.notfound`
* Установить в админке сайта
  * Перейти в админку сайта и пройти по пути `Marketplace -> Установленные решения`
  * Найти в списке модуль `Страница 404 с множеством шаблонов (dev2fun.notfound)`
  * Установить модуль
* Активировать модуль на странице настроек модуля

## Как сделать свой шаблон 404 страницы

* разместить код в файле index.php. Примеры можно посмотреть [здесь](utf8/dev2fun.notfound/pages/templates).
* разместить файл по одному из путей:
    * `/local/php_interface/include/dev2fun.notfound/{templateName}/index.php`, где {templateName} название вашего шаблона на английском (**рекомендуемый способ**)
    * `/bitrix/php_interface/include/dev2fun.notfound/{templateName}/index.php`, где {templateName} название вашего шаблона на английском

## Что ещё важно знать

1. Не работает в админке
1. Не работает, если в константе `ERROR_404` не `Y` (`ERROR_404=='Y'`). Тем самым если вам где-то в кастомном месте надо вывести 404, то сделайте `define('ADMIN_SECTION', 'Y');`

## Техническая поддержка

Поддержку решения осуществляет `@darkfriend` от команды [dev2fun](https://dev2fun.com)
Вы можете написать в общий чат [telegram](https://t.me/dev2fun_support) или написав на почту support@dev2fun.com

## Поддержка выпуска обновлений

|                    |                                                        |
|--------------------|--------------------------------------------------------|
| Картой РФ          | [donate page](https://yoomoney.ru/to/410011413398643)  |
| Tinkoff Bank       | https://tbank.ru/cf/36wVfnMf7mo                        |
| Yandex.Money       | 410011413398643                                        |
| Webmoney WMR (rub) | R218843696478                                          |
| Webmoney WMU (uah) | U135571355496                                          |
| Webmoney WMZ (usd) | Z418373807413                                          |
| Webmoney WME (eur) | E331660539346                                          |
| Webmoney WMX (btc) | X740165207511                                          |
| Webmoney WML (ltc) | L718094223715                                          |
| Webmoney WMH (bch) | H526457512792                                          |
| PayPal             | [@darkfriend](https://www.paypal.me/darkfriend)        |
| Payeer             | P93175651                                              |
| Bitcoin            | 15Veahdvoqg3AFx3FvvKL4KEfZb6xZiM6n                     |
| Litecoin           | LRN5cssgwrGWMnQruumfV2V7wySoRu7A5t                     |
| Ethereum           | 0xe287Ac7150a087e582ab223532928a89c7A7E7B2             |
| BitcoinCash        | bitcoincash:qrl8p6jxgpkeupmvyukg6mnkeafs9fl5dszft9fw9w |