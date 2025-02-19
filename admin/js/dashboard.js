$(document).ready(function () {
  let chart; // Store the chart instance globally

  const getAnalyticsCount = () => {
      $.ajax({
          url: 'backend/end-points/get_analytics.php', // API endpoint
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              console.log(response); // Debugging

              let totalAlumni = response.total_alumni;
              let totalCampus = response.total_campus;

              $('.total_alumni').text(totalAlumni);
              $('.total_campus').text(totalCampus);

              // Update chart if already initialized, else create it
              if (chart) {
                  chart.updateSeries([{
                      name: "Count",
                      data: [totalCampus, totalAlumni]
                  }]);
              } else {
                  createChart(totalCampus, totalAlumni);
              }
          },
          error: function(xhr, status, error) {
              console.error("Error fetching analytics:", error);
          }
      });
  };

  const createChart = (totalCampus, totalAlumni) => {
      let options = {
          series: [{
              name: "Count",
              data: [totalCampus, totalAlumni]
          }],
          chart: {
              type: 'bar',
              height: 350
          },
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '45%',
                  endingShape: 'rounded'
              }
          },
          dataLabels: {
              enabled: false
          },
          xaxis: {
              categories: ["Total Campus", "Total Alumni"]
          },
          colors: ['#1E88E5', '#D32F2F']
      };

      chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
  };

  // Initial fetch and auto-update every 3 seconds
  getAnalyticsCount();
  setInterval(getAnalyticsCount, 3000);
});
