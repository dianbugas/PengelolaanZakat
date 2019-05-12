# Yii2 Ionicons
Asset Bundle to include Ionicons on your Yii 2 project: https://ionicons.com/

Installation
-----------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cinghie/yii2-ionicons "^1.0.0"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-ionicons": "^1.0.0"
```

Configuration
-----------------

Add in the view for normal CSS

```
use cinghie\ionicons\IoniconsAsset;

IoniconsAsset::register($this);
```

Add in the view for minify CSS

```
use cinghie\ionicons\IoniconsMinifyAsset;

IoniconsMinifyAsset::register($this);
```
