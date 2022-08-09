## About Generate-PDF

Generate-PDF is a web application used for create PDF file by MS.Mattareeya Rachbuasri and MR.Kantinan Makmee.
## How to install
1.Type command see below
```
composer install
```

2.copy all fonts in myfont folder to destination directory  (vender/composer/fpdf/src/font) in command line.

```
cp myfont/.* vender/composer/Fpdf/src/font
```
> Or in windows use command
```
copy myfont/ *.*  ./vender/fpdf/fpdf/src/Fpdf/font
```

3.deploy root folder in your webserver and test acccess.

### Test URL
http://localhost/generate-pdf/doc.php

