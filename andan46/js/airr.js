$(document).ready(function(){

  uri=window.location.href;
  e=uri.split("=");
  console.log("URI: "+uri+"hasilnya: "+e[1])
  if(e[1]=="user" || e[1]==user_edit&nik){
      if(e[1]=="user") $("#summary,#chart,#user_add").hide();
      else if(e[1]=="user_edit&nik"){
          $("#summary,#chart,#user_list").hide();
          $("#user_add").show();
      }
  }

  // $("<button type=button class=\"btn btn-outline-succes float-start\">Tambah Data</button>").insertBefore(".datatable-dropdown");

  $(".datatable-dropdown").append("<button type=button class=\"btn btn-outline-success float-start me-2\"><i class=\"fa-solid fa-plus fa-beat\"></i> Data</button>");
  $(".datatable-dropdown button").click(function(){
      $("#user_list").hide();
      $("#user_add").show();
  });
})