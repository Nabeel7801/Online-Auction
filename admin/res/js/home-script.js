$(document).ready(function() {

    $("#addToDatabase").click(function() {

        var title = $("#title").val();
        var make = $("#make").val();
        var model = $("#model").val();
        var year = $("#year").val();
        var fuelType = $("#fuelType").val();
        var engine = $("#engine").val();
        var transmission = $("#transmission").val();
        var color = $("#color").val();
        var startTime = $("#startTime").val();
        var startingPrice = $("#startingPrice").val();
        var duration = $("#duration").val();
        var minIncrement = $("#minIncrement").val();

        var str = "?title=" + title + "&make=" + make + "&model=" + model + "&year=" + year + "&fuelType=" + fuelType + "&engine=" + engine + "&transmission=" + transmission + "&color=" + color + "&startTime=" + startTime + "&startingPrice=" + startingPrice + "&duration=" + duration + "&minIncrement=" + minIncrement;
        var uri = encodeURI("res/db-queries/addProduct.php" + str)
        $("#hiddenArea").load(uri, function() {

        })
    })

});