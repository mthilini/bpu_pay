function setNumberDecimal(id, value, limit) {
    document.getElementById(id).value = parseFloat(value).toFixed(limit);
}

// const dateControl = $('input[type="date"]');
// for (let index = 0; index < dateControl.length; index++) {
//     const element = dateControl[index].value;
//     const element_id = dateControl[index].id;
//     console.log(element);
//     console.log(element_id);

//     dateControl[index].value = moment(new Date(element)).locale("el").format("DD/MM/YYYY");
// }

$(document).ready(function () {
    $('.datatable').DataTable({
        responsive: true
    });
});