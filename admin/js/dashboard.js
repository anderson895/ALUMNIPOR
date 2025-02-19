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
              let campusAlumni = response.campus_alumni; // Alumni count per campus

              $('.total_alumni').text(totalAlumni);
              $('.total_campus').text(totalCampus);

              // Extract data for the chart
              let campusNames = campusAlumni.map(campus => campus.campus_name);
              let alumniCounts = campusAlumni.map(campus => campus.alumni_count);

              // Update chart if already initialized, else create it
              if (chart) {
                  chart.updateOptions({
                      xaxis: { categories: campusNames },
                      series: [{ name: "Total ALUMNI", data: alumniCounts }]
                  });
              } else {
                  createChart(campusNames, alumniCounts);
              }
          },
          error: function(xhr, status, error) {
              console.error("Error fetching analytics:", error);
          }
      });
  };

  const createChart = (campusNames, alumniCounts) => {
      let options = {
          series: [{
              name: "Alumni Count",
              data: alumniCounts
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
              categories: campusNames
          },
          colors: ['#1E88E5']
      };

      chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
  };

  // Initial fetch and auto-update every 3 seconds
  getAnalyticsCount();
  setInterval(getAnalyticsCount, 3000);
});
