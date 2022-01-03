function checkcode(barcode){
//only for 8 char upc-e and 12 char upc-a

var ar = new Array();
var num = barcode;
//set to fail first then check if good code
var pass = 0;

//remove all but numbers
var lng = num.lenght;
ar = num.split("-")
//put back together
num ="";
var lng = ar.length;
for (var i = 0; i < lng; i++) {
num = num + ar[i];
}

//UPC-E. Turn into a UPC-A for processsing
if (num.length == 8){
        var numtemp;
        if(num.charAt(6) == "0"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+"00000"+num.charAt(3)+num.charAt(4)+num.charAt(5)+num.charAt(7);
                }
        if(num.charAt(6) == "1"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+"10000"+num.charAt(3)+num.charAt(4)+num.charAt(5)+num.charAt(7);
                }
        if(num.charAt(6) == "2"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+"20000"+num.charAt(3)+num.charAt(4)+num.charAt(5)+num.charAt(7);
                }
        if(num.charAt(6) == "3"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+"00000"+num.charAt(4)+num.charAt(5)+num.charAt(7);
                }
        if(num.charAt(6) == "4"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+"00000"+num.charAt(5)+num.charAt(7);
                }
        if(num.charAt(6) == "5"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+num.charAt(5)+"00005"+num.charAt(7);
                }
        if(num.charAt(6) == "6"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+num.charAt(5)+"00006"+num.charAt(7);
                }
        if(num.charAt(6) == "7"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+num.charAt(5)+"00007"+num.charAt(7);
                }
        if(num.charAt(6) == "8"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+num.charAt(5)+"00008"+num.charAt(7);
                }
        if(num.charAt(6) == "9"){
                numtemp=num.charAt(0)+num.charAt(1)+num.charAt(2)+num.charAt(3)+num.charAt(4)+num.charAt(5)+"00009"+num.charAt(7);
                }
        num=numtemp;
        }

// UPC-A
//clear sums
var sum1 = 0;
var sum2 = 0;
var sumt = 0;
//check long code
if (num.length == 12) {
        //calc first sum ;sum of even digits times 3
        for (var i = 0; i < 12-1; i=i+2) {
                sum1 = sum1 + parseInt(num.charAt(i));
                //sum1 = sum1 + num.charAt(i);
                }
        sum1 = sum1 * 3;
        //calc second sum (sum of odd digits but not checksum)
        for (var i = 1; i < 12-1; i=i+2) {
                sum2 = sum2 + parseInt(num.charAt(i));
                //sum1 = sum1 + num.charAt(i);
                }
        //total sum
        sumt = sum1 + sum2;
        //get last digit
        var sumchar = sumt.toString();
        var lst = sumchar.charAt(sumchar.length - 1);
        //calculate checksum
        var result = (10 - parseInt(lst)).toString();
        result = result.charAt(result.length - 1);
        //print if it is a good code
        if ( num.charAt(num.length - 1) != result){
                //bad code
                pass = 0;
                }
        else {
                //good code
                pass = 1;
                }
        }

// EAN-13. Same as UPC-A but with a superfuous number at beginning
//clear sums
var sum1 = 0;
var sum2 = 0;
var sumt = 0;
//check long code
if (num.length == 13) {
        //calc first sum ;sum of odd digits times 3
        for (var i = 1; i < 13-1; i=i+2) {
                sum1 = sum1 + parseInt(num.charAt(i));
                //sum1 = sum1 + num.charAt(i);
                }
        sum1 = sum1 * 3;
        //calc second sum (sum of even digits but not checksum)
        for (var i = 2; i < 13-1; i=i+2) {
                sum2 = sum2 + parseInt(num.charAt(i));
                //sum1 = sum1 + num.charAt(i);
                }
        //total sum
        sumt = sum1 + sum2;
        //get last digit
        var sumchar = sumt.toString();
        var lst = sumchar.charAt(sumchar.length - 1);
        //calculate checksum
        var result = (10 - parseInt(lst)).toString();
        result = result.charAt(result.length - 1);
        //print if it is a good code
        if ( num.charAt(num.length - 1) != result){
                //bad code
                pass = 0;
                }
        else {
                //good code
                pass = 1;
                }
        }

if (pass == 0) 
    {
    document.write("<b><font color='red'>(BAD CODE)</font></b>");
    }
else
  {
   //document.write("good code");
  }
}
