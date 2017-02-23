$(document).ready(function() {
  $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
      });
});
function validName($name){
  var nameReg = /^[a-zA-Z]*$/;
  return nameReg.test($name);
}
function validAge($age){
  var ageReg = /^[0-9]*$/;
  return ageReg.test($age);
}
function validPhone($phone){
  var ageReg = /^[0-9]*$/;
  return ageReg.test($phone) && $phone.length == 10;
}
function validate(){
  $firstName = $("#firstname").val();
  $lastName = $("#lastname").val();
  $age = $("#age").val();
  $gender = $("#gender").val();
  $phone = $("#phone").val();
  if(!validName($firstName)){
    event.preventDefault(); 
    Lobibox.alert("error",{msg:"Please enter a valid First name"});
    return ;
  }
  if($firstName == ''){
      event.preventDefault();
      Lobibox.alert("error",{msg:"First Name cannot be empty"}); 
      return ;
  }
  if(!validName($lastName)){
    event.preventDefault(); 
    Lobibox.alert("error",{msg:"Please enter a valid Last name"});
    return ;
  }
  if($lastName == ''){
      event.preventDefault(); 
      Lobibox.alert("error",{msg:"Last Name cannot be empty"}); 
      return ;
  }
  if(!validAge($age)){
      event.preventDefault(); 
      event.preventDefault(); 
      Lobibox.alert("error",{msg:"Please enter a valid age"});
      return ; 
  }
  if($age == ''){
    event.preventDefault(); 
    Lobibox.alert("error",{msg:"Age cannot be empty"});
    return ; 
  }
  if($gender == "notselected"){
      event.preventDefault(); 
      Lobibox.alert("error",{msg:"Please select your gender"});
      return ;   
  }
  if(!validPhone($phone)){
    event.preventDefault(); 
    Lobibox.alert("error",{msg:"Please enter your valid phone number"});
    return ;  
  }
  if($phone == ''){
    event.preventDefault(); 
    Lobibox.alert("error",{msg:"Please enter your phone number"});
    return ;
  }
}
