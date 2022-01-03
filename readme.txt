This was Developed by Harish Chauhan and found at:
http://www.phpkode.com/scripts/tag/barcode/
http://www.phpkode.com/scripts/item/barcode/

It requires arialbd.ttf font 

I have changed:

Fixed UPC-E
UPC-A accepts only 12 digits
UPC-E accepts only 6 digits

checkcode.js is not required. It only checks UPC-A and UPC-E codes

.htaccess is what I use to change barcode/images/123456789012_upc.jpg 
to 
/barcode/barcode.php?bdata=$1&encode=UPC-E&height=50&type=$2&bgcolor=%23FFFFFF