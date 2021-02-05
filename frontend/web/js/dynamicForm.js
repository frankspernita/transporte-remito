// $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
//     console.log("beforeInsert");
// });
//
// $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
//     console.log("afterInsert");
// });

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("¿Seguro que desea eliminar este item?")) {
        return false;
    }
    return true;
});
//
// $(".dynamicform_wrapper").on("afterDelete", function(e) {
//     console.log("Deleted item!");
// });

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});
