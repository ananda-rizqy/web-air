$(document).ready(function () {
  //jika javascript tidak jalan silahkan clear cache

  uri = window.location.href;
  e = uri.split("=");
  // console.log("uri: "+uri+" hasil: "+e[1]);
  if (e[1] == "user" || e[1] == "user_edit&nik") {
    if (e[1] == "user") {
      //menu Manajemen User diklik
      $(
        "#summary,#chart,#user_add,#tarif_add,#tarif_list,#input_meter_list,#input_meter_add"
      ).hide();
    } else {
      //tombol Edit/Ubah diklik
      $(
        "#summary,#chart,#user_list,#tarif_add,#tarif_list,#input_meter_list,#input_meter_add"
      ).hide();
      $("#user_add").show();
      $(
        "#user_form input[name='nik'],#user_form input[name='username'],#user_form input[name='password']"
      ).attr("disabled", true); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
      $("#user_form button").val("user_edit"); //mereset value elemen button menjadi user_edit agar tombol bisa untuk edit data
      $("#user_form").append("<input type=hidden name=nik value=" + e[2] + ">"); //menambahkan elemen input dengan tipe hidden
    }

    if ($("#alert-user").hasClass("alert-danger")) {
      //jika saat entri data ada error
      $("#user_list").hide();
      $("#user_add").show();
    } else if ($("#alert-user").hasClass("alert-success")) {
      $("#user_list").show();
      $("#user_add").hide();
    }

    $(".datatable-dropdown").append(
      '<button type=button class="btn btn-outline-success float-start me-2"><i class="fa-solid fa-user-plus fa-beat"></i> User</button>'
    );

    $(".datatable-dropdown button").click(function () {
      //saat tombol Tambah User diklik
      $("#user_list").hide();
      $("#user_add").show();
      $("#user_form input,#user_form textarea,#user_form select").val(""); //mereset isi elemen input, textarea & select
      $("#user_form button").val("user_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
      $(
        "#user_form input[name='nik'],#user_form input[name='username'],#user_form input[name='password']"
      ).attr("disabled", false); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
    });

    $("button[data-bs-toggle='modal']").click(function () {
      nik = $(this).attr("data-nik");
      $("#myModal .modal-body").text("Yakin hapus data NIK " + nik + "?");
      $(".modal-footer form").append(
        "<input type=hidden name=nik value=" + nik + ">"
      );
    });
  } else if (e[1] == "tarif" || e[1] == "tarif_edit&id_tarif") {
    $(
      "#summary,#chart,#user_add,#user_list,#input_meter_list,#input_meter_add"
    ).hide();
    if (e[1] == "tarif") {
      //menu Manajemen tarif diklik
      $("#tarif_add").hide();
      $("#tarif_list").show();
    } else {
      //tombol Edit/Ubah diklik
      $("#summary,#chart,#tarif_list").hide();
      $("#tarif_add").show();
      $("#tarif_form input[name='id_tarif']").attr("disabled", true); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
      $("#tarif_form button").val("tarif_edit"); //mereset value elemen button menjadi tarif_edit agar tombol bisa untuk edit data
      $("#tarif_form").append(
        "<input type=hidden name=id_tarif value=" + e[2] + ">"
      ); //menambahkan elemen input dengan tipe hidden
    }

    if ($("#alert-tarif").hasClass("alert-danger")) {
      //jika saat entri data ada error
      $("#tarif_list").hide();
      $("#tarif_add").show();
    } else if ($("#alert-tarif").hasClass("alert-success")) {
      $("#tarif_list").show();
      $("#tarif_add").hide();
    }

    const datatablesSimple = document.getElementById("tarif_table"); 
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple);
    }

    $(".datatable-dropdown").append(
      '<button type=button class="btn btn-outline-success float-start me-2"></i> Tarif</button>'
    );

    $(".datatable-dropdown button").click(function () {
      //saat tombol Tambah Tarif diklik
      $("#tarif_list").hide();
      $("#tarif_add").show();
      $("#tarif_form input[type='text'], #tarif_form input[type='number'], #tarif_form select").val(""); //mereset isi elemen input, textarea & select
      $("#tarif_form input[type='radio']").prop("checked", false); //mereset isi elemen input, textarea & select
      $("#tarif_form button").val("tarif_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
      $("#tarif_form input[name='id_tarif']").attr("disabled", false); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
    });

    $("button[data-bs-toggle='modal']").click(function () {
      id_tarif = $(this).attr("data-id_tarif");
      $("#myModal .modal-body").text(
        "Yakin hapus data ID Tarif " + id_tarif + "?"
      );
      $(".modal-footer form").append(
        "<input type=hidden name=id_tarif value=" + id_tarif + ">"
      );
      $(".modal-footer button").val("tarif_hapus");
    });
  }else if (e[1] == "input_meter" || e[1] == "input_meter_edit&no") {
      $("#summary,#chart,#user_add,#user_list,#tarif_add,#tarif_list").hide();
      if (e[1] == "input_meter") {
        //menu Input Meter diklik
        $("#input_meter_add").hide();
        $("#input_meter_list").show();
      } else {
        //tombol Edit/Ubah diklik
        $("#summary,#chart,#input_meter_list").hide();
        $("#input_meter_add").show();
        // $("#input_meter_form input[name='no']").attr("disabled", true); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
        $("#input_meter_form button").val("input_meter_edit"); //mereset value elemen button menjadi tarif_edit agar tombol bisa untuk edit data
        $("#input_meter_form").append(
          "<input type=hidden name=no value=" + e[2] + ">"
        ); //menambahkan elemen input dengan tipe hidden
      }
  
      if ($("#alert-input_meter").hasClass("alert-danger")) {
        //jika saat entri data ada error
        $("#input_meter_list").hide();
        $("#input_meter_add").show();
      } else if ($("#alert-input_meter").hasClass("alert-success")) {
        $("#input_meter_list").show();
        $("#input_meter_add").hide();
      }
  
      const datatablesSimple = document.getElementById("input_meter_table");
      if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
      }
  
      $(".datatable-dropdown").append(
        '<button type=button class="btn btn-outline-success float-start me-2"><i class="fa-solid fa-water  fa-beat"></i> Meter </button>'
      );
  
      $(".datatable-dropdown button").click(function () {
        //saat tombol Tambah Meter diklik
        $("#input_meter_list").hide();
        $("#input_meter_add").show();
        $("#input_meter_form input, #input_meter_form select").val(""); //mereset isi elemen input, textarea & select
        $("#input_meter_form button").val("input_meter_add"); //mereset value elemen button menjadi user_add agar tombol bisa untuk nambah data
        // $("#input_meter_form input[name='no']").attr("disabled", false); //elemen input dengan atribut namenya nik dan username dibuat tdk bisa diinput saat edit data
      });
  
      $("button[data-bs-toggle='modal']").click(function () {
        no = $(this).attr("data-no");
        $("#myModal .modal-body").text("Yakin hapus data meter ?");
        $(".modal-footer form").append(
          "<input type=hidden name=no value=" + no + ">"
        );
        $(".modal-footer button").val("input_meter_hapus");
      });
    
    } else {
      $(
        "#user_add,#user_list,#tarif_add,#tarif_list,#input_meter_add,#input_meter_list").hide();
        $.ajax({
          type: "post",
          url: "../assets/ajax.php",
          data: {p:'summary'},
          dataType: "json",
          success: function (d) {
            vol_pemakaian = d[0].total_vol;
            jml_pelanggan = d[1].plg_jml;
            jml_pelanggan_catat = d[2].plg_catat;
            jml_pelanggan_blmcatat=jml_pelanggan-jml_pelanggan_catat;
           
            $("#summary .bg-primary h1").text(vol_pemakaian);
            $("#summary .bg-warning h1").text(jml_pelanggan);
            $("#summary .bg-success h1").text(jml_pelanggan_catat);
            $("#summary .bg-danger h1").text(jml_pelanggan_blmcatat);
          }
        });
    }
  });