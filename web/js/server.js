function setNumberDecimal(id, value, limit) {
    document.getElementById(id).value = parseFloat(value).toFixed(limit);
}