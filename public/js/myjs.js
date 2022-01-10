
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
$(document).ready(function () {
  $('.mdb-select').materialSelect();
  $('.select-wrapper.md-form.md-outline input.select-dropdown').bind('focus blur', function () {
    $(this).closest('.select-outline').find('label').toggleClass('active');
    $(this).closest('.select-outline').find('.caret').toggleClass('active');
  });
});

//comment collapse
$(document).ready(function(){



  $('#collapse-1').on('shown.bs.collapse', function() {
  
  $(".servicedrop").addClass('fa-chevron-up').removeClass('fa-chevron-down');
  });
  
  $('#collapse-1').on('hidden.bs.collapse', function() {
  $(".servicedrop").addClass('fa-chevron-down').removeClass('fa-chevron-up');
  });
  
  });