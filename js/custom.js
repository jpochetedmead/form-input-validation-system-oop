jQuery.validator.addMethod("alphanum", function(value, element) {
  return this.optional(element) || /^([a-zA-Z0-9])+$/i.test(value);
}, "Please insert alphanumeric values only.");


jQuery.validator.addMethod("number", function(value, element) {
  return this.optional(element) || /^([0-9])+$/i.test(value);
}, "Please insert number values only.");

jQuery.validator.addMethod("noSpace", function(value, element) {
  return value.indexOf(" ") < 0 && value != "";
}, "Spaces not allowed.");

jQuery.validator.addMethod("pwcheck", function(value) {
   return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/.test(value) // consists of only these
       && /[a-zA-Z]/.test(value) // has a upper or lower case letter
       && /\d/.test(value) // has a digit
},'Password must be at least 6 characters including 1 upper and lower letter and 1 number.');


$('document').ready(function(){
  $('input.cleanup').blur(function() {
          var value = $.trim( $(this).val());
          $(this).val( value );
  });
  $('input.uppercase').blur(function() {
          var value = $(this).val().toUpperCase();
          $(this).val( value );
  });
  $('input.capital').blur(function() {
      var arr = $(this).val().split(' ');
      var result = "";
      for (var x=0; x<arr.length; x++)
          result+=arr[x].substring(0,1).toUpperCase()+arr[x].substring(1)+' ';
      $(this).val(result.substring(0, result.length-1));

     /* var value = $(this).val().toUpperCase();
          $(this).val( value );*/
  });
  $('.rdonly').bind('keyup keydown keypress', function (e) {
if (e.keyCode == 9)
{ return true; }
else
{ return false; }
  });
});
