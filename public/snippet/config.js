$(function() { 
  var theTable = $('table.food_planner')

  theTable.find("tbody > tr").find("td:eq(1)").mousedown(function(){
    $(this).prev().find(":checkbox").click()
  });

  $("#filter").keyup(function() {
    $.uiTableFilter( theTable, this.value );
  })

  $('#filter-form').submit(function(){
    theTable.find("tbody > tr:visible > td:eq(1)").mousedown();
    return false;
  }).focus(); //Give focus to input field
});  
function sweetTabel(target){
  var ItemPerPage = 2;
  var totalItem = 0;
  target.find("tbody > tr td:nth-child(4)").each(function(i){
    var kon = $(this).parent().is(":visible");
    if (kon == true) {
      totalItem++;
    }
  })
  var numpage = Math.ceil(totalItem / ItemPerPage);
  var j = 0;
  target.find("tbody > tr td:nth-child(4)").each(function(i){
    var kon = $(this).parent().is(":visible");
    if (kon == true) {
      console.log("start i :" +j+" Select");
      if(j < ItemPerPage){
        $(this).parent().show();
        j++;
      }else{
        $(this).parent().hide();
      }
    }else{
      console.log("start i :" +j)
    }
  })
  console.log("Total Item select : "+totalItem);
  var pag = $("#myPageTabel");
  pag.empty();
  $('<a class="prev_link" id="'+i+'"><i class="material-icons">chevron_left</i></a>').appendTo(pag);
  for (var i = 1; i < numpage+1; i++) {
    if (i == 1) {
      $('<a class="prev_link" id="'+i+'">'+i+'</a>').appendTo(pag);
    }else{
      $('<a href="#" class="prev_link" id="'+i+'">'+i+'</a>').appendTo(pag);
    }
    
    console.log(i)
  }
  $('<a href="#" class="next_link" id="'+i+'"><i class="material-icons">chevron_right</i></a>').appendTo(pag);
}
function cari(target, val){
console.log("aaa"+val);
if(val == null){
  target.find("tbody > tr td:nth-child(4)").each(function(i){
    $(this).parent().show();
    $(this).css("background-color","red");})
}else{
  target.find("tbody > tr td:nth-child(4)").each(function(i){
  if($(this).text() == val){
    $(this).parent().show();
      $(this).css("background-color","red");
  }else{
      $(this).parent().hide();
  }
  
  }
)
}
sweetTabel(target)
}
$('#bahasa').click(function(){ 
    var value = $('#bahasa option:selected').text();
    if(value == "all"){
      value = null;
    }
    var theTable = $('table.food_planner')
    cari( theTable, value);

});
$(".atas").click(function(){ 
    console.log("aa");
});




$(".clipboard").each(function(){
   $('<button onclick="copyClipboard(this)"><span class="material-icons">content_copy</span></button>').appendTo($(this));
})

function copyClipboard(lala) {
  console.log(lala.parentNode.firstChild);
  var elm = lala.parentNode.firstChild;
  if(document.body.createTextRange) {
    var range = document.body.createTextRange();
    range.moveToElementText(elm);
    range.select();
    document.execCommand("Copy");
  }
  else if(window.getSelection) {
    // other browsers

    var selection = window.getSelection();
    var range = document.createRange();
    range.selectNodeContents(elm);
    selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand("Copy");
  }
}