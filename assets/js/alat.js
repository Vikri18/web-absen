function editAlat(id, url) {
    $.ajax({
        url: url,
        type: "post",
        dataType: "text",
        data: {
            editSupplier: id,
        },
        success: (a) => {
            var data = JSON.parse(a);
            console.log(data[0]["MAC"]);
            $("#mdlEditAlat").modal("show");
            $("#inedtDevice").val(data[0]["nama"]);
            $("#inedtJamdatang").val(data[0]["jam_masuk"]);
            $("#inedtJampulang").val(data[0]["jam_pulang"]);
            $("#inedtMAc").val(data[0]["MAC"]);
            $("#inedtIddevice").val(id);
        },
        error: (a) => {
            console.log(a);
        },
    });
}

function simpaneditAlat(url) {
    var devicename = $("#inedtDevice").val();
    var jamMsk = $("#inedtJamdatang").val();
    var jamPlg = $("#inedtJampulang").val();
    var mac = $("#inedtMAc").val();
    var id = $("#inedtIddevice").val();

    if (
        devicename == "" ||
        jamMsk == "" ||
        jamPlg == "" ||
        mac == "" ||
        id == ""
    ) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please Fill All Required Field",
        });
    } else {
        console.log("ifsd");
        $.ajax({
            url: url,
            type: "post",
            dataType: "text",
            data: {
                devicename: devicename,
                jamMsk: jamMsk,
                jamPlg: jamPlg,
                mac: mac,
                id: id,
            },
            success: (a) => {
                $('#mdlEditAlat').modal('hide');
                location.reload();
            },
            error: (a) => {
                console.log(a);
            },
        });
    }
}

function hapusSupplier(id, nama) {
    $("#mdlHapusSupplier").modal("show");
    $("#idHpsSupplier").val(id);
    $("#modalTitlehapus").html("Yakin Hapus Supplier " + nama + " ?");
}

function submitHapussupplier() {
    $.ajax({
        url: "logicSupplier.php",
        type: "post",
        dataType: "text",
        data: {
            idHapussuppliers: $("#idHpsSupplier").val(),
        },
        success: (a) => {
            $("#mdleditsatuan").modal("hide");
            location.reload();
        },
        error: (a) => {
            console.log(a);
        },
    });
}
