$(document).ready(function () {

    var jsonData = $.ajax({
        url: 'https://morning-plateau-83796.herokuapp.com/api?id=1BJaxvHYjLAGjH6T4d6itP9mOXukmtkNHRtVZtK0jTgA&sheet=1&columns=false',
        dataType: 'json',
    }).done(function (results) {

        var labels = [], data_A = [], data_B = [];
        // console.log(results["rows"]);
        results["rows"].forEach(function (rows) {
            // console.log(rows.date);
            labels.push(rows.date);
            data_A.push(rows.confirmed);
            data_B.push(rows.increaseconfirmed);

            // console.log(labels);
            // console.log(data_A);

            renderChart(data_A, data_B, labels);
        });

    });
    
});

function renderChart(dataA, dataB, labels) {
    var ctx = document.getElementById("myChart_incre").getContext('2d');
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [{
                label: "Confirmed",
                data: dataA,
                backgroundColor: "#3d8ef8"
            }, {
                label: "Daily Increment",
                data: dataB,
                backgroundColor: "#11c46e"
            }]
        },
        options: {
            responsive: !0,
            maintainAspectRatio: !0,
            scales: {
                yAxes: [{
                    display: !1,
                    gridLines: {
                        drawBorder: !1
                    },
                    ticks: {
                        fontColor: "#686868"
                    }
                }],
                xAxes: [{
                    barPercentage: .7,
                    categoryPercentage: .5,
                    ticks: {
                        fontColor: "#7b919e"
                    },
                    gridLines: {
                        display: !1,
                        drawBorder: !1
                    }
                }]
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        }
    });
}

// $("#renderBtn").click(
//     function () {

//         var jsonData = $.ajax({
//             url: 'https://morning-plateau-83796.herokuapp.com/api?id=1BJaxvHYjLAGjH6T4d6itP9mOXukmtkNHRtVZtK0jTgA&sheet=1&columns=false',
//             dataType: 'json',
//         }).done(function (results) {

//             var labels = [], data_A = [], data_B = [];
//             // console.log(results["rows"]);
//             results["rows"].forEach(function (rows) {
//                 // console.log(rows.date);
//                 labels.push(rows.date);
//                 data_A.push(rows.confirmed);
//                 data_B.push(rows.increaseconfirmed);

//                 // console.log(labels);
//                 // console.log(data_A);

//                 renderChart(data_A, data_B, labels);
//             });

//         });


//         // data_A = [74, 83, 102, 97, 86, 106, 93, 114, 94];
//         // labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"];

//         // data_B = [37, 42, 38, 26, 47, 50, 54, 55, 43];

//         // renderChart(data_A, labels);
//     }
// );