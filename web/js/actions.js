function sendFrom(id) {
    var form = $(('#' + id));
    form.submit();
}

function viewModal(id) {
    $('#' + id).modal()
}