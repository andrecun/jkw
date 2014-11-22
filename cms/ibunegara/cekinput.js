var phone = "()- 0123456789";
var numb = "0123456789.";
var alpha = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
var karakter = "()_- 0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
function res(t,v){
var w = "";

for (i=0; i < t.value.length; i++) {
x = t.value.charAt(i);
if (v.indexOf(x,0) != -1)
 w += x; 
}
t.value = w;
}